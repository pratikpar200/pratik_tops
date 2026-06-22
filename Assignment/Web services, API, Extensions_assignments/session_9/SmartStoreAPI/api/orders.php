<?php
// Include database configuration
require_once __DIR__ . '/../config/database.php';

// Enforce JWT authentication for ALL actions in this endpoint
$userPayload = require_once __DIR__ . '/../middleware/auth.php';

// Determine the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// GET Requests - Retrieve Order(s)
if ($method === 'GET') {
    
    // Check if GET parameter 'id' is supplied
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        
        // Fetch order details with joined user and product info
        $query = "SELECT o.id, o.user_id, u.username, o.product_id, p.name AS product_name, 
                         o.quantity, o.total_price, o.order_date 
                  FROM orders o
                  JOIN users u ON o.user_id = u.id
                  JOIN products p ON o.product_id = p.id
                  WHERE o.id = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $order = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);
            
            if ($order) {
                $order['id'] = (int)$order['id'];
                $order['user_id'] = (int)$order['user_id'];
                $order['product_id'] = (int)$order['product_id'];
                $order['quantity'] = (int)$order['quantity'];
                $order['total_price'] = (float)$order['total_price'];
                
                sendJSONResponse(200, true, "Order retrieved successfully", ["data" => $order]);
            } else {
                sendJSONResponse(404, false, "Order not found");
            }
        } else {
            sendJSONResponse(500, false, "Database statement preparation failed");
        }
        
    } else {
        // Fetch all orders with joined user and product info
        $query = "SELECT o.id, o.user_id, u.username, o.product_id, p.name AS product_name, 
                         o.quantity, o.total_price, o.order_date 
                  FROM orders o
                  JOIN users u ON o.user_id = u.id
                  JOIN products p ON o.product_id = p.id
                  ORDER BY o.id DESC";
        $result = mysqli_query($conn, $query);
        
        $orders = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['id'] = (int)$row['id'];
                $row['user_id'] = (int)$row['user_id'];
                $row['product_id'] = (int)$row['product_id'];
                $row['quantity'] = (int)$row['quantity'];
                $row['total_price'] = (float)$row['total_price'];
                $orders[] = $row;
            }
        }
        
        sendJSONResponse(200, true, "Orders retrieved successfully", ["data" => $orders]);
    }
}

// POST Request - Create Order
if ($method === 'POST') {
    
    $input = json_decode(file_get_contents("php://input"), true);
    
    $user_id = isset($input['user_id']) ? $input['user_id'] : null;
    $product_id = isset($input['product_id']) ? $input['product_id'] : null;
    $quantity = isset($input['quantity']) ? $input['quantity'] : null;
    
    // Validation
    if ($user_id === null || $product_id === null || $quantity === null) {
        sendJSONResponse(422, false, "Invalid input. User ID, Product ID, and Quantity are required.");
    }
    
    if (filter_var($user_id, FILTER_VALIDATE_INT) === false || $user_id <= 0) {
        sendJSONResponse(422, false, "Invalid input. User ID must be a positive integer.");
    }
    
    if (filter_var($product_id, FILTER_VALIDATE_INT) === false || $product_id <= 0) {
        sendJSONResponse(422, false, "Invalid input. Product ID must be a positive integer.");
    }
    
    if (filter_var($quantity, FILTER_VALIDATE_INT) === false || $quantity <= 0) {
        sendJSONResponse(422, false, "Invalid input. Quantity must be a positive integer.");
    }
    
    // Check if user exists
    $userQuery = "SELECT id FROM users WHERE id = ? LIMIT 1";
    $userStmt = mysqli_prepare($conn, $userQuery);
    mysqli_stmt_bind_param($userStmt, "i", $user_id);
    mysqli_stmt_execute($userStmt);
    $userResult = mysqli_stmt_get_result($userStmt);
    if (mysqli_num_rows($userResult) === 0) {
        sendJSONResponse(422, false, "Failed to create order. Referenced User does not exist.");
    }
    mysqli_stmt_close($userStmt);
    
    // Check if product exists and retrieve price/stock details
    $prodQuery = "SELECT id, price, stock, name FROM products WHERE id = ? LIMIT 1";
    $prodStmt = mysqli_prepare($conn, $prodQuery);
    mysqli_stmt_bind_param($prodStmt, "i", $product_id);
    mysqli_stmt_execute($prodStmt);
    $prodResult = mysqli_stmt_get_result($prodStmt);
    $product = mysqli_fetch_assoc($prodResult);
    mysqli_stmt_close($prodStmt);
    
    if (!$product) {
        sendJSONResponse(422, false, "Failed to create order. Referenced Product does not exist.");
    }
    
    // Optional: Check if enough stock exists
    if ($product['stock'] < $quantity) {
        sendJSONResponse(422, false, "Failed to create order. Insufficient stock available. Only " . $product['stock'] . " items left.");
    }
    
    // Calculate total price dynamically to prevent tampering
    $price = (float)$product['price'];
    $total_price = $price * $quantity;
    
    // Insert order record
    $query = "INSERT INTO orders (user_id, product_id, quantity, total_price) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iiid", $user_id, $product_id, $quantity, $total_price);
        
        if (mysqli_stmt_execute($stmt)) {
            $newId = mysqli_insert_id($conn);
            mysqli_stmt_close($stmt);
            
            // Deduct product stock
            $newStock = $product['stock'] - $quantity;
            $updateStockQuery = "UPDATE products SET stock = ? WHERE id = ?";
            $stockStmt = mysqli_prepare($conn, $updateStockQuery);
            mysqli_stmt_bind_param($stockStmt, "ii", $newStock, $product_id);
            mysqli_stmt_execute($stockStmt);
            mysqli_stmt_close($stockStmt);
            
            $createdOrder = [
                "id" => $newId,
                "user_id" => (int)$user_id,
                "product_id" => (int)$product_id,
                "product_name" => $product['name'],
                "quantity" => (int)$quantity,
                "total_price" => $total_price
            ];
            
            sendJSONResponse(201, true, "Order created successfully", ["data" => $createdOrder]);
        } else {
            sendJSONResponse(500, false, "Failed to create order");
        }
    } else {
        sendJSONResponse(500, false, "Database statement preparation failed");
    }
}

