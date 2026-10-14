<?php
include('includes/header.php');
include('includes/sidebar.php');
?>

<div class="container-fluid">
    <div class="row">
        <!-- Profile Info -->
        <div class="col-lg-7">
            <div class="glass-panel p-4 mb-4">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom border-white-10">
                    <div class="profile-avatar-large me-4 rounded-circle d-flex align-items-center justify-content-center text-white fs-1 shadow" 
                         style="width: 100px; height: 100px; background: linear-gradient(135deg,#ff9f43,#ff6b6b);">
                        <i class="bi bi-truck-flatbed"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-1">FastTrack Logistics</h4>
                        <p class="text-white-50 mb-0"><i class="bi bi-patch-check-fill text-info me-1"></i> Verified Transporter</p>
                    </div>
                </div>

                <form action="profile" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-white-50 small">Company Name</label>
                            <input type="text" class="form-control glass-input" value="FastTrack Logistics Pvt Ltd">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white-50 small">Owner Name</label>
                            <input type="text" class="form-control glass-input" value="Rajesh Malhotra">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white-50 small">Email Address</label>
                            <input type="email" class="form-control glass-input" value="contact@fasttrack.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white-50 small">Phone Number</label>
                            <input type="text" class="form-control glass-input" value="+91 98765 43210">
                        </div>
                        <div class="col-12">
                            <label class="form-label text-white-50 small">Office Address</label>
                            <textarea class="form-control glass-input" rows="2">402, Logistics Hub, Transport Nagar, Delhi - 110001</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white-50 small">GST Number</label>
                            <input type="text" class="form-control glass-input" value="07AAAAA0000A1Z5" readonly>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-glass-primary px-4">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Security / Password -->
        <div class="col-lg-5">
            <div class="glass-panel p-4 mb-4">
                <h5 class="fw-bold mb-4"><i class="bi bi-shield-lock me-2 text-warning"></i> Change Password</h5>
                <form action="profile" method="POST">
                    <div class="mb-3">
                        <label class="form-label text-white-50 small">Current Password</label>
                        <input type="password" class="form-control glass-input" placeholder="••••••••">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50 small">New Password</label>
                        <input type="password" class="form-control glass-input" placeholder="Min 8 characters">
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-white-50 small">Confirm New Password</label>
                        <input type="password" class="form-control glass-input" placeholder="••••••••">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-glass-warning">Update Password</button>
                    </div>
                </form>
            </div>

            <!-- Documents Status -->
            <div class="glass-card p-4">
                <h6 class="fw-bold mb-3">Verification Documents</h6>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="small text-white-50">GST Certificate</span>
                    <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25">Verified</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="small text-white-50">Pan Card</span>
                    <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25">Verified</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="small text-white-50">Vehicle Insurance</span>
                    <span class="badge bg-warning bg-opacity-25 text-warning border border-warning border-opacity-25">Expiring Soon</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
