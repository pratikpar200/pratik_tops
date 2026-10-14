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
    <title>Receiver Login - Shipzo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="auth-wrapper" style="background-image: url('images/cargo1.jpg');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="auth-card border-top border-5 border-accent">
                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <h2 class="fw-bold text-dark mb-0"><i class="fa-solid fa-truck-fast me-2 text-primary"></i>Ship<span class="text-primary">zo</span></h2>
                        </div>
                        <h3 class="fw-bold text-dark">Receiver Access</h3>
                        <p class="text-muted small">Log in to track your incoming package and view OTP.</p>
                    </div>
                    
                    <form action="tracking.php">
                        <div class="mb-4">
                            <label class="form-label fw-bold small">Gmail or Phone Number</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white"><i class="fa-solid fa-user text-muted"></i></span>
                                <input type="text" class="form-control border-start-0 ps-0" placeholder="Enter details to verify" required>
                            </div>
                            <div class="form-text">As a receiver, you don't need a password. We'll send a login link or use your phone for verification.</div>
                        </div>
                        
                        <button type="submit" class="btn btn-dark btn-lg w-100 fw-bold shadow-sm mb-3">View Shipment</button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <a href="login.php" class="text-muted small text-decoration-none"><i class="fa-solid fa-arrow-left me-1"></i> Back to main login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
