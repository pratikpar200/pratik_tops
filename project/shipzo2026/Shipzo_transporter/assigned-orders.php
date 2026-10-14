<?php
include('includes/header.php');
include('includes/sidebar.php');
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">My Assigned Orders</h4>
</div>
<div class="glass-table-wrapper">
    <div class="table-responsive">
        <table class="table glass-table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">Order ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Pickup</th>
                    <th>Delivery</th>
                    <th>Date</th>
                    <th class="text-end pe-4">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($orders_arr)) {
                    foreach($orders_arr as $order) {
                ?>
                <tr>
                    <td class="ps-4"><?php echo $order->id ?? $order->order_id ?? 'N/A'; ?></td>
                    <td><?php echo htmlspecialchars($order->customer_name); ?></td>
                    <td><?php echo htmlspecialchars($order->contact_number); ?></td>
                    <td><?php echo htmlspecialchars($order->pickup_address); ?></td>
                    <td><?php echo htmlspecialchars($order->delivery_address); ?></td>
                    <td><?php echo htmlspecialchars($order->pickup_date); ?></td>
                    <td class="text-end pe-4">
                        <a href="update-status?id=<?php echo $order->id ?? $order->order_id; ?>" class="btn btn-sm btn-primary">Update Status</a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center py-4'>No assigned orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('includes/footer.php'); ?>
