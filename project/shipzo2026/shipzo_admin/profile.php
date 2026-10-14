<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Admin Profile Settings</h4>
</div>

<div class="row g-4">
    <div class="col-xl-4">
        <div class="glass-card p-4 text-center h-100">
            <div class="position-relative d-inline-block mb-4 mt-3">
                <img src="https://ui-avatars.com/api/?name=Admin+User&background=6c5ce7&color=fff&size=200" class="rounded-circle border border-4 border-white shadow-lg" alt="Profile">
                <button class="btn btn-primary rounded-circle position-absolute bottom-0 end-0 shadow" style="width: 45px; height: 45px; transform: translate(-10%, -10%);">
                    <i class="bi bi-camera fs-5"></i>
                </button>
            </div>
            <h4 class="fw-bold mb-1">Super Admin</h4>
            <p class="text-white-50 mb-3">admin@shipzotransport.com</p>
            <span class="glass-badge badge-success text-white px-3 py-2"><i class="bi bi-shield-lock-fill me-2"></i>Full System Access</span>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="glass-card p-4 h-100">
            <h5 class="fw-bold border-bottom border-light border-opacity-10 pb-3 mb-4">Personal Details</h5>
            <form>
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label text-white-50 small">Full Name</label>
                        <input type="text" class="form-control glass-input" value="Super Admin">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white-50 small">Email Address</label>
                        <input type="email" class="form-control glass-input" value="admin@shipzotransport.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white-50 small">Phone Number</label>
                        <input type="tel" class="form-control glass-input" value="+1 (555) 123-4567">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white-50 small">Headquarters Address</label>
                        <input type="text" class="form-control glass-input" value="123 Logistics Ave, NY 10001">
                    </div>
                </div>

                <h5 class="fw-bold border-bottom border-light border-opacity-10 pb-3 mb-4 mt-5">Security & Password</h5>
                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label text-white-50 small">Current Password</label>
                        <input type="password" class="form-control glass-input" placeholder="••••••••">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-white-50 small">New Password</label>
                        <input type="password" class="form-control glass-input" placeholder="Strong password">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-white-50 small">Confirm New Password</label>
                        <input type="password" class="form-control glass-input" placeholder="Verify password">
                    </div>
                </div>

                <div class="text-end mt-5">
                    <button type="button" class="btn btn-glass-primary px-5 py-2 fw-bold">Update Profile Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
