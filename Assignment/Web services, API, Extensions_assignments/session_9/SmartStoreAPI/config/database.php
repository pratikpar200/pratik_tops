<?php
// Global API headers (CORS and JSON Content-Type)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Handle preflight OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Database Configuration Parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'smartstore_db');

// Establish Connection to Database using normal mysqli functions
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verify database connection success
if (!$conn) {
    http_response_code(500);
    echo json_encode([
        "status" => false,
        "message" => "Internal Server Error: Database connection failed. " . mysqli_connect_error()
    ]);
    exit();
}

// Set connection charset to utf8mb4 for complete unicode support
mysqli_set_charset($conn, "utf8mb4");

// Helper function to send standard JSON responses and terminate script execution
function sendJSONResponse($status_code, $status, $message, $data = null) {
    http_response_code($status_code);
    
    $response = [
        "status" => $status,
        "message" => $message
    ];
    
    // Merge data fields if present
    if ($data !== null) {
        $response = array_merge($response, $data);
    }
    
    echo json_encode($response);
    exit();
}

// Custom JWT Implementation Details (Core PHP without external libraries)
define('JWT_SECRET', 'SmartStoreSuperSecretAPIKey2026');
define('JWT_EXPIRY', 3600); // 1 hour token lifespan

// URL-safe Base64 Encoding
function base64UrlEncode($data) {
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
}

// URL-safe Base64 Decoding
function base64UrlDecode($data) {
    $remainder = strlen($data) % 4;
    if ($remainder) {
        $padlen = 4 - $remainder;
        $data .= str_repeat('=', $padlen);
    }
    return base64_decode(str_replace(['-', '_'], ['+', '/'], $data));
}

// Generate JWT token from payload array
function generateJWT($payload) {
    $header = json_encode(['alg' => 'HS256', 'typ' => 'JWT']);
    
    // Add expiration time to payload
    $payload['exp'] = time() + JWT_EXPIRY;
    
    $base64UrlHeader = base64UrlEncode($header);
    $base64UrlPayload = base64UrlEncode(json_encode($payload));
    
    // Create signature using HMAC SHA256
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, JWT_SECRET, true);
    $base64UrlSignature = base64UrlEncode($signature);
    
    return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
}

// Verify JWT token and return payload if valid, or false if invalid/expired
function verifyJWT($jwt) {
    $tokenParts = explode('.', $jwt);
    if (count($tokenParts) !== 3) {
        return false;
    }
    
    $header = base64UrlDecode($tokenParts[0]);
    $payload = base64UrlDecode($tokenParts[1]);
    $signatureProvided = $tokenParts[2];
    
    $payloadData = json_decode($payload, true);
    if (!$payloadData) {
        return false;
    }
    
    // Verify signature
    $base64UrlHeader = base64UrlEncode($header);
    $base64UrlPayload = base64UrlEncode($payload);
    $signatureValid = base64UrlEncode(hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, JWT_SECRET, true));
    
    if (!hash_equals($signatureProvided, $signatureValid)) {
        return false;
    }
    
    // Verify token expiration
    if (isset($payloadData['exp']) && $payloadData['exp'] < time()) {
        return false;
    }
    
    return $payloadData;
}
?>
