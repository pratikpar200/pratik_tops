<?php
// Include database configuration (which sets headers, handles OPTIONS, and connects to DB)
require_once __DIR__ . '/../config/database.php';

// Only allow POST requests for login
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJSONResponse(405, false, "Method Not Allowed. Use POST.");
}

// Read and parse JSON request body
$input = json_decode(file_get_contents("php://input"), true);

// Extract credentials
$username = isset($input['username']) ? trim($input['username']) : '';
$password = isset($input['password']) ? trim($input['password']) : '';

// Validate that credentials are not empty
if (empty($username) || empty($password)) {
    sendJSONResponse(422, false, "Username and password are required.");
}

// Query user using prepared statements for security
$query = "SELECT * FROM users WHERE username = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Check if user exists
    if ($user = mysqli_fetch_assoc($result)) {
        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            // Create JWT Payload (do not include sensitive password hash)
            $payload = [
                "id" => (int)$user['id'],
                "username" => $user['username'],
                "email" => $user['email']
            ];
            
            // Generate JWT
            $token = generateJWT($payload);
            
            // Return success response with token
            sendJSONResponse(200, true, "Login Successful", ["token" => $token]);
        }
    }
    mysqli_stmt_close($stmt);
} else {
    sendJSONResponse(500, false, "Internal Server Error: Database query preparation failed.");
}

// If username not found or password verification failed
sendJSONResponse(401, false, "Invalid username or password");
?>
