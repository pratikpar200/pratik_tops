<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(isset($_SESSION['employee'])) {
    echo "<script>window.location='dashboard';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipzo | Employee Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            width: 100%;
            max-width: 450px;
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="glass-bg">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <div class="login-wrapper">
        <div class="glass-panel login-card text-center">
            <div class="logo-area d-flex align-items-center justify-content-center mb-4">
                <div class="logo-icon me-2" style="width:50px;height:50px;background:linear-gradient(135deg,#0d6efd,#00c6ff);border-radius:14px;color:#fff;font-size:24px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-truck"></i>
                </div>
                <h3 class="fw-bold mb-0 text-white">Ship<span style="color:#00c6ff;">zo</span></h3>
            </div>
            
            <h5 class="text-white mb-1">Employee Portal</h5>
            <p class="text-white-50 small mb-4">Please enter your credentials to continue</p>

            <form action="login" method="POST">
                <div class="mb-3 text-start">
                    <label class="form-label">Employee Email</label>
                    <div class="input-group">
                        <span class="input-group-text glass-input border-end-0"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control glass-input border-start-0" placeholder="name@shipzo.com" required>
                    </div>
                </div>
                <div class="mb-4 text-start">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text glass-input border-end-0"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control glass-input border-start-0" placeholder="••••••••" required>
                    </div>
                    <div class="text-end mt-2">
                        <a href="#" class="text-white-50 small text-decoration-none">Forgot Password?</a>
                    </div>
                </div>
                
                <button type="submit" name="login" class="btn btn-glass-primary w-100 py-2 mb-4">Sign In</button>
                
                <p class="text-white-50 small mb-0">Don't have an account? <br> <span class="text-white">Contact Administrator to register.</span></p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
