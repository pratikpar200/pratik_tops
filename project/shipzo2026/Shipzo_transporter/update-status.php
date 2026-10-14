<?php
include('includes/header.php');
include('includes/sidebar.php');
?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="glass-card p-4 mt-5">
            <h5 class="fw-bold mb-4">Update Order Status</h5>
            <form action="update-status" method="POST">
                <div class="mb-3">
                    <label class="form-label text-white-50">Select Assigned Order</label>
                    <select name="order_id" class="form-select glass-input" required>
                        <option value="">-- Select Order --</option>
                        <?php if(!empty($orders_arr)): foreach($orders_arr as $order): ?>
                        <option value="<?php echo $order->id ?? $order->order_id; ?>">Order #<?php echo $order->id ?? $order->order_id; ?> - <?php echo htmlspecialchars($order->customer_name); ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label text-white-50">New Status</label>
                    <select name="order_status" class="form-select glass-input" required>
                        <option value="Pending">Pending</option>
                        <option value="Picked Up">Picked Up</option>
                        <option value="In Transit">In Transit</option>
                        <option value="Out For Delivery">Out For Delivery</option>
                        <option value="Delivered">Delivered</option>
                    </select>
                </div>
                <button type="submit" name="update_status" class="btn btn-primary w-100 fw-bold">Update Status</button>
            </form>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
