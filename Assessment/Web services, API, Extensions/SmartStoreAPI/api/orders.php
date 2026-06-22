<?php
// api/orders.php
// Orders API handling CRUD for authenticated user's orders

require_once '../config/db.php';
require_once '../middleware/jwt_auth.php';

// Get HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// Handle CORS and Content-Type header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($method === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// All orders endpoints are protected by JWT Bearer token
$tokenData = checkAuthentication();
$authUserId = intval($tokenData['user_id']);

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($method) {
    case 'GET':
        if ($id) {
            // Get single order for the authenticated user, joining product details
            $stmt = $conn->prepare("
                SELECT o.id, o.quantity, o.total_price, o.order_date,
                       p.id AS product_id, p.name AS product_name, p.price AS product_price
                FROM orders o
                JOIN products p ON o.product_id = p.id
                WHERE o.id = ? AND o.user_id = ?
            ");
            $stmt->bind_param("ii", $id, $authUserId);
            $stmt->execute();
            $result = $stmt->get_result();
            $order = $result->fetch_assoc();
            
            if ($order) {
                // Format output
                $formattedOrder = [
                    "id" => intval($order['id']),
                    "quantity" => intval($order['quantity']),
                    "total_price" => floatval($order['total_price']),
                    "order_date" => $order['order_date'],
                    "product" => [
                        "id" => intval($order['product_id']),
                        "name" => $order['product_name'],
                        "price" => floatval($order['product_price'])
                    ]
                ];
                sendResponse(200, true, "Order retrieved successfully", $formattedOrder);
            } else {
                sendResponse(404, false, "Order not found or access denied.");
            }
        } else {
            // Get all orders for the authenticated user
            $stmt = $conn->prepare("
                SELECT o.id, o.quantity, o.total_price, o.order_date,
                       p.id AS product_id, p.name AS product_name, p.price AS product_price
                FROM orders o
                JOIN products p ON o.product_id = p.id
                WHERE o.user_id = ?
                ORDER BY o.id DESC
            ");
            $stmt->bind_param("i", $authUserId);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $orders = [];
            while ($row = $result->fetch_assoc()) {
                $orders[] = [
                    "id" => intval($row['id']),
                    "quantity" => intval($row['quantity']),
                    "total_price" => floatval($row['total_price']),
                    "order_date" => $row['order_date'],
                    "product" => [
                        "id" => intval($row['product_id']),
                        "name" => $row['product_name'],
                        "price" => floatval($row['product_price'])
                    ]
                ];
            }
            sendResponse(200, true, "Orders retrieved successfully", $orders);
        }
        break;

    case 'POST':
        // Read JSON input body
        $input = json_decode(file_get_contents("php://input"), true);
        
        $productId = isset($input['product_id']) ? intval($input['product_id']) : null;
        $quantity = isset($input['quantity']) ? intval($input['quantity']) : null;
        
        // Input validation
        if ($productId === null || $quantity === null) {
            sendResponse(422, false, "Unprocessable Entity: 'product_id' and 'quantity' are required.");
        }
        
        if ($quantity <= 0) {
            sendResponse(422, false, "Unprocessable Entity: 'quantity' must be greater than 0.");
        }
        
        // Check product existence and stock availability
        $prodStmt = $conn->prepare("SELECT price, stock FROM products WHERE id = ?");
        $prodStmt->bind_param("i", $productId);
        $prodStmt->execute();
        $prodResult = $prodStmt->get_result();
        
        if ($prodResult->num_rows === 0) {
            sendResponse(404, false, "Product not found.");
        }
        
        $product = $prodResult->fetch_assoc();
        $productStock = intval($product['stock']);
        $productPrice = floatval($product['price']);
        
        if ($productStock < $quantity) {
            sendResponse(422, false, "Unprocessable Entity: Insufficient stock. Only $productStock items available.");
        }
        
        // Calculate total order price
        $totalPrice = $productPrice * $quantity;
        
        // Start database transaction to ensure atomicity
        $conn->begin_transaction();
        
        try {
            // Insert order
            $orderStmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity, total_price) VALUES (?, ?, ?, ?)");
            $orderStmt->bind_param("iiid", $authUserId, $productId, $quantity, $totalPrice);
            $orderStmt->execute();
            $newOrderId = $orderStmt->insert_id;
            
            // Deduct stock from products table
            $stockStmt = $conn->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
            $stockStmt->bind_param("ii", $quantity, $productId);
            $stockStmt->execute();
            
            $conn->commit();
            
            sendResponse(201, true, "Order created successfully", [
                "id" => $newOrderId,
                "product_id" => $productId,
                "quantity" => $quantity,
                "total_price" => $totalPrice
            ]);
            
        } catch (Exception $e) {
            $conn->rollback();
            sendResponse(500, false, "Failed to create order: " . $e->getMessage());
        }
        break;

    case 'PUT':
        if (!$id) {
            sendResponse(422, false, "Unprocessable Entity: Order ID is required in query params.");
        }
        
        // Verify order exists and belongs to this user
        $orderQuery = $conn->prepare("SELECT product_id, quantity FROM orders WHERE id = ? AND user_id = ?");
        $orderQuery->bind_param("ii", $id, $authUserId);
        $orderQuery->execute();
        $orderResult = $orderQuery->get_result();
        
        if ($orderResult->num_rows === 0) {
            sendResponse(404, false, "Order not found or access denied.");
        }
        
        $currentOrder = $orderResult->fetch_assoc();
        $oldQuantity = intval($currentOrder['quantity']);
        $productId = intval($currentOrder['product_id']);
        
        // Read JSON input body
        $input = json_decode(file_get_contents("php://input"), true);
        $newQuantity = isset($input['quantity']) ? intval($input['quantity']) : null;
        
        if ($newQuantity === null) {
            sendResponse(422, false, "Unprocessable Entity: 'quantity' is required to update order.");
        }
        
        if ($newQuantity <= 0) {
            sendResponse(422, false, "Unprocessable Entity: 'quantity' must be greater than 0.");
        }
        
        // Fetch current product stock and price
        $prodQuery = $conn->prepare("SELECT price, stock FROM products WHERE id = ?");
        $prodQuery->bind_param("i", $productId);
        $prodQuery->execute();
        $product = $prodQuery->get_result()->fetch_assoc();
        
        $productPrice = floatval($product['price']);
        $currentStock = intval($product['stock']);
        
        // Calculate difference in quantity
        $qtyDifference = $newQuantity - $oldQuantity;
        
        // Check if there is enough stock for additions
        if ($qtyDifference > 0 && $currentStock < $qtyDifference) {
            sendResponse(422, false, "Unprocessable Entity: Insufficient stock. Only $currentStock additional items available.");
        }
        
        $newTotalPrice = $productPrice * $newQuantity;
        
        $conn->begin_transaction();
        
        try {
            // Update order details
            $updateOrder = $conn->prepare("UPDATE orders SET quantity = ?, total_price = ? WHERE id = ? AND user_id = ?");
            $updateOrder->bind_param("idii", $newQuantity, $newTotalPrice, $id, $authUserId);
            $updateOrder->execute();
            
            // Adjust product inventory stock
            $updateStock = $conn->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
            $updateStock->bind_param("ii", $qtyDifference, $productId);
            $updateStock->execute();
            
            $conn->commit();
            
            sendResponse(200, true, "Order updated successfully", [
                "id" => $id,
                "product_id" => $productId,
                "quantity" => $newQuantity,
                "total_price" => $newTotalPrice
            ]);
            
        } catch (Exception $e) {
            $conn->rollback();
            sendResponse(500, false, "Failed to update order: " . $e->getMessage());
        }
        break;

    case 'DELETE':
        if (!$id) {
            sendResponse(422, false, "Unprocessable Entity: Order ID is required in query params.");
        }
        
        // Verify order exists and belongs to this user
        $orderQuery = $conn->prepare("SELECT product_id, quantity FROM orders WHERE id = ? AND user_id = ?");
        $orderQuery->bind_param("ii", $id, $authUserId);
        $orderQuery->execute();
        $orderResult = $orderQuery->get_result();
        
        if ($orderResult->num_rows === 0) {
            sendResponse(404, false, "Order not found or access denied.");
        }
        
        $currentOrder = $orderResult->fetch_assoc();
        $productId = intval($currentOrder['product_id']);
        $quantity = intval($currentOrder['quantity']);
        
        $conn->begin_transaction();
        
        try {
            // Refund stock back to products table
            $refundStock = $conn->prepare("UPDATE products SET stock = stock + ? WHERE id = ?");
            $refundStock->bind_param("ii", $quantity, $productId);
            $refundStock->execute();
            
            // Delete order
            $deleteOrder = $conn->prepare("DELETE FROM orders WHERE id = ? AND user_id = ?");
            $deleteOrder->bind_param("ii", $id, $authUserId);
            $deleteOrder->execute();
            
            $conn->commit();
            
            sendResponse(200, true, "Order cancelled and deleted successfully.");
            
        } catch (Exception $e) {
            $conn->rollback();
            sendResponse(500, false, "Failed to delete order: " . $e->getMessage());
        }
        break;

    default:
        sendResponse(405, false, "Method Not Allowed");
        break;
}
