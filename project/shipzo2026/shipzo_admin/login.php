<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['admin'])) {
    echo "<script>window.location='dashboard';</script>";
    exit;
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Shipzo Transport</title>
    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Local CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .auth-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem; }
        .glass-auth-card { max-width: 450px; width: 100%; padding: 2.5rem; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
        .form-control.glass-input { padding: 0.8rem 1.2rem; }
    </style>
</head>
<body>
    <div class="glass-bg">
        <div class="blob blob-1"></div><div class="blob blob-2"></div><div class="blob blob-3"></div>
    </div>
    
    <div class="auth-container">
        <div class="glass-auth-card text-white text-center">
            <div class="logo-icon mx-auto mb-3" style="width: 60px; height: 60px; font-size: 2rem;">
                <i class="bi bi-box-seam-fill text-white"></i>
            </div>
            <h3 class="fw-bold mb-1">Welcome Back</h3>
            <p class="text-white-50 small mb-4">Sign in to Shipzo Admin Panel</p>
            
           <form action="login" method="post">
                <div class="mb-3">
                    <label class="form-label text-white-50">Email</label>
                    <input type="email" name="email" class="form-control glass-input" placeholder="admin@shipzo.com">
                </div>
                <div class="mb-3">
                    <label class="form-label text-white-50">Password</label>
                    <input type="password" name="password" class="form-control glass-input" placeholder="••••••••">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label text-white-50 small" for="rememberMe">Remember Me</label>
                    </div>
                    <a href="#" class="text-accent text-decoration-none small text-white">Forgot Password?</a>
                </div>
                <button type="submit" name="login" class="btn btn-glass-primary w-100 py-2 mb-3">Login Securely</button>
                <div class="text-center">
                    <span class="text-white-50 small">Don't have access?</span>
                    <a href="signup" class="text-info text-decoration-none small fw-bold">Request Account</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
