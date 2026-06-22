<?php
// Include database configuration
require_once __DIR__ . '/../config/database.php';

// Determine the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// GET Requests (Public Routes)
if ($method === 'GET') {
    
    // Check if GET parameter 'id' is supplied
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        
        // Fetch specific product by ID
        $query = "SELECT * FROM products WHERE id = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $product = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);
            
            if ($product) {
                // Ensure proper numeric types before returning
                $product['id'] = (int)$product['id'];
                $product['price'] = (float)$product['price'];
                $product['stock'] = (int)$product['stock'];
                
                sendJSONResponse(200, true, "Product retrieved successfully", ["data" => $product]);
            } else {
                sendJSONResponse(404, false, "Product not found");
            }
        } else {
            sendJSONResponse(500, false, "Database statement preparation failed");
        }
        
    } else {
        // Fetch all products
        $query = "SELECT * FROM products ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        
        $products = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['id'] = (int)$row['id'];
                $row['price'] = (float)$row['price'];
                $row['stock'] = (int)$row['stock'];
                $products[] = $row;
            }
        }
        
        sendJSONResponse(200, true, "Products retrieved successfully", ["data" => $products]);
    }
}

// Protected Routes (POST, PUT, DELETE)
// Execute authentication middleware (halts execution with 401 if token is invalid)
$userPayload = require_once __DIR__ . '/../middleware/auth.php';

// POST Request - Create Product (Protected)
if ($method === 'POST') {
    
    $input = json_decode(file_get_contents("php://input"), true);
    
    $name = isset($input['name']) ? trim($input['name']) : '';
    $description = isset($input['description']) ? trim($input['description']) : '';
    $price = isset($input['price']) ? $input['price'] : null;
    $stock = isset($input['stock']) ? $input['stock'] : null;
    
    // Validation
    if ($name === '' || $price === null || $stock === null) {
        sendJSONResponse(422, false, "Invalid input. Name, price, and stock are required.");
    }
    
    if (!is_numeric($price) || $price < 0) {
        sendJSONResponse(422, false, "Invalid input. Price must be a positive number.");
    }
    
    if (filter_var($stock, FILTER_VALIDATE_INT) === false || $stock < 0) {
        sendJSONResponse(422, false, "Invalid input. Stock must be a non-negative integer.");
    }
    
    $query = "INSERT INTO products (name, description, price, stock) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssdi", $name, $description, $price, $stock);
        
        if (mysqli_stmt_execute($stmt)) {
            $newId = mysqli_insert_id($conn);
            mysqli_stmt_close($stmt);
            
            $createdProduct = [
                "id" => $newId,
                "name" => $name,
                "description" => $description,
                "price" => (float)$price,
                "stock" => (int)$stock
            ];
            
            sendJSONResponse(201, true, "Product created successfully", ["data" => $createdProduct]);
        } else {
            sendJSONResponse(500, false, "Failed to create product");
        }
    } else {
        sendJSONResponse(500, false, "Database statement preparation failed");
    }
}

// PUT Request - Update Product (Protected)
if ($method === 'PUT') {
    
    if (!isset($_GET['id'])) {
        sendJSONResponse(422, false, "Product ID is required in the query parameters.");
    }
    
    $id = (int)$_GET['id'];
    
    // Check if product exists
    $checkQuery = "SELECT id FROM products WHERE id = ? LIMIT 1";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "i", $id);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);
    
    if (mysqli_num_rows($checkResult) === 0) {
        sendJSONResponse(404, false, "Product not found");
    }
    mysqli_stmt_close($checkStmt);
    
    $input = json_decode(file_get_contents("php://input"), true);
    
    $name = isset($input['name']) ? trim($input['name']) : '';
    $description = isset($input['description']) ? trim($input['description']) : '';
    $price = isset($input['price']) ? $input['price'] : null;
    $stock = isset($input['stock']) ? $input['stock'] : null;
    
    // Validation
    if ($name === '' || $price === null || $stock === null) {
        sendJSONResponse(422, false, "Invalid input. Name, price, and stock are required.");
    }
    
    if (!is_numeric($price) || $price < 0) {
        sendJSONResponse(422, false, "Invalid input. Price must be a positive number.");
    }
    
    if (filter_var($stock, FILTER_VALIDATE_INT) === false || $stock < 0) {
        sendJSONResponse(422, false, "Invalid input. Stock must be a non-negative integer.");
    }
    
    $query = "UPDATE products SET name = ?, description = ?, price = ?, stock = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssdii", $name, $description, $price, $stock, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            
            $updatedProduct = [
                "id" => $id,
                "name" => $name,
                "description" => $description,
                "price" => (float)$price,
                "stock" => (int)$stock
            ];
            
            sendJSONResponse(200, true, "Product updated successfully", ["data" => $updatedProduct]);
        } else {
            sendJSONResponse(500, false, "Failed to update product");
        }
    } else {
        sendJSONResponse(500, false, "Database statement preparation failed");
    }
}

// DELETE Request - Delete Product (Protected)
if ($method === 'DELETE') {
    
    if (!isset($_GET['id'])) {
        sendJSONResponse(422, false, "Product ID is required in the query parameters.");
    }
    
    $id = (int)$_GET['id'];
    
    // Check if product exists
    $checkQuery = "SELECT id FROM products WHERE id = ? LIMIT 1";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "i", $id);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);
    
    if (mysqli_num_rows($checkResult) === 0) {
        sendJSONResponse(404, false, "Product not found");
    }
    mysqli_stmt_close($checkStmt);
    
    // Perform delete
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            sendJSONResponse(200, true, "Product deleted successfully");
        } else {
            sendJSONResponse(500, false, "Failed to delete product");
        }
    } else {
        sendJSONResponse(500, false, "Database statement preparation failed");
    }
}

// If no matching HTTP method was handled
sendJSONResponse(405, false, "Method Not Allowed");
?>
