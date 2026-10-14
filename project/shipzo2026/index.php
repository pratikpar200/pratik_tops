<?php include_once("Header.php"); ?>

<!-- Hero Section -->
<section style="background: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('images/hero-banner.jpg') center/cover no-repeat; padding: 180px 0 120px; margin-top: 76px;">
    <div class="container text-center text-white">
        <span class="badge bg-primary px-3 py-2 mb-3 rounded-pill">Premium B2B Logistics Partner</span>
        <h1 class="display-3 fw-bold mb-4">Fast, Secure & Reliable<br><span style="color: var(--accent-orange);">Global Transport</span></h1>
        <p class="lead mb-5 mx-auto" style="max-width: 700px; color: #e2e8f0;">Shipzo delivers complete supply chain solutions, express delivery, and intelligent warehousing for modern businesses.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="booking.php" class="btn btn-primary btn-lg px-5 py-3">Book Shipment</a>
            <a href="tracking.php" class="btn btn-outline-light btn-lg px-5 py-3">Track Parcel</a>
        </div>
    </div>
</section>

<!-- Tracking Widget -->
<section class="container" style="margin-top: -60px; position: relative; z-index: 10;">
    <div class="tracking-widget">
        <div class="row align-items-center">
            <div class="col-md-4 mb-3 mb-md-0">
                <h4 class="mb-1">Track Your Cargo</h4>
                <p class="text-muted mb-0 small">Enter tracking ID for real-time status</p>
            </div>
            <div class="col-md-8">
                <form class="d-flex" action="tracking.php">
                    <input type="text" class="form-control form-control-lg me-2" placeholder="e.g. SHPZ-98765432" required>
                    <button type="submit" class="btn btn-primary btn-lg px-4"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-accent fw-bold text-uppercase">Our Expertise</h6>
            <h2 class="display-5 fw-bold">Comprehensive Logistics Solutions</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-card text-center">
                    <i class="fa-solid fa-truck-moving service-icon"></i>
                    <h4>Road Transport</h4>
                    <p class="text-muted">Extensive fleet of modern trucks for national freight and B2B bulk cargo delivery.</p>
                    <a href="services.php" class="btn btn-link text-decoration-none fw-bold">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card text-center">
                    <i class="fa-solid fa-plane-departure service-icon"></i>
                    <h4>Express Shipping</h4>
                    <p class="text-muted">Urgent air freight and fast-track shipping for time-sensitive business deliveries.</p>
                    <a href="services.php" class="btn btn-link text-decoration-none fw-bold">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card text-center">
                    <i class="fa-solid fa-warehouse service-icon"></i>
                    <h4>Warehousing</h4>
                    <p class="text-muted">Secure, climate-controlled storage facilities with smart inventory management.</p>
                    <a href="warehouse.php" class="btn btn-link text-decoration-none fw-bold">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section-padding bg-dark text-white" style="background: linear-gradient(rgba(10, 25, 47, 0.9), rgba(10, 25, 47, 0.9)), url('images/cargo1.jpg') center/cover fixed;">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3 col-6">
                <h2 class="display-4 fw-bold text-accent">15k+</h2>
                <p class="lead mb-0">Parcels Delivered</p>
            </div>
            <div class="col-md-3 col-6">
                <h2 class="display-4 fw-bold text-accent">500+</h2>
                <p class="lead mb-0">B2B Partners</p>
            </div>
            <div class="col-md-3 col-6">
                <h2 class="display-4 fw-bold text-accent">250+</h2>
                <p class="lead mb-0">Active Fleet</p>
            </div>
            <div class="col-md-3 col-6">
                <h2 class="display-4 fw-bold text-accent">50+</h2>
                <p class="lead mb-0">Warehouses</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="images/team1.jpg" alt="Logistics Team" class="img-fluid rounded-4 shadow-lg">
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h6 class="text-accent fw-bold text-uppercase">Why Shipzo</h6>
                <h2 class="display-5 fw-bold mb-4">The Premium Choice for B2B Transport</h2>
                <p class="text-muted mb-4">We don't just move boxes; we optimize your supply chain. Our dedicated team ensures every parcel reaches its destination safely and on time.</p>
                
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-shield-halved fa-2x text-primary-theme"></i>
                    </div>
                    <div class="ms-3">
                        <h5>Secure OTP Delivery</h5>
                        <p class="text-muted">Parcels are only handed over after rigorous OTP verification by the receiver.</p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-clock-rotate-left fa-2x text-primary-theme"></i>
                    </div>
                    <div class="ms-3">
                        <h5>24/7 Real-Time Tracking</h5>
                        <p class="text-muted">Complete visibility of your shipments from dispatch to final delivery.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-hand-holding-dollar fa-2x text-primary-theme"></i>
                    </div>
                    <div class="ms-3">
                        <h5>Corporate Subscriptions</h5>
                        <p class="text-muted">Discounts, lower shipping rates, and priority support for our premium partners.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Subscription Preview -->
<section class="section-padding bg-light">
    <div class="container text-center">
        <h6 class="text-accent fw-bold text-uppercase">B2B Plans</h6>
        <h2 class="display-5 fw-bold mb-5">Premium Corporate Subscriptions</h2>
        <div class="row justify-content-center g-4">
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <h4>Gold Plan</h4>
                    <p class="text-muted">10-25 parcels monthly</p>
                    <div class="price-val">$199<span class="fs-6 text-muted fw-normal">/mo</span></div>
                    <ul class="pricing-features">
                        <li><i class="fa-solid fa-check"></i> 10% Shipping Discount</li>
                        <li><i class="fa-solid fa-check"></i> Priority Dispatch</li>
                        <li><i class="fa-solid fa-check"></i> Standard Support</li>
                        <li><i class="fa-solid fa-check"></i> 5 Days Free Storage</li>
                    </ul>
                    <a href="pricing.php" class="btn btn-outline-primary w-100">View Details</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card popular bg-dark text-white">
                    <div class="pricing-badge">BEST</div>
                    <h4 class="text-white">Platinum Plan</h4>
                    <p class="text-gray" style="color: #adb5bd;">25+ parcels monthly</p>
                    <div class="price-val text-white">$399<span class="fs-6 text-gray fw-normal" style="color: #adb5bd;">/mo</span></div>
                    <ul class="pricing-features" style="color: #e9ecef;">
                        <li><i class="fa-solid fa-check"></i> 20% Shipping Discount</li>
                        <li><i class="fa-solid fa-check"></i> Fastest Dispatch</li>
                        <li><i class="fa-solid fa-check"></i> Dedicated Account Manager</li>
                        <li><i class="fa-solid fa-check"></i> 15 Days Free Storage</li>
                    </ul>
                    <a href="pricing.php" class="btn btn-primary w-100">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once("Footer.php"); ?>
