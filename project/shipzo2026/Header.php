<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Header.php - Reusable Header Component
header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipzo - Premium B2B Logistics & Transport</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="fa-solid fa-truck-fast me-2"></i>Ship<span>zo</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="booking">Booking</a></li>
                <li class="nav-item"><a class="nav-link" href="tracking">Tracking</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">More <i class="fa-solid fa-angle-down ms-1" style="font-size:0.8em;"></i></a>
                    <ul class="dropdown-menu border-0 shadow rounded-3 mt-2">
                        <li><a class="dropdown-item py-2" href="warehouse">Warehouse</a></li>
                        <li><a class="dropdown-item py-2" href="pricing">Pricing</a></li>
                        <li><a class="dropdown-item py-2" href="company">Company</a></li>
                        <li><a class="dropdown-item py-2" href="gallery">Gallery</a></li>
                        <li><a class="dropdown-item py-2" href="faq">FAQ</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary px-3 fw-bold" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user me-1"></i> <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Account'; ?> <i class="fa-solid fa-angle-down ms-1" style="font-size:0.8em;"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item py-2" href="profile"><i class="fa-solid fa-user-circle me-2 text-primary"></i> My Profile</a></li>
                            <li><a class="dropdown-item py-2" href="orders"><i class="fa-solid fa-box me-2 text-primary"></i> My Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="logout"><i class="fa-solid fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="login" class="btn btn-outline-primary px-3 fw-bold">Login</a>
                    <a href="signup" class="btn btn-primary px-3 fw-bold">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
