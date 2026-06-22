<?php
// api/users.php
// Users API handling registration (public), login (public), and CRUD (protected)

require_once '../config/db.php';
require_once '../middleware/jwt_auth.php';

// Get HTTP request method and action query param
$method = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? trim($_GET['action']) : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Handle CORS and Content-Type header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($method === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Authentication rule:
// POST /api/users.php (Registration) and POST /api/users.php?action=login are public.
// All other requests (GET, PUT, DELETE, and any other POST actions) require JWT Bearer Token.
$tokenData = null;
if (!($method === 'POST' && ($action === 'login' || empty($action) || $action === 'register'))) {
    $tokenData = checkAuthentication();
}

switch ($method) {
    case 'POST':
        // Read JSON input body
        $input = json_decode(file_get_contents("php://input"), true);
        
        if ($action === 'login') {
            // USER LOGIN (PUBLIC)
            $username = isset($input['username']) ? trim($input['username']) : '';
            $password = isset($input['password']) ? trim($input['password']) : '';
            
            if (empty($username) || empty($password)) {
                sendResponse(422, false, "Unprocessable Entity: 'username' and 'password' are required.");
            }
            
            // Fetch user from DB
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            
            // Verify password using bcrypt
            if ($user && password_verify($password, $user['password'])) {
                // Generate token with payload details
                $payload = [
                    "user_id" => intval($user['id']),
                    "username" => $user['username'],
                    "email" => $user['email']
                ];
                $token = generateJWT($payload);
                
                sendResponse(200, true, "Login successful", [
                    "token" => $token,
                    "user" => [
                        "id" => intval($user['id']),
                        "username" => $user['username'],
                        "email" => $user['email']
                    ]
                ]);
            } else {
                sendResponse(401, false, "Unauthorized: Invalid username or password.");
            }
            
        } else {
            // USER REGISTRATION (PUBLIC)
            $username = isset($input['username']) ? trim($input['username']) : '';
            $email = isset($input['email']) ? trim($input['email']) : '';
            $password = isset($input['password']) ? trim($input['password']) : '';
            
            if (empty($username) || empty($email) || empty($password)) {
                sendResponse(422, false, "Unprocessable Entity: 'username', 'email', and 'password' are required.");
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                sendResponse(422, false, "Unprocessable Entity: Invalid email format.");
            }
            
            if (strlen($password) < 6) {
                sendResponse(422, false, "Unprocessable Entity: Password must be at least 6 characters long.");
            }
            
            // Check if user already exists by username or email
            $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
            $checkStmt->bind_param("ss", $username, $email);
            $checkStmt->execute();
            if ($checkStmt->get_result()->num_rows > 0) {
                sendResponse(422, false, "Unprocessable Entity: Username or Email already exists.");
            }
            
            // Hash password using BCRYPT
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            
            // Insert user record
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashedPassword);
            
            if ($stmt->execute()) {
                $newId = $stmt->insert_id;
                sendResponse(201, true, "User registered successfully", [
                    "id" => $newId,
                    "username" => $username,
                    "email" => $email
                ]);
            } else {
                sendResponse(500, false, "Failed to register user: " . $conn->error);
            }
        }
        break;

    case 'GET':
        // Retrieve single user or list of users
        if ($id) {
            $stmt = $conn->prepare("SELECT id, username, email, created_at FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            
            if ($user) {
                $user['id'] = intval($user['id']);
                sendResponse(200, true, "User retrieved successfully", $user);
            } else {
                sendResponse(404, false, "User not found.");
            }
        } else {
            $result = $conn->query("SELECT id, username, email, created_at FROM users ORDER BY id DESC");
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $row['id'] = intval($row['id']);
                $users[] = $row;
            }
            sendResponse(200, true, "Users retrieved successfully", $users);
        }
        break;

    case 'PUT':
        if (!$id) {
            sendResponse(422, false, "Unprocessable Entity: User ID is required in query params.");
        }
        
        // Check if user exists
        $checkStmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $checkStmt->bind_param("i", $id);
        $checkStmt->execute();
        $userResult = $checkStmt->get_result();
        
        if ($userResult->num_rows === 0) {
            sendResponse(404, false, "User not found.");
        }
        
        $currentUser = $userResult->fetch_assoc();
        
        // Read JSON input body
        $input = json_decode(file_get_contents("php://input"), true);
        
        $username = isset($input['username']) ? trim($input['username']) : $currentUser['username'];
        $email = isset($input['email']) ? trim($input['email']) : $currentUser['email'];
        $password = isset($input['password']) ? trim($input['password']) : '';
        
        if (empty($username) || empty($email)) {
            sendResponse(422, false, "Unprocessable Entity: 'username' and 'email' cannot be empty.");
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            sendResponse(422, false, "Unprocessable Entity: Invalid email format.");
        }
        
        // Check for username/email conflict with other users
        $uniqueStmt = $conn->prepare("SELECT id FROM users WHERE (username = ? OR email = ?) AND id != ?");
        $uniqueStmt->bind_param("ssi", $username, $email, $id);
        $uniqueStmt->execute();
        if ($uniqueStmt->get_result()->num_rows > 0) {
            sendResponse(422, false, "Unprocessable Entity: Username or Email is already taken by another user.");
        }
        
        // Perform update
        if (!empty($password)) {
            if (strlen($password) < 6) {
                sendResponse(422, false, "Unprocessable Entity: Password must be at least 6 characters long.");
            }
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
            $stmt->bind_param("sssi", $username, $email, $hashedPassword, $id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssi", $username, $email, $id);
        }
        
        if ($stmt->execute()) {
            sendResponse(200, true, "User updated successfully", [
                "id" => $id,
                "username" => $username,
                "email" => $email
            ]);
        } else {
            sendResponse(500, false, "Failed to update user: " . $conn->error);
        }
        break;

    case 'DELETE':
        if (!$id) {
            sendResponse(422, false, "Unprocessable Entity: User ID is required in query params.");
        }
        
        // Check if user exists
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
        $checkStmt->bind_param("i", $id);
        $checkStmt->execute();
        if ($checkStmt->get_result()->num_rows === 0) {
            sendResponse(404, false, "User not found.");
        }
        
        // Delete user
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            sendResponse(200, true, "User deleted successfully.");
        } else {
            sendResponse(500, false, "Failed to delete user: " . $conn->error);
        }
        break;

    default:
        sendResponse(405, false, "Method Not Allowed");
        break;
}
