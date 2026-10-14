<?php
include('includes/header.php');
include('includes/sidebar.php');
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Order OTP Details</h4>
</div>
<div class="glass-table-wrapper">
    <div class="table-responsive">
        <table class="table glass-table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">Order ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th class="text-end pe-4">OTP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($orders_arr)) {
                    foreach($orders_arr as $order) {
                ?>
                <tr>
                    <td class="ps-4"><?php echo $order->id ?? $order->order_id; ?></td>
                    <td><?php echo htmlspecialchars($order->customer_name ?? 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars($order->contact_number ?? 'N/A'); ?></td>
                    <td>
                        <span class="badge bg-info text-dark"><?php echo htmlspecialchars($order->order_status ?? 'Pending'); ?></span>
                    </td>
                    <td class="text-end pe-4">
                        <span class="fw-bold fs-5 tracking-widest"><?php echo htmlspecialchars($order->otp ?? 'N/A'); ?></span>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center py-4'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php'); ?>
