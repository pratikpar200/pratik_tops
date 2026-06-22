<?php
// api/products.php
// Products API handling public reading and protected management (CRUD)

require_once '../config/db.php';
require_once '../middleware/jwt_auth.php';

// Get HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// Handle CORS and Content-Type header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Handle preflight OPTIONS requests
if ($method === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// GET Products is public, all write methods (POST, PUT, DELETE) require JWT authentication
if ($method !== 'GET') {
    $tokenData = checkAuthentication();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($method) {
    case 'GET':
        if ($id) {
            // Read one product
            $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();
            
            if ($product) {
                // Ensure correct data types
                $product['id'] = intval($product['id']);
                $product['price'] = floatval($product['price']);
                $product['stock'] = intval($product['stock']);
                sendResponse(200, true, "Product retrieved successfully", $product);
            } else {
                sendResponse(404, false, "Product not found");
            }
        } else {
            // Read all products
            $result = $conn->query("SELECT * FROM products ORDER BY id DESC");
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $row['id'] = intval($row['id']);
                $row['price'] = floatval($row['price']);
                $row['stock'] = intval($row['stock']);
                $products[] = $row;
            }
            sendResponse(200, true, "Products retrieved successfully", $products);
        }
        break;

    case 'POST':
        // Read JSON input body
        $input = json_decode(file_get_contents("php://input"), true);
        
        $name = isset($input['name']) ? trim($input['name']) : '';
        $description = isset($input['description']) ? trim($input['description']) : '';
        $price = isset($input['price']) ? $input['price'] : null;
        $stock = isset($input['stock']) ? $input['stock'] : null;
        
        // Input validation
        if (empty($name) || $price === null || $stock === null) {
            sendResponse(422, false, "Unprocessable Entity: 'name', 'price', and 'stock' are required fields.");
        }
        
        if (!is_numeric($price) || floatval($price) < 0) {
            sendResponse(422, false, "Unprocessable Entity: 'price' must be a valid positive number.");
        }
        
        if (!is_numeric($stock) || intval($stock) < 0) {
            sendResponse(422, false, "Unprocessable Entity: 'stock' must be a valid non-negative integer.");
        }
        
        $price = floatval($price);
        $stock = intval($stock);
        
        // Insert product
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, stock) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $name, $description, $price, $stock);
        
        if ($stmt->execute()) {
            $newId = $stmt->insert_id;
            $newProduct = [
                "id" => $newId,
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "stock" => $stock
            ];
            sendResponse(201, true, "Product created successfully", $newProduct);
        } else {
            sendResponse(500, false, "Failed to create product: " . $conn->error);
        }
        break;

    case 'PUT':
        if (!$id) {
            sendResponse(422, false, "Unprocessable Entity: Product ID is required in query params.");
        }
        
        // Check if product exists
        $checkStmt = $conn->prepare("SELECT id FROM products WHERE id = ?");
        $checkStmt->bind_param("i", $id);
        $checkStmt->execute();
        if ($checkStmt->get_result()->num_rows === 0) {
            sendResponse(404, false, "Product not found");
        }
        
        // Read JSON input body
        $input = json_decode(file_get_contents("php://input"), true);
        
        $name = isset($input['name']) ? trim($input['name']) : '';
        $description = isset($input['description']) ? trim($input['description']) : '';
        $price = isset($input['price']) ? $input['price'] : null;
        $stock = isset($input['stock']) ? $input['stock'] : null;
        
        // Validation
        if (empty($name) || $price === null || $stock === null) {
            sendResponse(422, false, "Unprocessable Entity: 'name', 'price', and 'stock' are required fields.");
        }
        
        if (!is_numeric($price) || floatval($price) < 0) {
            sendResponse(422, false, "Unprocessable Entity: 'price' must be a valid positive number.");
        }
        
        if (!is_numeric($stock) || intval($stock) < 0) {
            sendResponse(422, false, "Unprocessable Entity: 'stock' must be a valid non-negative integer.");
        }
        
        $price = floatval($price);
        $stock = intval($stock);
        
        // Update product
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ? WHERE id = ?");
        $stmt->bind_param("ssdii", $name, $description, $price, $stock, $id);
        
        if ($stmt->execute()) {
            $updatedProduct = [
                "id" => $id,
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "stock" => $stock
            ];
            sendResponse(200, true, "Product updated successfully", $updatedProduct);
        } else {
            sendResponse(500, false, "Failed to update product: " . $conn->error);
        }
        break;

    case 'DELETE':
        if (!$id) {
            sendResponse(422, false, "Unprocessable Entity: Product ID is required in query params.");
        }
        
        // Check if product exists
        $checkStmt = $conn->prepare("SELECT id FROM products WHERE id = ?");
        $checkStmt->bind_param("i", $id);
        $checkStmt->execute();
        if ($checkStmt->get_result()->num_rows === 0) {
            sendResponse(404, false, "Product not found");
        }
        
        // Delete product
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            sendResponse(200, true, "Product deleted successfully");
        } else {
            sendResponse(500, false, "Failed to delete product: " . $conn->error);
        }
        break;

    default:
        sendResponse(405, false, "Method Not Allowed");
        break;
}
