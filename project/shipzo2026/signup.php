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
    <title>Sign Up - Shipzo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="auth-wrapper" style="background-image: url('images/hero-banner.jpg');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="auth-card">

                    <div class="text-center mb-4">
                        <a href="index.php" class="text-decoration-none">
                            <h2 class="fw-bold" style="color: var(--primary-blue);">
                                <i class="fa-solid fa-truck-fast me-2 text-accent"></i>
                                Ship<span class="text-accent">zo</span>
                            </h2>
                        </a>

                        <p class="text-muted mt-2">
                            Create your professional logistics account
                        </p>
                    </div>

                    <!-- FORM START -->
                    <form action="signup" method="POST" onsubmit="return signup_validation(this)">
                        <div id="msg" class="text-danger mb-3 text-center" style="font-weight: bold;"></div>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">
                                    Full Name / Company Name
                                </label>

                                <input type="text"
                                       name="full_name"
                                       class="form-control"
                                       placeholder="John Doe / Acme Corp"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">
                                    Phone Number
                                </label>

                                <input type="tel"
                                       name="phone"
                                       class="form-control"
                                       placeholder="+91 9876543210"
                                       required>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small">
                                    Email Address
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="name@company.com"
                                       required>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small">
                                    Password
                                </label>

                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       placeholder="Create a strong password"
                                       required>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="form-check">

                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="terms"
                                           required>

                                    <label class="form-check-label small text-muted" for="terms">

                                        I agree to the
                                        <a href="#" class="text-primary-theme">
                                            Terms of Service
                                        </a>
                                        and
                                        <a href="#" class="text-primary-theme">
                                            Privacy Policy
                                        </a>

                                    </label>

                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="create_account"
                                        class="btn btn-primary btn-lg w-100 fw-bold">

                                    Create Account

                                </button>
                            </div>

                        </div>

                    </form>
                    <!-- FORM END -->

                    <div class="text-center mt-4 pt-3 border-top">

                        <p class="text-muted small mb-0">

                            Already have an account?

                            <a href="login"
                               class="fw-bold text-primary-theme text-decoration-none">

                                Sign In

                            </a>

                        </p>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="assets/js/validation.js"></script>
</body>
</html>