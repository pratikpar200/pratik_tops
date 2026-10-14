<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">otp_verification</h4>
</div>

<div class="glass-table-wrapper">
    <div class="table-responsive">
        <table class="table glass-table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Order ID</th>
                    <th>OTP</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="ps-4">1</td>
                    <td>ORD1001</td>
                    <td>4582</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                </tr>

                <tr>
                    <td class="ps-4">2</td>
                    <td>ORD1002</td>
                    <td>7741</td>
                    <td><span class="badge bg-success">Verified</span></td>
                </tr>

                <tr>
                    <td class="ps-4">3</td>
                    <td>ORD1003</td>
                    <td>9125</td>
                    <td><span class="badge bg-secondary">Expired</span></td>
                </tr>

                <tr>
                    <td class="ps-4">4</td>
                    <td>ORD1004</td>
                    <td>3368</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                </tr>

                <tr>
                    <td class="ps-4">5</td>
                    <td>ORD1005</td>
                    <td>5501</td>
                    <td><span class="badge bg-success">Verified</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>