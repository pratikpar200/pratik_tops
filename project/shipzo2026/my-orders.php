<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user_id'])) {
    echo "<script>window.location='login';</script>";
    exit;
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Handle order update
if(isset($_POST['update_order'])) {
    $order_id = $_POST['order_id'];
    $arr = array(
        "customer_type" => $_POST['customer_type'],
        "customer_name" => $_POST['customer_name'],
        "contact_number" => $_POST['contact_number'],
        "email" => $_POST['email'],
        "pickup_address" => $_POST['pickup_address'],
        "delivery_address" => $_POST['delivery_address'],
        "pickup_date" => $_POST['pickup_date'],
        "expected_delivery" => $_POST['expected_delivery'],
        "parcel_type" => $_POST['parcel_type'],
        "quantity" => $_POST['quantity'],
        "delivery_speed" => $_POST['delivery_speed'],
        "special_instructions" => $_POST['special_instructions']
    );
    $where = array("order_id" => $order_id, "seller_id" => $_SESSION['user_id']); // Ensure only owner can update
    $run = $this->update_where('orders', $arr, $where);
    if($run) {
        echo "<script>alert('Order Updated Successfully'); window.location='orders';</script>";
        exit;
    }
}

// Fetch user orders
// We use $this->select_where from control.php
$res = $this->select_where('orders', array('seller_id' => $_SESSION['user_id']));
$orders = array();
if($res && $res->num_rows > 0) {
    while($row = $res->fetch_object()) {
        $orders[] = $row;
    }
}
?>
<?php include('Header.php'); ?>

