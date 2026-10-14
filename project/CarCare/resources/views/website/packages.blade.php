@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Maintenance Bundles</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Care Packages</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Packages</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Package Bundles -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle mb-2">Subscription Care</span>
            <h2 class="fw-bold font-heading display-6">Monthly & Annual <span class="text-warning">Bundles</span></h2>
            <p class="text-muted max-w-2xl mx-auto">Save up to 30% with our multi-visit care passes designed for luxury vehicle owners.</p>
        </div>

        <div class="row g-4">
            <!-- Package 1 -->
            <div class="col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-light h-100 border-top border-4 border-warning">
                    <span class="badge bg-warning text-dark font-heading w-fit mb-3">MONTHLY PASS</span>
                    <h3 class="fw-bold font-heading text-dark mb-2">Executive Wash Pass</h3>
                    <h2 class="display-5 fw-extrabold font-heading text-warning mb-3">$79 <span class="text-sm fw-normal text-muted">/ month</span></h2>
                    <p class="text-muted text-sm mb-4">Keep your vehicle spotless every week with unlimited touchless foam washes.</p>
                    <ul class="list-unstyled text-muted text-sm mb-4">
                        <li class="py-2 border-bottom"><i class="fa-solid fa-circle-check text-warning me-2"></i>2 Exterior Foam Washes per month</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-circle-check text-warning me-2"></i>1 Interior Steam Vacuum Clean</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-circle-check text-warning me-2"></i>Free Tire Shine & Rim Polish</li>
                        <li class="py-2"><i class="fa-solid fa-circle-check text-warning me-2"></i>Priority Booking Queue</li>
                    </ul>
                    <a href="{{ url('/booking') }}" class="btn btn-dark fw-bold text-warning rounded-pill py-3 w-100 hover-grow"><i class="fa-solid fa-tags me-2"></i>Subscribe Monthly Pass</a>
                </div>
            </div>

            <!-- Package 2 -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4 bg-dark text-white h-100 border-top border-4 border-primary">
                    <span class="badge bg-primary text-white font-heading w-fit mb-3">ANNUAL VIP ARMOR</span>
                    <h3 class="fw-bold font-heading text-white mb-2">Showroom Shield VIP</h3>
                    <h2 class="display-5 fw-extrabold font-heading text-warning mb-3">$899 <span class="text-sm fw-normal text-light opacity-75">/ year</span></h2>
                    <p class="text-light opacity-75 text-sm mb-4">The complete annual protection package for ultimate gloss and zero worries.</p>
                    <ul class="list-unstyled text-light opacity-90 text-sm mb-4">
                        <li class="py-2 border-bottom border-secondary"><i class="fa-solid fa-circle-check text-warning me-2"></i>1 Full 9H Ceramic Shield Application (5-Yr Warranty)</li>
                        <li class="py-2 border-bottom border-secondary"><i class="fa-solid fa-circle-check text-warning me-2"></i>4 Quarterly Deep Steam Interior Cleans</li>
                        <li class="py-2 border-bottom border-secondary"><i class="fa-solid fa-circle-check text-warning me-2"></i>12 Monthly Maintenance Washes</li>
                        <li class="py-2"><i class="fa-solid fa-circle-check text-warning me-2"></i>Free Emergency Scratch Touch-up Service</li>
                    </ul>
                    <a href="{{ url('/booking') }}" class="btn btn-warning fw-bold text-dark rounded-pill py-3 w-100 hover-grow"><i class="fa-solid fa-crown me-2"></i>Subscribe Annual VIP</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
