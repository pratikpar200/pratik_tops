<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="row mb-4">
    <div class="col-12">
        <div class="glass-card p-4">
            <h4 class="fw-bold mb-3">Welcome, <?php echo isset($_SESSION['employee_name']) ? $_SESSION['employee_name'] : 'Employee'; ?></h4>
            <div class="row">
                <div class="col-md-4">
                    <p class="text-white-50 mb-1"><i class="bi bi-person-badge text-primary me-2"></i> <strong>Name:</strong> <?php echo isset($_SESSION['employee_name']) ? $_SESSION['employee_name'] : 'N/A'; ?></p>
                </div>
                <div class="col-md-4">
                    <p class="text-white-50 mb-1"><i class="bi bi-envelope text-info me-2"></i> <strong>Email:</strong> <?php echo isset($_SESSION['employee_email']) ? $_SESSION['employee_email'] : 'N/A'; ?></p>
                </div>
                <div class="col-md-4">
                    <p class="text-white-50 mb-1"><i class="bi bi-telephone text-success me-2"></i> <strong>Mobile:</strong> <?php echo isset($_SESSION['employee_phone']) ? $_SESSION['employee_phone'] : 'N/A'; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Summary Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-4 col-sm-6">
        <div class="glass-card stat-card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-white-50 mb-1">Total Managed Orders</h6>
                    <h3 class="fw-bold mb-0"></h3>
                </div>
                <div class="stat-icon text-info"><i class="bi bi-boxes"></i></div>
            </div>
        </div>
    </div>
</div>
    
<?php include 'includes/footer.php'; ?>
