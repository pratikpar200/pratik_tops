<?php
// Include database configuration
require_once __DIR__ . '/../config/database.php';

// Enforce JWT authentication for ALL actions in this endpoint
$userPayload = require_once __DIR__ . '/../middleware/auth.php';

// Determine the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// GET Requests - Retrieve User(s)
if ($method === 'GET') {
    
    // Check if GET parameter 'id' is supplied
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        
        // Fetch user details by ID (excluding password hash)
        $query = "SELECT id, username, email, created_at FROM users WHERE id = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);
            
            if ($user) {
                $user['id'] = (int)$user['id'];
                sendJSONResponse(200, true, "User retrieved successfully", ["data" => $user]);
            } else {
                sendJSONResponse(404, false, "User not found");
            }
        } else {
            sendJSONResponse(500, false, "Database statement preparation failed");
        }
        
    } else {
        // Fetch all users (excluding password hashes)
        $query = "SELECT id, username, email, created_at FROM users ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        
        $users = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['id'] = (int)$row['id'];
                $users[] = $row;
            }
        }
        
        sendJSONResponse(200, true, "Users retrieved successfully", ["data" => $users]);
    }
}

// POST Request - Create User
if ($method === 'POST') {
    
    $input = json_decode(file_get_contents("php://input"), true);
    
    $username = isset($input['username']) ? trim($input['username']) : '';
    $email = isset($input['email']) ? trim($input['email']) : '';
    $password = isset($input['password']) ? trim($input['password']) : '';
    
    // Validation
    if ($username === '' || $email === '' || $password === '') {
        sendJSONResponse(422, false, "Invalid input. Username, email, and password are required.");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendJSONResponse(422, false, "Invalid input. Email format is invalid.");
    }
    
    // Check if username or email already exists
    $checkQuery = "SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    
    if ($checkStmt) {
        mysqli_stmt_bind_param($checkStmt, "ss", $username, $email);
        mysqli_stmt_execute($checkStmt);
        $checkResult = mysqli_stmt_get_result($checkStmt);
        
        if (mysqli_num_rows($checkResult) > 0) {
            sendJSONResponse(422, false, "Username or Email is already registered.");
        }
        mysqli_stmt_close($checkStmt);
    } else {
        sendJSONResponse(500, false, "Database verification statement preparation failed");
    }
    
    // Hash password securely with BCrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
        
        if (mysqli_stmt_execute($stmt)) {
            $newId = mysqli_insert_id($conn);
            mysqli_stmt_close($stmt);
            
            $createdUser = [
                "id" => $newId,
                "username" => $username,
                "email" => $email
            ];
            
            sendJSONResponse(201, true, "User created successfully", ["data" => $createdUser]);
        } else {
            sendJSONResponse(500, false, "Failed to create user");
        }
    } else {
        sendJSONResponse(500, false, "Database statement preparation failed");
    }
}

// PUT Request - Update User
if ($method === 'PUT') {
    
    if (!isset($_GET['id'])) {
        sendJSONResponse(422, false, "User ID is required in the query parameters.");
    }
    
    $id = (int)$_GET['id'];
    
    // Verify user exists
    $checkQuery = "SELECT id FROM users WHERE id = ? LIMIT 1";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "i", $id);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);
    
    if (mysqli_num_rows($checkResult) === 0) {
        sendJSONResponse(404, false, "User not found");
    }
    mysqli_stmt_close($checkStmt);
    
    $input = json_decode(file_get_contents("php://input"), true);
    
    $username = isset($input['username']) ? trim($input['username']) : '';
    $email = isset($input['email']) ? trim($input['email']) : '';
    $password = isset($input['password']) ? trim($input['password']) : '';
    
    // Validation
    if ($username === '' || $email === '') {
        sendJSONResponse(422, false, "Invalid input. Username and email are required.");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendJSONResponse(422, false, "Invalid input. Email format is invalid.");
    }
    
    // Check if username or email is already registered to ANOTHER user ID
    $dupQuery = "SELECT id FROM users WHERE (username = ? OR email = ?) AND id != ? LIMIT 1";
    $dupStmt = mysqli_prepare($conn, $dupQuery);
    
    if ($dupStmt) {
        mysqli_stmt_bind_param($dupStmt, "ssi", $username, $email, $id);
        mysqli_stmt_execute($dupStmt);
        $dupResult = mysqli_stmt_get_result($dupStmt);
        
        if (mysqli_num_rows($dupResult) > 0) {
            sendJSONResponse(422, false, "Username or Email is already taken by another user.");
        }
        mysqli_stmt_close($dupStmt);
    }
    
    // Update logic depending on whether a new password is provided
    if ($password !== '') {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashedPassword, $id);
    } else {
        $query = "UPDATE users SET username = ?, email = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssi", $username, $email, $id);
    }
    
    if ($stmt) {
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            
            $updatedUser = [
                "id" => $id,
                "username" => $username,
                "email" => $email
            ];
            
            sendJSONResponse(200, true, "User updated successfully", ["data" => $updatedUser]);
        } else {
            sendJSONResponse(500, false, "Failed to update user");
        }
    } else {
        sendJSONResponse(500, false, "Database statement preparation failed");
    }
}

// DELETE Request - Delete User
if ($method === 'DELETE') {
    
    if (!isset($_GET['id'])) {
        sendJSONResponse(422, false, "User ID is required in the query parameters.");
    }
    
    $id = (int)$_GET['id'];
    
    // Verify user exists
    $checkQuery = "SELECT id FROM users WHERE id = ? LIMIT 1";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "i", $id);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);
    
    if (mysqli_num_rows($checkResult) === 0) {
        sendJSONResponse(404, false, "User not found");
    }
    mysqli_stmt_close($checkStmt);
    
    // Execute Delete
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            sendJSONResponse(200, true, "User deleted successfully");
        } else {
            sendJSONResponse(500, false, "Failed to delete user");
        }
    } else {
        sendJSONResponse(500, false, "Database statement preparation failed");
    }
}

// If no matching HTTP method was handled
sendJSONResponse(405, false, "Method Not Allowed");
?>
