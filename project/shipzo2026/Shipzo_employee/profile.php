<?php
include('includes/header.php');
include('includes/sidebar.php');
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0 text-white">Employee Profile</h4>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="glass-panel p-4 text-center">
                <div class="position-relative d-inline-block mb-4">
                    <div class="rounded-circle p-1" style="background: linear-gradient(135deg, #6c5ce7, #00cec9);">
                        <img src="https://ui-avatars.com/api/?name=Shipzo+Employee&background=0f172a&color=fff&size=150" class="rounded-circle border border-4 border-dark" alt="Profile" style="width: 140px; height: 140px; object-fit: cover;">
                    </div>
                    <button class="btn btn-sm btn-glass-primary position-absolute bottom-0 end-0 rounded-circle" style="width: 35px; height: 35px; padding: 0;"><i class="bi bi-camera"></i></button>
                </div>
                <h4 class="fw-bold mb-1">Rajesh Malhotra</h4>
                <p class="text-white-50 mb-3">Senior Logistics Coordinator</p>
                <div class="d-flex justify-content-center gap-2">
                    <span class="glass-badge badge-success">Active</span>
                    <span class="glass-badge">ID: EMP-9921</span>
                </div>
                <hr class="glass-divider my-4">
                <div class="text-start">
                    <p class="small mb-2"><i class="bi bi-envelope me-2 text-primary"></i> r.malhotra@shipzo.com</p>
                    <p class="small mb-2"><i class="bi bi-telephone me-2 text-primary"></i> +91 98765 43210</p>
                    <p class="small mb-0"><i class="bi bi-building me-2 text-primary"></i> Operations Department</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="glass-panel p-4 mb-4">
                <h5 class="fw-bold mb-4">Personal Information</h5>
                <form action="profile" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control glass-input" value="Rajesh Malhotra">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control glass-input" value="r.malhotra@shipzo.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control glass-input" value="+91 98765 43210">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Department</label>
                            <input type="text" class="form-control glass-input" value="Operations" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-glass-primary mt-4">Save Changes</button>
                </form>
            </div>

            <div class="glass-panel p-4">
                <h5 class="fw-bold mb-4">Change Password</h5>
                <form action="profile" method="POST">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control glass-input" placeholder="********">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control glass-input" placeholder="Enter new password">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control glass-input" placeholder="Repeat new password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-glass-outline mt-4">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