// PUT Request - Update Order
if ($method === 'PUT') {
    
    if (!isset($_GET['id'])) {
        sendJSONResponse(422, false, "Order ID is required in the query parameters.");
    }
    
    $id = (int)$_GET['id'];
    
    // Check if order exists
    $orderQuery = "SELECT id, product_id, quantity FROM orders WHERE id = ? LIMIT 1";
    $orderStmt = mysqli_prepare($conn, $orderQuery);
    mysqli_stmt_bind_param($orderStmt, "i", $id);
    mysqli_stmt_execute($orderStmt);
    $orderResult = mysqli_stmt_get_result($orderStmt);
    $existingOrder = mysqli_fetch_assoc($orderResult);
    mysqli_stmt_close($orderStmt);
    
    if (!$existingOrder) {
        sendJSONResponse(404, false, "Order not found");
    }
    
    $input = json_decode(file_get_contents("php://input"), true);
    
    $user_id = isset($input['user_id']) ? $input['user_id'] : null;
    $product_id = isset($input['product_id']) ? $input['product_id'] : null;
    $quantity = isset($input['quantity']) ? $input['quantity'] : null;
    
    // Validation
    if ($user_id === null || $product_id === null || $quantity === null) {
        sendJSONResponse(422, false, "Invalid input. User ID, Product ID, and Quantity are required.");
    }
    
    if (filter_var($user_id, FILTER_VALIDATE_INT) === false || $user_id <= 0) {
        sendJSONResponse(422, false, "Invalid input. User ID must be a positive integer.");
    }
    
    if (filter_var($product_id, FILTER_VALIDATE_INT) === false || $product_id <= 0) {
        sendJSONResponse(422, false, "Invalid input. Product ID must be a positive integer.");
    }
    
    if (filter_var($quantity, FILTER_VALIDATE_INT) === false || $quantity <= 0) {
        sendJSONResponse(422, false, "Invalid input. Quantity must be a positive integer.");
    }
    
    // Check if user exists
    $userQuery = "SELECT id FROM users WHERE id = ? LIMIT 1";
    $userStmt = mysqli_prepare($conn, $userQuery);
    mysqli_stmt_bind_param($userStmt, "i", $user_id);
    mysqli_stmt_execute($userStmt);
    $userResult = mysqli_stmt_get_result($userStmt);
    if (mysqli_num_rows($userResult) === 0) {
        sendJSONResponse(422, false, "Failed to update order. Referenced User does not exist.");
    }
    mysqli_stmt_close($userStmt);
    
    // Check if product exists and retrieve price/stock details
    $prodQuery = "SELECT id, price, stock, name FROM products WHERE id = ? LIMIT 1";
    $prodStmt = mysqli_prepare($conn, $prodQuery);
    mysqli_stmt_bind_param($prodStmt, "i", $product_id);
    mysqli_stmt_execute($prodStmt);
    $prodResult = mysqli_stmt_get_result($prodStmt);
    $product = mysqli_fetch_assoc($prodResult);
    mysqli_stmt_close($prodStmt);
    
    if (!$product) {
        sendJSONResponse(422, false, "Failed to update order. Referenced Product does not exist.");
    }
    
    // Revert the stock of the old product first
    $oldProductId = (int)$existingOrder['product_id'];
    $oldQuantity = (int)$existingOrder['quantity'];
    
    $revertQuery = "UPDATE products SET stock = stock + ? WHERE id = ?";
    $revertStmt = mysqli_prepare($conn, $revertQuery);
    mysqli_stmt_bind_param($revertStmt, "ii", $oldQuantity, $oldProductId);
    mysqli_stmt_execute($revertStmt);
    mysqli_stmt_close($revertStmt);
    
    // Refresh product stock after reversion in case it's the same product
    $prodQuery = "SELECT id, price, stock, name FROM products WHERE id = ? LIMIT 1";
    $prodStmt = mysqli_prepare($conn, $prodQuery);
    mysqli_stmt_bind_param($prodStmt, "i", $product_id);
    mysqli_stmt_execute($prodStmt);
    $prodResult = mysqli_stmt_get_result($prodStmt);
    $product = mysqli_fetch_assoc($prodResult);
    mysqli_stmt_close($prodStmt);
    
    // Check stock for new quantity
    if ($product['stock'] < $quantity) {
        // Revert reversion if we fail stock check to keep database state correct
        $rollbackQuery = "UPDATE products SET stock = stock - ? WHERE id = ?";
        $rollbackStmt = mysqli_prepare($conn, $rollbackQuery);
        mysqli_stmt_bind_param($rollbackStmt, "ii", $oldQuantity, $oldProductId);
        mysqli_stmt_execute($rollbackStmt);
        mysqli_stmt_close($rollbackStmt);
        
        sendJSONResponse(422, false, "Failed to update order. Insufficient stock available. Only " . $product['stock'] . " items left.");
    }
    
    // Calculate total price dynamically
    $price = (float)$product['price'];
    $total_price = $price * $quantity;
    
    // Update order
    $query = "UPDATE orders SET user_id = ?, product_id = ?, quantity = ?, total_price = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iiidi", $user_id, $product_id, $quantity, $total_price, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            
            // Deduct stock for the new product/quantity
            $newStock = $product['stock'] - $quantity;
            $updateStockQuery = "UPDATE products SET stock = ? WHERE id = ?";
            $stockStmt = mysqli_prepare($conn, $updateStockQuery);
            mysqli_stmt_bind_param($stockStmt, "ii", $newStock, $product_id);
            mysqli_stmt_execute($stockStmt);
            mysqli_stmt_close($stockStmt);
            
            $updatedOrder = [
                "id" => $id,
                "user_id" => (int)$user_id,
                "product_id" => (int)$product_id,
                "product_name" => $product['name'],
                "quantity" => (int)$quantity,
                "total_price" => $total_price
            ];
            
            sendJSONResponse(200, true, "Order updated successfully", ["data" => $updatedOrder]);
        } else {
            // Revert stock on fail
            $rollbackQuery = "UPDATE products SET stock = stock - ? WHERE id = ?";
            $rollbackStmt = mysqli_prepare($conn, $rollbackQuery);
            mysqli_stmt_bind_param($rollbackStmt, "ii", $oldQuantity, $oldProductId);
            mysqli_stmt_execute($rollbackStmt);
            mysqli_stmt_close($rollbackStmt);
            
            sendJSONResponse(500, false, "Failed to update order");
        }
    } else {
        sendJSONResponse(500, false, "Database statement preparation failed");
    }
}

