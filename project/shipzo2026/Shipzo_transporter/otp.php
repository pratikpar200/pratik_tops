<?php
include('includes/header.php');
include('includes/sidebar.php');
?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="glass-card p-4 mt-5">
            <h5 class="fw-bold mb-4">OTP Verification</h5>
            <form action="otp" method="POST">
                <div class="mb-3">
                    <label class="form-label text-white-50">Select Order</label>
                    <select name="order_id" class="form-select glass-input" required>
                        <option value="">-- Select Order --</option>
                        <?php if(!empty($orders_arr)): foreach($orders_arr as $order): ?>
                        <option value="<?php echo $order->id ?? $order->order_id; ?>">Order #<?php echo $order->id ?? $order->order_id; ?> - <?php echo htmlspecialchars($order->customer_name); ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label text-white-50">Enter Delivery OTP</label>
                    <input type="text" name="otp" class="form-control glass-input" required placeholder="Ask customer for OTP">
                </div>
                <button type="submit" name="verify_otp" class="btn btn-warning w-100 fw-bold text-dark">Verify OTP & Mark Delivered</button>
            </form>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
