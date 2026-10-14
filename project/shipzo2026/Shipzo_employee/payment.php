<?php
include('includes/header.php');
include('includes/sidebar.php');
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Payments Overview</h4>
</div>
<div class="glass-table-wrapper">
    <div class="table-responsive">
        <table class="table glass-table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">Payment ID</th>
                    <th>Order ID</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($payment_arr)) {
                    foreach($payment_arr as $payment) {
                ?>
                <tr>
                    <td class="ps-4"><?php echo $payment->id; ?></td>
                    <td>#<?php echo htmlspecialchars($payment->order_id ?? 'N/A'); ?></td>
                    <td class="fw-bold text-success">₹<?php echo htmlspecialchars($payment->amount ?? '0'); ?></td>
                    <td><?php echo htmlspecialchars($payment->payment_method ?? 'N/A'); ?></td>
                    <td>
                        <span class="badge <?php echo (strtolower($payment->payment_status ?? '') == 'completed' || strtolower($payment->status ?? '') == 'success') ? 'bg-success' : 'bg-warning text-dark'; ?>">
                            <?php echo htmlspecialchars($payment->payment_status ?? $payment->status ?? 'Pending'); ?>
                        </span>
                    </td>
                    <td><?php echo htmlspecialchars($payment->created_at ?? $payment->payment_date ?? ''); ?></td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center py-4'>No payment records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php'); ?>