// DELETE Request - Delete Order
if ($method === 'DELETE') {
    
    if (!isset($_GET['id'])) {
        sendJSONResponse(422, false, "Order ID is required in the query parameters.");
    }
    
    $id = (int)$_GET['id'];
    
    // Check if order exists
    $orderQuery = "SELECT id, product_id, quantity FROM orders WHERE id = ? LIMIT 1";
    $orderStmt = mysqli_prepare($conn, $orderQuery);
    mysqli_stmt_bind_param($orderStmt, "i", $id);
    mysqli_stmt_execute($orderStmt);
    $orderResult = mysqli_stmt_get_result($orderStmt);
    $existingOrder = mysqli_fetch_assoc($orderResult);
    mysqli_stmt_close($orderStmt);
    
    if (!$existingOrder) {
        sendJSONResponse(404, false, "Order not found");
    }
    
    // Retrieve details to revert stock
    $productId = (int)$existingOrder['product_id'];
    $quantity = (int)$existingOrder['quantity'];
    
    // Perform Delete
    $query = "DELETE FROM orders WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            
            // Revert product stock since order was deleted/cancelled
            $revertQuery = "UPDATE products SET stock = stock + ? WHERE id = ?";
            $revertStmt = mysqli_prepare($conn, $revertQuery);
            mysqli_stmt_bind_param($revertStmt, "ii", $quantity, $productId);
            mysqli_stmt_execute($revertStmt);
            mysqli_stmt_close($revertStmt);
            
            sendJSONResponse(200, true, "Order deleted successfully");
        } else {
            sendJSONResponse(500, false, "Failed to delete order");
        }
    } else {
        sendJSONResponse(500, false, "Database statement preparation failed");
    }
}

// If no matching HTTP method was handled
sendJSONResponse(405, false, "Method Not Allowed");
?>
