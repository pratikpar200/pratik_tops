<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>



<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="glass-card p-4 d-flex align-items-center gap-3 border-start border-4 border-success">
            <div class="stat-icon text-success">
                <i class="bi bi-shield-check"></i>
            </div>
            <div>
                <h6 class="text-white-50 mb-1">Cleared Earnings</h6>
                <h4 class="fw-bold mb-0">₹18,750</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="glass-card p-4 d-flex align-items-center gap-3 border-start border-4 border-warning">
            <div class="stat-icon text-warning">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <div>
                <h6 class="text-white-50 mb-1">Pending Clearance</h6>
                <h4 class="fw-bold mb-0">₹6,420</h4>
            </div>
        </div>
    </div>
</div>

<div class="glass-table-wrapper">
    <div class="table-responsive">
        <table class="table glass-table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">Payment ID</th>
                    <th>Order ID</th>
                    <th>Amount</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Created At</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="ps-4">1</td>
                    <td>1</td>
                    <td>₹4,500</td>
                    <td>UPI</td>
                    <td><span class="badge bg-success">Paid</span></td>
                    <td>2026-04-26</td>
                </tr>

                <tr>
                    <td class="ps-4">2</td>
                    <td>2</td>
                    <td>₹3,200</td>
                    <td>Card</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td>2026-04-25</td>
                </tr>

                <tr>
                    <td class="ps-4">3</td>
                    <td>3</td>
                    <td>₹5,700</td>
                    <td>Net Banking</td>
                    <td><span class="badge bg-success">Paid</span></td>
                    <td>2026-04-24</td>
                </tr>

                <tr>
                    <td class="ps-4">4</td>
                    <td>4</td>
                    <td>₹2,950</td>
                    <td>Cash</td>
                    <td><span class="badge bg-danger">Failed</span></td>
                    <td>2026-04-23</td>
                </tr>

                <tr>
                    <td class="ps-4">5</td>
                    <td>5</td>
                    <td>₹6,100</td>
                    <td>UPI</td>
                    <td><span class="badge bg-success">Paid</span></td>
                    <td>2026-04-22</td>
                </tr>
            </tbody>

        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>