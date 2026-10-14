<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<style>
    .auth-container { display: flex; align-items: center; justify-content: center; padding: 3rem 1rem; min-height: 100vh; }
    .glass-auth-card { max-width: 600px; width: 100%; padding: 2.5rem; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
    .form-control.glass-input, .form-select.glass-input { padding: 0.8rem 1.2rem; }
</style>

<div class="auth-container">
    <div class="glass-auth-card text-white">
        <h3 class="text-center fw-bold mb-4">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Seller
        </h3>

        <form method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white-50">Full Name</label>
                    <input type="text" name="full_name" class="form-control glass-input" value="<?php echo htmlspecialchars($fetch->full_name); ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white-50">Email Address</label>
                    <input type="email" name="email" class="form-control glass-input" value="<?php echo htmlspecialchars($fetch->email); ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white-50">Phone Number</label>
                    <input type="text" name="phone" class="form-control glass-input" value="<?php echo htmlspecialchars($fetch->phone); ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white-50">Password</label>
                    <input type="password" name="password" class="form-control glass-input" placeholder="Leave blank to keep current">
                </div>
            </div>

            <button type="submit" name="update_seller" class="btn btn-warning py-2 w-100">
                Update Seller
            </button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
