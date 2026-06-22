<?php
// Include database config which has database connection and JWT helper functions
require_once __DIR__ . '/../config/database.php';

// Retrieve all request headers
$headers = getallheaders();

// Check for Authorization header in a case-insensitive manner
$authHeader = null;
if (isset($headers['Authorization'])) {
    $authHeader = $headers['Authorization'];
} elseif (isset($headers['authorization'])) {
    $authHeader = $headers['authorization'];
}

// If no Authorization header is present, block request and return 401 Unauthorized
if (!$authHeader) {
    sendJSONResponse(401, false, "Unauthorized Access");
}

// Split header value (format: Bearer <token>)
$headerParts = explode(" ", $authHeader);

// Validate header parts length and the 'Bearer' scheme
if (count($headerParts) !== 2 || strcasecmp($headerParts[0], 'Bearer') !== 0) {
    sendJSONResponse(401, false, "Unauthorized Access");
}

$token = $headerParts[1];

// Verify the extracted JWT token
$decoded = verifyJWT($token);

// If verification fails or token has expired, block request and return 401 Unauthorized
if (!$decoded) {
    sendJSONResponse(401, false, "Unauthorized Access");
}

// Return the decoded user data payload to the calling script
return $decoded;
?>
