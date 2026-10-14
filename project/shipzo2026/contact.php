<?php include_once("Header.php"); ?>
<script>
    var is_logged_in = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
</script>

<div class="page-header" style="background-image: url('images/team1.jpg'); padding: 120px 0 60px;">
    <div class="container">
        <h1>Contact Us</h1>
        <p class="lead">We're here to support your logistics needs 24/7.</p>
    </div>
</div>

<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-5 h-100">
                    <h3 class="fw-bold mb-4">Get in Touch</h3>
                    <p class="text-muted mb-5">Have a question about our enterprise plans, fleet capabilities, or need support with a current shipment? Our team is ready to help.</p>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-light-blue text-primary rounded-circle d-flex justify-content-center align-items-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-location-dot fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-1">Headquarters</h6>
                            <p class="text-muted small mb-0">123 Logistics Park, Business Ave,<br>New York, NY 10001</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-light-blue text-primary rounded-circle d-flex justify-content-center align-items-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-phone fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-1">Phone Number</h6>
                            <p class="text-muted small mb-0">+1 (800) 123-4567<br>+1 (800) 987-6543 (Premium Support)</p>
                        </div>
                    </div>
                    
                    <div class="d-flex">
                        <div class="bg-light-blue text-primary rounded-circle d-flex justify-content-center align-items-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-envelope fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-1">Email Address</h6>
                            <p class="text-muted small mb-0">support@shipzo.com<br>sales@shipzo.com</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7">
    <div class="card border-0 shadow-sm rounded-4 p-5">
        <h4 class="fw-bold mb-4">Send a Message</h4>

      <form method="post" action="" onsubmit="return contact_validation(this)">
            <div id="msg" class="text-danger mb-3 text-center" style="font-weight: bold;"></div>
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label fw-bold small">name</label>
                    <input type="text" 
                           name="name" 
                           class="form-control bg-light" 
                           placeholder="John Doe" 
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold small">email</label>
                    <input type="email" 
                           name="email" 
                           class="form-control bg-light" 
                           placeholder="john@company.com" 
                           required>
                </div>

                <div class="col-12">
                    <label class="form-label fw-bold small">subject</label>
                    <input type="text" 
                           name="subject" 
                           class="form-control bg-light" 
                           placeholder="How can we help?" 
                           required>
                </div>

                <div class="col-12">
                    <label class="form-label fw-bold small">message</label>
                    <textarea name="message"
class="form-control bg-light"
rows="5"
placeholder="Write your message here..."
required></textarea>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg px-5 fw-bold">
    Submit
</button>
                </div>

            </div>
        </form>
    </div>
</div>
        
        <!-- Map -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="height: 400px;">
                    <!-- Placeholder map iframe -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.2528000654!2d-74.14448744574945!3d40.69763123334237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1700000000000!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/validation.js"></script>
<?php include_once("Footer.php"); ?>
