@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Real-time Status</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Track Service Status</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Track Booking</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Tracker Form & Visual Step Bar -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <!-- Search Box -->
                <div class="card border-0 shadow-sm p-4 rounded-4 bg-light mb-5 text-center">
                    <h5 class="fw-bold font-heading mb-2 text-dark">Lookup Vehicle Treatment Status</h5>
                    <p class="text-muted text-sm mb-3">Enter your Booking Reference ID (e.g. BK-9082) or registered phone number.</p>
                    <form class="d-flex flex-column flex-sm-row gap-2 max-w-lg mx-auto">
                        <input type="text" class="form-control form-control-lg bg-white border-secondary" value="BK-9082" placeholder="e.g. BK-9082">
                        <button type="submit" class="btn btn-warning fw-bold text-dark px-4 py-3 rounded-pill hover-grow"><i class="fa-solid fa-magnifying-glass me-2"></i>Track Now</button>
                    </form>
                </div>

                <!-- Visual Progress Bar -->
                <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                        <div>
                            <span class="badge bg-warning text-dark font-heading px-3 py-1 mb-1">IN PROGRESS</span>
                            <h4 class="fw-bold font-heading text-dark mb-0">Booking #BK-9082</h4>
                        </div>
                        <div class="text-end">
                            <small class="text-muted text-xs d-block">Estimated Completion</small>
                            <span class="fw-bold text-primary fs-5 font-heading">Today at 4:30 PM</span>
                        </div>
                    </div>

                    <!-- Step Tracker Graphic -->
                    <div class="track-step-bar my-4">
                        <div class="track-step-item completed">
                            <div class="track-step-icon"><i class="fa-solid fa-check"></i></div>
                            <small class="fw-bold d-block text-xs font-heading">1. Received</small>
                        </div>
                        <div class="track-step-item completed">
                            <div class="track-step-icon"><i class="fa-solid fa-check"></i></div>
                            <small class="fw-bold d-block text-xs font-heading">2. Inspected</small>
                        </div>
                        <div class="track-step-item active">
                            <div class="track-step-icon"><i class="fa-solid fa-spray-can"></i></div>
                            <small class="fw-bold d-block text-xs font-heading">3. Detailing</small>
                        </div>
                        <div class="track-step-item">
                            <div class="track-step-icon">4</div>
                            <small class="fw-bold d-block text-xs font-heading text-muted">4. QC Check</small>
                        </div>
                        <div class="track-step-item">
                            <div class="track-step-icon">5</div>
                            <small class="fw-bold d-block text-xs font-heading text-muted">5. Ready</small>
                        </div>
                    </div>

                    <!-- Live Log Status Alert -->
                    <div class="p-3 bg-light rounded-3 border-start border-4 border-warning mt-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-2 bg-warning text-dark rounded-circle"><i class="fa-solid fa-gears"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0 font-heading text-dark">Current Stage: Stage 2 Ceramic Shield Polish</h6>
                                <small class="text-muted">Assigned Technician: <strong>Marcus Vance</strong> (Bay #3)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
