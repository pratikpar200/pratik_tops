@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Online Reservation</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Book Your Appointment</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Booking</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Main Booking Form & Sidebar Info -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row g-5">
            <!-- Booking Form -->
            <div class="col-lg-8" data-aos="fade-right">
                <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4 bg-white">
                    <h3 class="fw-bold font-heading mb-1 text-dark"><i class="fa-solid fa-calendar-check text-warning me-2"></i>Schedule Service Visit</h3>
                    <p class="text-muted text-sm mb-4">Complete the fields below to reserve your vehicle treatment slot.</p>

                    @if(session('success'))
                        <div id="bookingAlert" class="alert alert-success mb-4 d-flex align-items-center">
                            <i class="fa-solid fa-circle-check fs-5 me-2"></i>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif

                    <form id="bookingForm" action="{{ route('booking.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Customer Full Name *</label>
                            <input type="text" name="customer_name" class="form-control form-control-lg @error('customer_name') is-invalid @enderror" id="customerName" placeholder="John Doe" value="{{ old('customer_name') }}">
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Phone Number *</label>
                            <input type="text" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" id="customerPhone" placeholder="+1 (555) 000-0000" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Email Address *</label>
                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="customerEmail" placeholder="john@example.com" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Vehicle Manufacturer *</label>
                            <select name="vehicle_company" class="form-select form-select-lg @error('vehicle_company') is-invalid @enderror" id="vehicleCompany">
                                <option value="">Select Brand</option>
                                <option value="BMW" @selected(old('vehicle_company') == 'BMW')>BMW</option>
                                <option value="Mercedes" @selected(old('vehicle_company') == 'Mercedes')>Mercedes-Benz</option>
                                <option value="Audi" @selected(old('vehicle_company') == 'Audi')>Audi</option>
                                <option value="Tesla" @selected(old('vehicle_company') == 'Tesla')>Tesla</option>
                                <option value="Porsche" @selected(old('vehicle_company') == 'Porsche')>Porsche</option>
                                <option value="Toyota" @selected(old('vehicle_company') == 'Toyota')>Toyota</option>
                            </select>
                            @error('vehicle_company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Vehicle Model *</label>
                            <input type="text" name="vehicle_model" class="form-control form-control-lg @error('vehicle_model') is-invalid @enderror" id="vehicleModel" placeholder="e.g. M4 Competition / Model S" value="{{ old('vehicle_model') }}">
                            @error('vehicle_model')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">License Plate Number</label>
                            <input type="text" name="vehicle_number" class="form-control form-control-lg @error('vehicle_number') is-invalid @enderror" id="vehicleNumber" placeholder="ABC-1234" value="{{ old('vehicle_number') }}">
                            @error('vehicle_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Select Service *</label>
                            <select name="service" class="form-select form-select-lg @error('service') is-invalid @enderror" id="bookingService">
                                <option value="">Choose Detailing Treatment</option>
                                <option value="foam-wash" @selected(old('service') == 'foam-wash')>Exterior Foam Wash ($49)</option>
                                <option value="interior-detail" @selected(old('service') == 'interior-detail')>Interior Steam Clean ($129)</option>
                                <option value="ceramic-coating" @selected(old('service') == 'ceramic-coating')>9H Nano Ceramic Coating ($499)</option>
                                <option value="paint-correction" @selected(old('service') == 'paint-correction')>Paint Correction ($299)</option>
                            </select>
                            @error('service')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Appointment Date *</label>
                            <input type="date" name="appointment_date" class="form-control form-control-lg @error('appointment_date') is-invalid @enderror" id="appointmentDate" value="{{ old('appointment_date') }}">
                            @error('appointment_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label text-sm fw-bold">Special Requests or Instructions</label>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="bookingMessage" rows="3" placeholder="Tell us about specific stains, scratches, or pickup requests...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-warning btn-lg fw-bold text-dark w-100 py-3 rounded-pill hover-grow"><i class="fa-solid fa-paper-plane me-2"></i>Confirm Reservation Now</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-4" data-aos="fade-left">
                <div class="card border-0 shadow-sm p-4 rounded-4 bg-white mb-4">
                    <h5 class="fw-bold font-heading mb-3"><i class="fa-solid fa-clock text-warning me-2"></i>Working Hours</h5>
                    <ul class="list-unstyled text-sm text-muted mb-0">
                        <li class="d-flex justify-content-between py-2 border-bottom"><span>Monday - Friday:</span> <strong class="text-dark">8:00 AM - 8:00 PM</strong></li>
                        <li class="d-flex justify-content-between py-2 border-bottom"><span>Saturday:</span> <strong class="text-dark">9:00 AM - 6:00 PM</strong></li>
                        <li class="d-flex justify-content-between py-2"><span>Sunday:</span> <span class="badge bg-danger">Closed</span></li>
                    </ul>
                </div>

                <div class="card border-0 shadow-sm p-4 rounded-4 bg-dark text-white">
                    <h5 class="fw-bold font-heading mb-3 text-warning"><i class="fa-solid fa-headset me-2"></i>Need Help Booking?</h5>
                    <p class="text-light opacity-75 text-sm mb-3">Call our support desk for instant phone booking & custom fleet inquiries.</p>
                    <h4 class="fw-bold font-heading text-white mb-0">+1 (800) 555-CARCARE</h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