<style>
    body { background: #f4f7fc; }
    .orders-section { padding: 100px 0 60px; min-height: calc(100vh - 80px); }
    .order-card { background: #fff; border-radius: 15px; border: none; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 20px; transition: 0.3s; }
    .order-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
    .status-badge { font-weight: 600; padding: 6px 12px; border-radius: 30px; font-size: 0.85rem; }
    .status-pending { background: #fff3cd; color: #856404; }
    .status-approved { background: #d4edda; color: #155724; }
    .status-in_transit { background: #cce5ff; color: #004085; }
    .status-delivered { background: #d1ecf1; color: #0c5460; }
    .status-cancelled { background: #f8d7da; color: #721c24; }
    .order-header { border-bottom: 1px solid #f0f0f0; padding-bottom: 15px; margin-bottom: 15px; }
    .detail-label { color: #888; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin-bottom: 4px; }
    .detail-value { font-weight: 500; color: #333; }
    .rating-stars input:checked ~ label { color: #ffc107 !important; }
    .rating-stars label:hover,
    .rating-stars label:hover ~ label { color: #ffc107 !important; }
</style>

<section class="orders-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary"><i class="fa-solid fa-boxes-packing me-2"></i> My Orders</h2>
            <a href="booking" class="btn btn-primary fw-bold px-4 rounded-pill shadow-sm"><i class="fa-solid fa-plus me-1"></i> New Order</a>
        </div>

        <?php if(count($orders) > 0): ?>
            <div class="row">
                <?php foreach($orders as $ord): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="order-card p-4">
                            <div class="order-header d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-dark">#ORD-<?php echo str_pad($ord->order_id, 4, '0', STR_PAD_LEFT); ?></h5>
                                <span class="status-badge status-<?php echo $ord->status; ?>"><?php echo ucfirst(str_replace('_', ' ', $ord->status)); ?></span>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-6 mb-3">
                                    <div class="detail-label"><i class="fa-solid fa-user text-muted me-1"></i> Customer</div>
                                    <div class="detail-value"><?php echo htmlspecialchars($ord->customer_name); ?></div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="detail-label"><i class="fa-solid fa-box text-muted me-1"></i> Parcel</div>
                                    <div class="detail-value"><?php echo htmlspecialchars($ord->parcel_type); ?> (x<?php echo $ord->quantity; ?>)</div>
                                </div>
                                <div class="col-6">
                                    <div class="detail-label"><i class="fa-solid fa-calendar text-muted me-1"></i> Pickup</div>
                                    <div class="detail-value"><?php echo date('d M Y', strtotime($ord->pickup_date)); ?></div>
                                </div>
                                <div class="col-6">
                                    <div class="detail-label"><i class="fa-solid fa-bolt text-muted me-1"></i> Speed</div>
                                    <div class="detail-value"><?php echo htmlspecialchars($ord->delivery_speed); ?></div>
                                </div>
                            </div>

                            <hr class="text-muted opacity-25">
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="small text-muted"><i class="fa-regular fa-clock me-1"></i> <?php echo date('d M Y, h:i A', strtotime($ord->created_at)); ?></div>
                                <div>
                                    <button class="btn btn-warning btn-sm rounded-pill px-3 fw-bold text-dark me-1" data-bs-toggle="modal" data-bs-target="#reviewModal<?php echo $ord->order_id; ?>"><i class="fa-solid fa-star"></i> Review</button>
                                    <button class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#editOrderModal<?php echo $ord->order_id; ?>">Edit Details</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Modal -->
                    <div class="modal fade" id="reviewModal<?php echo $ord->order_id; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4">
                                <div class="modal-header bg-warning text-dark rounded-top-4">
                                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-star me-2"></i>Rate Order #ORD-<?php echo str_pad($ord->order_id, 4, '0', STR_PAD_LEFT); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="orders">
                                    <div class="modal-body p-4 text-center">
                                        <input type="hidden" name="order_id" value="<?php echo $ord->order_id; ?>">
                                        <p class="mb-2 text-muted fw-bold">How was your experience?</p>
                                        
                                        <!-- Simple Star Rating using radio buttons -->
                                        <div class="rating-stars mb-4 fs-1" style="direction: rtl; unicode-bidi: bidi-override; display: inline-block;">
                                            <input type="radio" name="rating" value="5" id="star5_<?php echo $ord->order_id; ?>" class="d-none" required>
                                            <label for="star5_<?php echo $ord->order_id; ?>" class="star" style="cursor: pointer; color: #e4e5e9;">&#9733;</label>
                                            
                                            <input type="radio" name="rating" value="4" id="star4_<?php echo $ord->order_id; ?>" class="d-none">
                                            <label for="star4_<?php echo $ord->order_id; ?>" class="star" style="cursor: pointer; color: #e4e5e9;">&#9733;</label>
                                            
                                            <input type="radio" name="rating" value="3" id="star3_<?php echo $ord->order_id; ?>" class="d-none">
                                            <label for="star3_<?php echo $ord->order_id; ?>" class="star" style="cursor: pointer; color: #e4e5e9;">&#9733;</label>
                                            
                                            <input type="radio" name="rating" value="2" id="star2_<?php echo $ord->order_id; ?>" class="d-none">
                                            <label for="star2_<?php echo $ord->order_id; ?>" class="star" style="cursor: pointer; color: #e4e5e9;">&#9733;</label>
                                            
                                            <input type="radio" name="rating" value="1" id="star1_<?php echo $ord->order_id; ?>" class="d-none">
                                            <label for="star1_<?php echo $ord->order_id; ?>" class="star" style="cursor: pointer; color: #e4e5e9;">&#9733;</label>
                                        </div>

                                        <div class="text-start">
                                            <label class="form-label fw-bold small">Write your review</label>
                                            <textarea name="message" class="form-control bg-light" rows="3" placeholder="Tell us about the service..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pb-4 pe-4">
                                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="submit_review" class="btn btn-warning rounded-pill px-4 fw-bold text-dark">Submit Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editOrderModal<?php echo $ord->order_id; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4">
                                <div class="modal-header bg-primary text-white rounded-top-4">
                                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Order #ORD-<?php echo str_pad($ord->order_id, 4, '0', STR_PAD_LEFT); ?></h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post">
                                    <div class="modal-body p-4">
                                        <input type="hidden" name="order_id" value="<?php echo $ord->order_id; ?>">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold small">Customer Type</label>
                                                <select name="customer_type" class="form-select bg-light" required>
                                                    <option value="B2B" <?php if($ord->customer_type == 'B2B') echo 'selected'; ?>>B2B</option>
                                                    <option value="B2C" <?php if($ord->customer_type == 'B2C') echo 'selected'; ?>>B2C</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold small">Customer Name</label>
                                                <input type="text" name="customer_name" class="form-control bg-light" value="<?php echo htmlspecialchars($ord->customer_name); ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold small">Contact Number</label>
                                                <input type="text" name="contact_number" class="form-control bg-light" value="<?php echo htmlspecialchars($ord->contact_number); ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold small">Email</label>
                                                <input type="email" name="email" class="form-control bg-light" value="<?php echo htmlspecialchars($ord->email); ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold small">Pickup Address</label>
                                                <textarea name="pickup_address" class="form-control bg-light" required><?php echo htmlspecialchars($ord->pickup_address); ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold small">Delivery Address</label>
                                                <textarea name="delivery_address" class="form-control bg-light" required><?php echo htmlspecialchars($ord->delivery_address); ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold small">Pickup Date</label>
                                                <input type="date" name="pickup_date" class="form-control bg-light" value="<?php echo $ord->pickup_date; ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold small">Expected Delivery</label>
                                                <input type="date" name="expected_delivery" class="form-control bg-light" value="<?php echo $ord->expected_delivery; ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold small">Parcel Type</label>
                                                <input type="text" name="parcel_type" class="form-control bg-light" value="<?php echo htmlspecialchars($ord->parcel_type); ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold small">Quantity</label>
                                                <input type="number" name="quantity" class="form-control bg-light" value="<?php echo htmlspecialchars($ord->quantity); ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold small">Delivery Speed</label>
                                                <select name="delivery_speed" class="form-select bg-light" required>
                                                    <option value="Standard" <?php if($ord->delivery_speed == 'Standard') echo 'selected'; ?>>Standard</option>
                                                    <option value="Express" <?php if($ord->delivery_speed == 'Express') echo 'selected'; ?>>Express</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-bold small">Special Instructions</label>
                                                <textarea name="special_instructions" class="form-control bg-light"><?php echo htmlspecialchars($ord->special_instructions); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pb-4 pe-4">
                                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="update_order" class="btn btn-primary rounded-pill px-4 fw-bold">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <div class="display-1 text-muted opacity-25 mb-3"><i class="fa-solid fa-box-open"></i></div>
                <h4 class="fw-bold text-muted">No Orders Found</h4>
                <p class="text-muted mb-4">You haven't placed any orders yet. Start booking your first shipment today!</p>
                <a href="booking" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold shadow-sm">Book a Shipment</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include('Footer.php'); ?>
