<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<style>
    .auth-container { display: flex; align-items: center; justify-content: center; padding: 3rem 1rem; min-height: 100vh; }
    .glass-auth-card { max-width: 700px; width: 100%; padding: 2.5rem; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
    .form-control.glass-input, .form-select.glass-input { padding: 0.8rem 1.2rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white; }
    .form-control.glass-input:focus, .form-select.glass-input:focus { background: rgba(255,255,255,0.15); border-color: #ff9f43; color: white; box-shadow: none; }
    .glass-input::placeholder { color: rgba(255,255,255,0.5); }
    .form-label { font-weight: 500; color: rgba(255,255,255,0.8); }
</style>

<div class="auth-container">
    <div class="glass-auth-card text-white">
        <h3 class="text-center fw-bold mb-4">
            <i class="bi bi-pencil-square me-2 text-warning"></i>
            Edit Transporter
        </h3>

        <form method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control glass-input" value="<?php echo htmlspecialchars($fetch->name); ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control glass-input" value="<?php echo htmlspecialchars($fetch->email); ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control glass-input" value="<?php echo htmlspecialchars($fetch->phone); ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control glass-input" placeholder="Leave blank to keep current">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Vehicle Type</label>
                    <select name="vehicle_type" class="form-select glass-input" required>
                        <option value="Mini Truck (Tata Ace)" <?php if($fetch->vehicle_type == 'Mini Truck (Tata Ace)') echo 'selected'; ?>>Mini Truck (Tata Ace)</option>
                        <option value="Pickup (Bolero)" <?php if($fetch->vehicle_type == 'Pickup (Bolero)') echo 'selected'; ?>>Pickup (Bolero)</option>
                        <option value="Eicher (14ft / 17ft)" <?php if($fetch->vehicle_type == 'Eicher (14ft / 17ft)') echo 'selected'; ?>>Eicher (14ft / 17ft)</option>
                        <option value="Heavy Truck (6/10 Wheels)" <?php if($fetch->vehicle_type == 'Heavy Truck (6/10 Wheels)') echo 'selected'; ?>>Heavy Truck (6/10 Wheels)</option>
                        <option value="Container (20ft / 40ft)" <?php if($fetch->vehicle_type == 'Container (20ft / 40ft)') echo 'selected'; ?>>Container (20ft / 40ft)</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Account Status</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="active" value="Active" <?php if($fetch->status == 'Active' || $fetch->status == 'active') echo 'checked'; ?>>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="pending" value="Pending" <?php if($fetch->status != 'Active' && $fetch->status != 'active') echo 'checked'; ?>>
                            <label class="form-check-label" for="pending">Pending Verification</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control glass-input" rows="3" required><?php echo htmlspecialchars($fetch->address); ?></textarea>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" name="update_transporter" class="btn btn-warning py-2 fw-bold">
                    <i class="bi bi-save2-fill me-2"></i>
                    Update Transporter
                </button>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
