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
            <i class="bi bi-truck-flatbed me-2 text-warning"></i>
            Add New Transporter
        </h3>

       <form action="add_transporter" method="POST">
            <div class="row">
                

                <!-- Owner Name -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">name</label>
                    <input type="text" name="name" class="form-control glass-input" placeholder="e.g. Rajesh Malhotra" required>
                </div>

                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control glass-input" placeholder="transporter@example.com" required>
                </div>

                <!-- Phone -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control glass-input" placeholder="+91 98765 43210" required>
                </div>

                <!-- Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control glass-input" placeholder="Assign a password" required>
                </div>

                <!-- Vehicle Type -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Vehicle Type</label>
                    <select name="vehicle_type" class="form-select glass-input" required>
                        <option selected disabled>Select Primary Vehicle</option>
                        <option>Mini Truck (Tata Ace)</option>
                        <option>Pickup (Bolero)</option>
                        <option>Eicher (14ft / 17ft)</option>
                        <option>Heavy Truck (6/10 Wheels)</option>
                        <option>Container (20ft / 40ft)</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Account Status</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="active" value="Active" checked>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="pending" value="Pending">
                            <label class="form-check-label" for="pending">Pending Verification</label>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="col-md-12 mb-4">
                    <label class="form-label"> Address</label>
                    <textarea name="address" class="form-control glass-input" rows="3" placeholder="Enter full office address" required></textarea>
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-grid gap-2">
                <button type="submit" name="save_transporter" class="btn btn-warning py-2 fw-bold">
                    <i class="bi bi-save2-fill me-2"></i>
                    Save Transporter
                </button>

                <button type="reset" class="btn btn-outline-light py-2">
                    <i class="bi bi-arrow-clockwise me-2"></i>
                    Reset Form
                </button>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
