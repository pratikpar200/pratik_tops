<?php include_once("Header.php"); ?>

<div class="page-header">
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <p class="lead">Find answers to common questions about Shipzo.</p>
    </div>
</div>

<section class="section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h6 class="text-accent fw-bold text-uppercase">Help Center</h6>
                    <h2 class="fw-bold">How can we help you today?</h2>
                </div>
                
                <div class="accordion shadow-sm rounded-4 overflow-hidden" id="faqAccordion">
                    <!-- FAQ 1 -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How does the OTP delivery system work?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted pb-4">
                                Our OTP delivery system ensures that parcels are only handed over to the rightful recipient. Once a package is out for delivery, the receiver gets an OTP on their registered phone number or email. The delivery driver will only release the package after successfully verifying this OTP in their Shipzo Transporter app.
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 2 -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                What are the benefits of a corporate subscription?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted pb-4">
                                Corporate subscriptions (Silver, Gold, Platinum) offer volume shippers significant savings and perks. Depending on the plan, you get up to 20% off shipping charges, priority dispatch, dedicated account management, and free warehousing days. It's designed for businesses sending more than 5 parcels monthly.
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 3 -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Can I store my inventory in Shipzo warehouses?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted pb-4">
                                Yes! Shipzo offers extensive warehousing solutions. You can rent space per pallet or reserve a dedicated area. Our warehouses are climate-controlled and secure, and your inventory levels are synced directly with your Shipzo dashboard.
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 4 -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                How fast is Express Delivery?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted pb-4">
                                Express Delivery prioritizes your freight over standard routing. While transit times depend on the exact origin and destination, Express is typically 40-50% faster than standard trucking, utilizing team drivers or expedited air/road combinations.
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 5 -->
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                What if my package is lost or damaged?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted pb-4">
                                Every shipment booked through Shipzo carries standard liability coverage. If you are shipping high-value goods, we highly recommend declaring the value during booking to purchase additional comprehensive insurance. If an issue occurs, our support team will guide you through the claims process.
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-5">
                    <p class="text-muted">Still have questions?</p>
                    <a href="contact.php" class="btn btn-primary fw-bold px-4">Contact Support</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once("Footer.php"); ?>
