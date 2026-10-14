<!-- Footer Section Start -->
<footer class="bg-dark text-white pt-5 pb-3 border-top border-secondary border-opacity-25 mt-auto">
    <div class="container pt-4">
        <div class="row g-4">
            <!-- Company Bio -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand mb-3">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div class="brand-icon me-2 text-warning">
                            <i class="fa-solid fa-car-burst fa-2x"></i>
                        </div>
                        <div class="brand-text">
                            <span class="fw-bold text-white fs-3 font-heading">CAR<span
                                    class="text-warning">CARE</span></span>
                        </div>
                    </a>
                </div>
                <p class="text-light text-sm mb-4">
                    CAR CARE is your premier destination for professional auto detailing, ceramic coating, deep interior
                    restoration, engine tuning, and routine maintenance. We give your vehicle the royal treatment.
                </p>
                <div class="social-links d-flex gap-2">
                    <a href="#"
                        class="social-btn rounded-circle text-white bg-dark-main border border-secondary d-flex align-items-center justify-content-center"
                        width="40" height="40"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"
                        class="social-btn rounded-circle text-white bg-dark-main border border-secondary d-flex align-items-center justify-content-center"
                        width="40" height="40"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"
                        class="social-btn rounded-circle text-white bg-dark-main border border-secondary d-flex align-items-center justify-content-center"
                        width="40" height="40"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"
                        class="social-btn rounded-circle text-white bg-dark-main border border-secondary d-flex align-items-center justify-content-center"
                        width="40" height="40"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h5 class="text-white fw-bold mb-4 font-heading border-start border-3 border-warning ps-2">Quick Links
                </h5>
                <ul class="list-unstyled footer-links text-sm">
                    <li class="mb-2"><a href="{{ url('/about') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-chevron-right text-warning text-xs me-2"></i>About Us</a></li>
                    <li class="mb-2"><a href="{{ url('/services') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-chevron-right text-warning text-xs me-2"></i>Our Services</a></li>
                    <li class="mb-2"><a href="{{ url('/packages') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-chevron-right text-warning text-xs me-2"></i>Care Packages</a></li>
                    <li class="mb-2"><a href="{{ url('/pricing') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-chevron-right text-warning text-xs me-2"></i>Pricing Plan</a></li>
                    <li class="mb-2"><a href="{{ url('/booking') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-chevron-right text-warning text-xs me-2"></i>Book Appointment</a>
                    </li>
                    <li class="mb-2"><a href="{{ url('/track-booking') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-chevron-right text-warning text-xs me-2"></i>Track Booking</a></li>
                </ul>
            </div>

            <!-- Our Services -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white fw-bold mb-4 font-heading border-start border-3 border-warning ps-2">Our Services
                </h5>
                <ul class="list-unstyled footer-links text-sm">
                    <li class="mb-2"><a href="{{ url('/service-details') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-check text-warning text-xs me-2"></i>Exterior Foam Wash & Polish</a>
                    </li>
                    <li class="mb-2"><a href="{{ url('/service-details') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-check text-warning text-xs me-2"></i>Interior Steam Detailing</a>
                    </li>
                    <li class="mb-2"><a href="{{ url('/service-details') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-check text-warning text-xs me-2"></i>Nano Ceramic Coating 9H</a></li>
                    <li class="mb-2"><a href="{{ url('/service-details') }}"
                            class="text-muted text-priority text-decoration-none hover-warning"><i
                                class="fa-solid fa-check text-warning text-xs me-2"></i>Engine Bay Cleaning</a></li>
                    <li class="mb-2"><a href="{{ url('/service-details') }}"
                            class="text-muted text-decoration-none hover-warning"><i
                                class="fa-solid fa-check text-warning text-xs me-2"></i>Paint Correction & Waxing</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter & Info -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white fw-bold mb-4 font-heading border-start border-3 border-warning ps-2">Newsletter
                </h5>
                <p class="text-muted text-sm mb-3">Subscribe to get exclusive discounts, detailing tips, and seasonal
                    offers.</p>
                <form id="newsletterForm" class="mb-3">
                    <div class="input-group">
                        <input type="email"
                            class="form-control bg-dark-main border-secondary text-white placeholder-muted"
                            placeholder="Enter your email" required>
                        <button class="btn btn-warning fw-bold" type="submit"><i
                                class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </form>
                <div class="contact-mini text-sm text-muted">
                    <p class="mb-1"><i class="fa-solid fa-phone text-warning me-2"></i>+1 (800) 555-CARCARE</p>
                    <p class="mb-0"><i class="fa-solid fa-location-arrow text-warning me-2"></i>Downtown Service Center,
                        HQ</p>
                </div>
            </div>
        </div>

        <hr class="border-secondary opacity-25 my-4">

        <div class="row align-items-center text-sm text-muted">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                &copy; {{ date('Y') }} <span class="text-warning font-heading fw-bold">CAR CARE</span>. All Rights
                Reserved. Designed with Excellence.
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="{{ url('/terms') }}" class="text-muted text-decoration-none me-3 hover-warning">Terms of
                    Service</a>
                <a href="{{ url('/privacy') }}" class="text-muted text-decoration-none me-3 hover-warning">Privacy
                    Policy</a>
                <a href="{{ url('/faq') }}" class="text-muted text-decoration-none hover-warning">FAQ</a>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Back To Top Button -->
<a href="#"
    class="back-to-top btn btn-warning text-dark rounded-circle shadow-lg d-flex align-items-center justify-content-center"
    id="backToTop">
    <i class="fa-solid fa-arrow-up"></i>
</a>

<!-- JS Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Custom Website JS Files -->
<script src="{{ asset('website/assets/js/validation.js') }}"></script>
<script src="{{ asset('website/assets/js/main.js') }}"></script>
<script src="{{ asset('website/assets/js/slider.js') }}"></script>
<script src="{{ asset('website/assets/js/counter.js') }}"></script>
<script src="{{ asset('website/assets/js/gallery.js') }}"></script>
<script src="{{ asset('website/assets/js/booking.js') }}"></script>
<script src="{{ asset('website/assets/js/login.js') }}"></script>
<script src="{{ asset('website/assets/js/signup.js') }}"></script>
</body>

</html>