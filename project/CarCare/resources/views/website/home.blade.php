@extends('website.layout.main')

@section('main_container')
<section class="hero-slider-section">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-slide" style="background-image: url('https://images.unsplash.com/photo-1601362840469-51e4d8d58785?w=1600&auto=format&fit=crop&q=80');">
                <div class="hero-overlay"></div>
                <div class="container position-relative z-2">
                    <div class="row">
                        <div class="col-lg-8" data-aos="fade-right">
                            <span class="badge bg-warning text-dark text-uppercase font-heading fw-bold px-3 py-2 mb-3">Premium Auto Detailing</span>
                            <h1 class="display-3 fw-extrabold text-white font-heading mb-3">Give Your Car The <span class="text-warning">Royal Care</span> It Deserves</h1>
                            <p class="fs-5 text-light opacity-90 mb-4">Experience industry-leading nano ceramic coatings, deep steam interior restoration, and precision hand wash services.</p>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ url('/booking') }}" class="btn btn-warning btn-lg fw-bold px-4 py-3 rounded-pill hover-grow"><i class="fa-solid fa-calendar-check me-2"></i>Book Service Now</a>
                                <a href="{{ url('/services') }}" class="btn btn-outline-light btn-lg fw-bold px-4 py-3 rounded-pill hover-grow"><i class="fa-solid fa-layer-group me-2"></i>Explore Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next text-warning"></div>
        <div class="swiper-button-prev text-warning"></div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle mb-2">Our Advantage</span>
            <h2 class="fw-bold font-heading display-6">Why Choose <span class="text-warning">Car Care</span>?</h2>
            <p class="text-muted max-w-2xl mx-auto">We combine cutting-edge technology with artisanal passion to restore your vehicle to showroom quality.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm p-4 text-center hover-grow feature-card">
                    <div class="icon-box bg-warning-subtle text-warning rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                        <i class="fa-solid fa-user-shield fa-2x"></i>
                    </div>
                    <h5 class="fw-bold font-heading mb-2">Certified Technicians</h5>
                    <p class="text-muted text-sm mb-0">IDA-certified detailers with over 10+ years of master craft experience.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm p-4 text-center hover-grow feature-card">
                    <div class="icon-box bg-primary-subtle text-primary rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                        <i class="fa-solid fa-leaf fa-2x"></i>
                    </div>
                    <h5 class="fw-bold font-heading mb-2">Eco-Friendly</h5>
                    <p class="text-muted text-sm mb-0">100% biodegradable soaps and zero-water waste steam tech.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm p-4 text-center hover-grow feature-card">
                    <div class="icon-box bg-success-subtle text-success rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                        <i class="fa-solid fa-microchip fa-2x"></i>
                    </div>
                    <h5 class="fw-bold font-heading mb-2">Modern Equipment</h5>
                    <p class="text-muted text-sm mb-0">Dual-action orbital polishers and steam sanitizers.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-sm p-4 text-center hover-grow feature-card">
                    <div class="icon-box bg-danger-subtle text-danger rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                        <i class="fa-solid fa-bolt fa-2x"></i>
                    </div>
                    <h5 class="fw-bold font-heading mb-2">Express Delivery</h5>
                    <p class="text-muted text-sm mb-0">Guaranteed turnaround times without compromising perfection.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
