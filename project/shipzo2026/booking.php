```php
<?php include_once("Header.php"); ?>

<div class="page-header" style="padding: 120px 0 60px;">
    <div class="container">
        <h1>Book a Shipment</h1>
        <p class="lead">Premium booking portal for B2B & B2C customers.</p>
    </div>
</div>

<section class="section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                    <div class="row g-0">

                        <!-- Left Side -->
                        <div class="col-md-4 text-white p-5 d-flex flex-column justify-content-center"
                             style="background: linear-gradient(rgba(13,71,161,0.9), rgba(13,71,161,0.9)),
                             url('images/truck2.jpg') center/cover;">

                            <h3 class="fw-bold mb-4">Why Book with Shipzo?</h3>

                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <i class="fa-solid fa-check-circle text-warning me-2"></i>
                                    Instant Quote
                                </li>

                                <li class="mb-3">
                                    <i class="fa-solid fa-check-circle text-warning me-2"></i>
                                    Dedicated Support
                                </li>

                                <li class="mb-3">
                                    <i class="fa-solid fa-check-circle text-warning me-2"></i>
                                    Secure Delivery
                                </li>

                                <li class="mb-3">
                                    <i class="fa-solid fa-check-circle text-warning me-2"></i>
                                    Live Tracking
                                </li>

                                <li class="mb-3">
                                    <i class="fa-solid fa-check-circle text-warning me-2"></i>
                                    Fast Pickup
                                </li>
                            </ul>

                        </div>

                        <!-- Right Side -->
                        <div class="col-md-8 p-5">

                            <h4 class="fw-bold mb-4">Shipment Details</h4>

                            <form method="POST" onsubmit="return booking_validation(this)">
                                <div id="msg" class="text-danger mb-3 text-center" style="font-weight: bold;"></div>
                                <div class="row g-3">

                                    <!-- Customer Details -->
                                    <div class="col-12">
                                        <h6 class="fw-bold text-primary border-bottom pb-2">
                                            Customer Details
                                        </h6>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Customer Type
                                        </label>

                                        <select name="customer_type"
                                                class="form-select bg-light"
                                                required>

                                            <option value="">Select Type</option>
                                            <option>B2B</option>
                                            <option>B2C</option>

                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Company / Customer Name
                                        </label>

                                        <input type="text"
                                               name="customer_name"
                                               class="form-control bg-light"
                                               placeholder="Enter Name"
                                               required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Contact Number
                                        </label>

                                        <input type="tel"
                                               name="contact_number"
                                               class="form-control bg-light"
                                               placeholder="+91 9876543210"
                                               required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Email Address
                                        </label>

                                        <input type="email"
                                               name="email"
                                               class="form-control bg-light"
                                               placeholder="Enter Email">
                                    </div>

                                    <!-- Pickup & Delivery -->
                                    <div class="col-12 mt-4">
                                        <h6 class="fw-bold text-primary border-bottom pb-2">
                                            Pickup & Delivery
                                        </h6>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Pickup Address
                                        </label>

                                        <input type="text"
                                               name="pickup_address"
                                               class="form-control bg-light"
                                               placeholder="Pickup Location"
                                               required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Delivery Address
                                        </label>

                                        <input type="text"
                                               name="delivery_address"
                                               class="form-control bg-light"
                                               placeholder="Delivery Location"
                                               required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Pickup Date
                                        </label>

                                        <input type="date"
                                               name="pickup_date"
                                               class="form-control bg-light"
                                               required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Expected Delivery
                                        </label>

                                        <input type="date"
                                               name="expected_delivery"
                                               class="form-control bg-light">
                                    </div>

                                    <!-- Shipment Info -->
                                    <div class="col-12 mt-4">
                                        <h6 class="fw-bold text-primary border-bottom pb-2">
                                            Shipment Info
                                        </h6>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Parcel Type
                                        </label>

                                        <select name="parcel_type"
                                                class="form-select bg-light">

                                            <option>Documents</option>
                                            <option>Boxes</option>
                                            <option>Electronics</option>
                                            <option>Fragile Items</option>
                                            <option>Furniture</option>
                                            <option>Machinery</option>

                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Quantity
                                        </label>

                                        <input type="number"
                                               name="quantity"
                                               class="form-control bg-light"
                                               placeholder="No. of Items">
                                    </div>

                                    <!-- Service -->
                                    <div class="col-12 mt-4">
                                        <h6 class="fw-bold text-primary border-bottom pb-2">
                                            Service Type
                                        </h6>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">
                                            Delivery Speed
                                        </label>

                                        <select name="delivery_speed"
                                                class="form-select bg-light">

                                            <option>Standard</option>
                                            <option>Express</option>
                                            <option>Urgent</option>

                                        </select>
                                    </div>

                                    <!-- Notes -->
                                    <div class="col-12 mt-4">
                                        <label class="form-label fw-bold small">
                                            Special Instructions
                                        </label>

                                        <textarea name="special_instructions"
                                                  class="form-control bg-light"
                                                  rows="4"
                                                  placeholder="Write any special note here..."></textarea>
                                    </div>

                                    <!-- Submit -->
                                    <div class="col-12 mt-4">

                                        <button type="submit"
                                                name="submit"
                                                class="btn btn-primary btn-lg w-100 fw-bold shadow-sm">

                                            Confirm Booking

                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<script src="assets/js/validation.js"></script>
<?php include_once("Footer.php"); ?>
```
