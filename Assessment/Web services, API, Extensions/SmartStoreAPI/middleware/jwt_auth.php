<?php
// middleware/jwt_auth.php
// Custom JWT implementation for academic project, without composer dependencies.

// Defined secret key for token signing and verification
if (!defined('JWT_SECRET')) {
    define('JWT_SECRET', 'smartstore_secret_key_987654321');
}

/**
 * Base64 URL Safe encoding
 */
function base64UrlEncode($text) {
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($text));
}

/**
 * Base64 URL Safe decoding
 */
function base64UrlDecode($text) {
    return base64_decode(str_replace(['-', '_'], ['+', '/'], $text));
}

/**
 * Generates a JSON Web Token
 * @param array $payload The payload content (e.g. user id, username)
 * @return string The generated token
 */
function generateJWT($payload) {
    $header = json_encode(['alg' => 'HS256', 'typ' => 'JWT']);
    
    // Add expiration time to payload if not set (default 2 hours)
    if (!isset($payload['exp'])) {
        $payload['exp'] = time() + 7200; 
    }
    
    $base64Header = base64UrlEncode($header);
    $base64Payload = base64UrlEncode(json_encode($payload));
    
    // Create signature using HMAC SHA256
    $signature = hash_hmac('sha256', $base64Header . "." . $base64Payload, JWT_SECRET, true);
    $base64Signature = base64UrlEncode($signature);
    
    return $base64Header . "." . $base64Payload . "." . $base64Signature;
}

/**
 * Validates a JWT and returns payload if valid, false otherwise
 * @param string $jwt The token to validate
 * @return array|false Payload array or false
 */
function validateJWT($jwt) {
    $parts = explode('.', $jwt);
    if (count($parts) !== 3) {
        return false;
    }
    
    list($base64Header, $base64Payload, $signatureProvided) = $parts;
    
    $header = json_decode(base64UrlDecode($base64Header), true);
    $payload = json_decode(base64UrlDecode($base64Payload), true);
    
    if (!$header || !$payload) {
        return false;
    }
    
    // Recreate the signature to verify it
    $expectedSignature = base64UrlEncode(hash_hmac('sha256', $base64Header . "." . $base64Payload, JWT_SECRET, true));
    
    if ($signatureProvided !== $expectedSignature) {
        return false;
    }
    
    // Check if the token has expired
    if (isset($payload['exp']) && $payload['exp'] < time()) {
        return false;
    }
    
    return $payload;
}

/**
 * Checks for Bearer Token in authorization headers.
 * Sends 401 response and exits if invalid.
 * @return array The validated token payload
 */
function checkAuthentication() {
    $authHeader = null;
    
    // Look for HTTP_AUTHORIZATION or Authorization in Server parameters
    if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
        $authHeader = trim($_SERVER['HTTP_AUTHORIZATION']);
    } elseif (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
        $authHeader = trim($_SERVER['REDIRECT_HTTP_AUTHORIZATION']);
    } elseif (function_exists('getallheaders')) {
        $headers = getallheaders();
        foreach ($headers as $name => $value) {
            if (strcasecmp($name, 'Authorization') === 0) {
                $authHeader = trim($value);
                break;
            }
        }
    }
    
    if (empty($authHeader)) {
        sendResponse(401, false, "Unauthorized: Authorization token is missing.");
    }
    
    // Extract Bearer token
    if (preg_match('/Bearer\s(\S+)/i', $authHeader, $matches)) {
        $jwt = $matches[1];
        $payload = validateJWT($jwt);
        
        if ($payload) {
            return $payload;
        }
    }
    
    sendResponse(401, false, "Unauthorized: Invalid or expired access token.");
}
