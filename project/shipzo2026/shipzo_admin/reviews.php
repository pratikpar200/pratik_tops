<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">reviews</h4>
</div>

<div class="glass-table-wrapper">
    <div class="table-responsive">
        <table class="table glass-table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Rating</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if(!empty($feedback_arr)) {
                    foreach($feedback_arr as $fb) {
                        $seller_name = "Unknown";
                        if(!empty($seller_arr)) {
                            foreach($seller_arr as $s) {
                                if($s->seller_id == $fb->seller_id) {
                                    $seller_name = $s->full_name;
                                    break;
                                }
                            }
                        }
                ?>
                <tr>
                    <td class="ps-4"><?php echo $fb->feedback_id; ?></td>
                    <td>#ORD-<?php echo str_pad($fb->order_id, 4, '0', STR_PAD_LEFT); ?></td>
                    <td><?php echo htmlspecialchars($seller_name); ?></td>
                    <td>
                        <?php if($fb->rating >= 4): ?>
                            <span class="badge bg-success"><?php echo $fb->rating; ?> ★</span>
                        <?php elseif($fb->rating == 3): ?>
                            <span class="badge bg-warning text-dark"><?php echo $fb->rating; ?> ★</span>
                        <?php else: ?>
                            <span class="badge bg-danger"><?php echo $fb->rating; ?> ★</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($fb->comment); ?></td>
                    <td><?php echo date('d M Y, h:i A', strtotime($fb->created_at)); ?></td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center py-4'>No reviews found</td></tr>";
                }
                ?>
            </tbody>

        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>