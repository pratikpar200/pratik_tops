<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user'])) {
    echo "<script>window.location='home';</script>";
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
    <title>Login - Shipzo</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="auth-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="auth-card p-4 shadow rounded bg-white">

                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <a href="index.php" class="text-decoration-none">
                            <h2 class="fw-bold text-primary">
                                <i class="fa-solid fa-truck-fast me-2 text-danger"></i>
                                Ship<span class="text-danger">zo</span>
                            </h2>
                        </a>

                        <p class="text-muted mt-2">
                            Welcome back to the portal
                        </p>
                    </div>

                    <!-- Login Form -->
                    <form action="login" method="post" onsubmit="return login_validation(this)">
                        <div id="msg" class="text-danger mb-3 text-center" style="font-weight: bold;"></div>

                        <!-- Email / Phone -->
                        <div class="mb-3">
                            <label class="form-label fw-bold small">
                                Email or Phone
                            </label>

                            <input 
                                type="text" 
                                name="email"
                                class="form-control form-control-lg"
                                placeholder="Enter your email or phone"
                                required
                            >
                        </div>

                        <!-- Password -->
                        <div class="mb-3">

                            <label class="form-label fw-bold small d-flex justify-content-between">
                                Password

                                <a href="forgot-password.php" class="text-decoration-none text-danger">
                                    Forgot?
                                </a>
                            </label>

                            <input 
                                type="password"
                                name="password"
                                class="form-control form-control-lg"
                                placeholder="Enter Password"
                                required
                            >
                        </div>

                        <!-- Remember -->
                        <div class="mb-3 form-check">
                            <input 
                                type="checkbox"
                                class="form-check-input"
                                id="remember"
                                name="remember"
                            >

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <!-- Submit -->
                        <button 
                            type="submit"
                            name="login"
                            class="btn btn-primary btn-lg w-100 fw-bold mb-3"
                        >
                            Sign In
                        </button>

                    </form>

                    <!-- Receiver Login -->
                    <div class="text-center mt-3 border-top pt-3">

                        <p class="mb-2 text-muted">
                            Are you a receiver tracking a package?
                        </p>

                        <a href="receiver-login.php" class="btn btn-outline-dark w-100">
                            <i class="fa-solid fa-box-open me-2"></i>
                            Receiver Login
                        </a>

                    </div>

                    <!-- Signup -->
                    <div class="text-center mt-4">

                        <p class="text-muted small">
                            Don't have an account?

                            <a href="signup" class="fw-bold text-decoration-none text-primary">
                                Sign Up
                            </a>
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/js/validation.js"></script>
</body>
</html>