@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Transparent Pricing</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Service Pricing Plans</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Pricing</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Pricing Tiered Cards -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle mb-2">Choose Your Plan</span>
            <h2 class="fw-bold font-heading display-6">Simple & Honest <span class="text-warning">Rates</span></h2>
            <p class="text-muted max-w-2xl mx-auto">No hidden fees. Select the perfect treatment package for your coupe, sedan, or SUV.</p>
        </div>

        <div class="row g-4 align-items-center">
            <!-- Silver Plan -->
            <div class="col-lg-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm p-4 p-md-5 text-center rounded-4 bg-light">
                    <h5 class="fw-bold font-heading text-muted text-uppercase mb-1">Silver Package</h5>
                    <h2 class="display-4 fw-extrabold font-heading text-dark my-3">$49 <span class="text-sm fw-normal text-muted">/ wash</span></h2>
                    <p class="text-muted text-sm mb-4">Ideal for routine maintenance and express shine.</p>
                    <ul class="list-unstyled text-muted text-sm text-start mb-4">
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>Exterior Snow Foam Wash</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>Tire Dressing & Rim Polish</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>Microfiber Towel Dry</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>Glass Streak-Free Wipe</li>
                        <li class="py-2 text-muted opacity-50"><i class="fa-solid fa-xmark me-2"></i>Interior Steam Extraction</li>
                        <li class="py-2 text-muted opacity-50"><i class="fa-solid fa-xmark me-2"></i>Ceramic Coating Protection</li>
                    </ul>
                    <a href="{{ url('/booking') }}" class="btn btn-outline-dark fw-bold rounded-pill w-100 py-3">Book Silver Plan</a>
                </div>
            </div>

            <!-- Gold Plan (Featured) -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-2 border-warning shadow-lg p-4 p-md-5 text-center rounded-4 bg-dark text-white position-relative">
                    <span class="position-absolute top-0 start-50 translate-middle badge bg-warning text-dark font-heading fw-bold px-4 py-2">MOST POPULAR</span>
                    <h5 class="fw-bold font-heading text-warning text-uppercase mb-1">Gold Executive</h5>
                    <h2 class="display-4 fw-extrabold font-heading text-white my-3">$149 <span class="text-sm fw-normal text-light opacity-75">/ detail</span></h2>
                    <p class="text-light opacity-75 text-sm mb-4">Complete inside-out revival for discerning drivers.</p>
                    <ul class="list-unstyled text-light opacity-90 text-sm text-start mb-4">
                        <li class="py-2 border-bottom border-secondary"><i class="fa-solid fa-check text-warning me-2"></i>All Silver Features Included</li>
                        <li class="py-2 border-bottom border-secondary"><i class="fa-solid fa-check text-warning me-2"></i>Deep Thermal Steam Interior Clean</li>
                        <li class="py-2 border-bottom border-secondary"><i class="fa-solid fa-check text-warning me-2"></i>Leather Hide Conditioning</li>
                        <li class="py-2 border-bottom border-secondary"><i class="fa-solid fa-check text-warning me-2"></i>Carpet Hot Water Shampooing</li>
                        <li class="py-2 border-bottom border-secondary"><i class="fa-solid fa-check text-warning me-2"></i>Engine Bay Safe Steam Wipe</li>
                        <li class="py-2 text-muted opacity-50"><i class="fa-solid fa-xmark me-2"></i>9H Ceramic Shield Layer</li>
                    </ul>
                    <a href="{{ url('/booking') }}" class="btn btn-warning fw-bold text-dark rounded-pill w-100 py-3 hover-grow">Book Gold Executive</a>
                </div>
            </div>

            <!-- Platinum Plan -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm p-4 p-md-5 text-center rounded-4 bg-light">
                    <h5 class="fw-bold font-heading text-muted text-uppercase mb-1">Platinum Ceramic</h5>
                    <h2 class="display-4 fw-extrabold font-heading text-dark my-3">$499 <span class="text-sm fw-normal text-muted">/ coating</span></h2>
                    <p class="text-muted text-sm mb-4">Ultimate 5-year armor & paint correction.</p>
                    <ul class="list-unstyled text-muted text-sm text-start mb-4">
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>All Gold Features Included</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>Multi-Stage Paint Correction</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>Dual 9H Ceramic Armor Shield</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>Glass Hydrophobic Treatment</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>5-Year Warranty Certificate</li>
                        <li class="py-2 border-bottom"><i class="fa-solid fa-check text-warning me-2"></i>Free 6-Month Inspection Visit</li>
                    </ul>
                    <a href="{{ url('/booking') }}" class="btn btn-outline-dark fw-bold rounded-pill w-100 py-3">Book Platinum Plan</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Comparison Table -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle mb-2">Detailed Breakdown</span>
            <h2 class="fw-bold font-heading display-6">Plan Comparison <span class="text-warning">Matrix</span></h2>
        </div>
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-up">
            <div class="table-responsive">
                <table class="table align-middle text-center mb-0">
                    <thead class="table-dark font-heading text-uppercase text-xs">
                        <tr>
                            <th class="text-start ps-4">Features</th>
                            <th>Silver ($49)</th>
                            <th>Gold ($149)</th>
                            <th>Platinum ($499)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start ps-4 fw-bold">Exterior Hand Wash</td>
                            <td><i class="fa-solid fa-circle-check text-success fs-5"></i></td>
                            <td><i class="fa-solid fa-circle-check text-success fs-5"></i></td>
                            <td><i class="fa-solid fa-circle-check text-success fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="text-start ps-4 fw-bold">Interior Steam Sanitization</td>
                            <td><i class="fa-solid fa-circle-xmark text-muted fs-5"></i></td>
                            <td><i class="fa-solid fa-circle-check text-success fs-5"></i></td>
                            <td><i class="fa-solid fa-circle-check text-success fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="text-start ps-4 fw-bold">Paint Correction (Swirl Removal)</td>
                            <td><i class="fa-solid fa-circle-xmark text-muted fs-5"></i></td>
                            <td><i class="fa-solid fa-circle-xmark text-muted fs-5"></i></td>
                            <td><i class="fa-solid fa-circle-check text-success fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="text-start ps-4 fw-bold">9H Nano Ceramic Coating</td>
                            <td><i class="fa-solid fa-circle-xmark text-muted fs-5"></i></td>
                            <td><i class="fa-solid fa-circle-xmark text-muted fs-5"></i></td>
                            <td><i class="fa-solid fa-circle-check text-success fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="text-start ps-4 fw-bold">Warranty Period</td>
                            <td>N/A</td>
                            <td>30 Days</td>
                            <td><span class="badge bg-warning text-dark font-heading">5 Years</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
