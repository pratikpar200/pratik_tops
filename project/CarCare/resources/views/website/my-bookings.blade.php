@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Reservations</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">My Active Bookings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">My Bookings</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Active Bookings Grid & Table -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-4 mb-4">
            <!-- Booking Card 1 -->
            <div class="col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm p-4 rounded-4 bg-light border-start border-5 border-warning">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-bold font-heading fs-5 text-dark">#BK-9082</span>
                        <span class="badge bg-warning text-dark font-heading px-3 py-2">In Progress</span>
                    </div>
                    <h5 class="fw-bold font-heading mb-1 text-dark">9H Nano Ceramic Coating</h5>
                    <p class="text-muted text-sm mb-3"><i class="fa-solid fa-car me-2 text-warning"></i>BMW M4 Competition (Plate: ABC-1234)</p>
                    <div class="row g-2 text-xs text-muted pt-3 border-top mb-3">
                        <div class="col-6"><span>Date:</span> <strong class="text-dark d-block">Oct 28, 2026</strong></div>
                        <div class="col-6"><span>Time Slot:</span> <strong class="text-dark d-block">10:00 AM</strong></div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ url('/track-booking') }}" class="btn btn-dark fw-bold rounded-pill text-xs px-3 py-2 w-100"><i class="fa-solid fa-location-crosshairs me-1"></i>Track Progress</a>
                        <a href="{{ url('/invoice') }}" class="btn btn-outline-dark fw-bold rounded-pill text-xs px-3 py-2 w-100"><i class="fa-solid fa-file-invoice me-1"></i>Invoice</a>
                    </div>
                </div>
            </div>

            <!-- Booking Card 2 -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm p-4 rounded-4 bg-light border-start border-5 border-success">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-bold font-heading fs-5 text-dark">#BK-8902</span>
                        <span class="badge bg-success font-heading px-3 py-2">Confirmed</span>
                    </div>
                    <h5 class="fw-bold font-heading mb-1 text-dark">Interior Steam Clean</h5>
                    <p class="text-muted text-sm mb-3"><i class="fa-solid fa-car me-2 text-warning"></i>Tesla Model S Plaid (Plate: EV-9900)</p>
                    <div class="row g-2 text-xs text-muted pt-3 border-top mb-3">
                        <div class="col-6"><span>Date:</span> <strong class="text-dark d-block">Nov 05, 2026</strong></div>
                        <div class="col-6"><span>Time Slot:</span> <strong class="text-dark d-block">02:30 PM</strong></div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ url('/track-booking') }}" class="btn btn-dark fw-bold rounded-pill text-xs px-3 py-2 w-100"><i class="fa-solid fa-location-crosshairs me-1"></i>Track Progress</a>
                        <a href="{{ url('/invoice') }}" class="btn btn-outline-dark fw-bold rounded-pill text-xs px-3 py-2 w-100"><i class="fa-solid fa-file-invoice me-1"></i>Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
