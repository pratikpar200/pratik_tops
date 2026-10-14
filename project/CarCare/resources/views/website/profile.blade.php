@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Customer Dashboard</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">My Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Profile Layout -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row g-4">
            <!-- Sidebar Avatar Card -->
            <div class="col-lg-4" data-aos="fade-right">
                <div class="card border-0 shadow-sm p-4 rounded-4 text-center bg-white mb-4">
                    <div class="position-relative d-inline-block mx-auto mb-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=200&auto=format&fit=crop&q=80" class="rounded-circle border border-3 border-warning" width="110" height="110">
                        <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-2"></span>
                    </div>
                    <h5 class="fw-bold font-heading mb-1 text-dark">{{ $customer->name }}</h5>
                    <p class="text-muted text-sm mb-3">{{ $customer->email }}</p>
                    <span class="badge bg-warning text-dark font-heading px-3 py-2 rounded-pill"><i class="fa-solid fa-crown me-1"></i>VIP Gold Member</span>
                    <p class="text-muted text-xs mt-3 mb-0"><i class="fa-solid fa-calendar-day me-1"></i>Member Since {{ $customer->created_at->format('M d, Y') }}</p>
                </div>

                <div class="card border-0 shadow-sm p-4 rounded-4 bg-dark text-white">
                    <h5 class="fw-bold font-heading mb-3 text-warning"><i class="fa-solid fa-car me-2"></i>Saved Vehicles</h5>
                    <ul class="list-unstyled text-sm mb-0">
                        <li class="p-3 bg-dark-main rounded-3 mb-2 d-flex justify-content-between align-items-center">
                            <div>
                                <strong class="d-block text-white">BMW M4 Competition</strong>
                                <small class="text-muted">Plate: ABC-1234</small>
                            </div>
                            <span class="badge bg-primary">Primary</span>
                        </li>
                        <li class="p-3 bg-dark-main rounded-3 d-flex justify-content-between align-items-center">
                            <div>
                                <strong class="d-block text-white">Tesla Model S Plaid</strong>
                                <small class="text-muted">Plate: EV-9900</small>
                            </div>
                            <span class="badge bg-secondary">Secondary</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Profile Form -->
            <div class="col-lg-8" data-aos="fade-left">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                    <h4 class="fw-bold font-heading mb-4 text-dark"><i class="fa-solid fa-id-card text-warning me-2"></i>Personal Details</h4>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="row g-3" action="{{ url('/profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name', $customer->name) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email', $customer->email) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Phone Number</label>
                            <input type="text" name="phone" class="form-control form-control-lg" value="{{ old('phone', $customer->phone) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Address</label>
                            <input type="text" name="address" class="form-control form-control-lg" value="{{ old('address', $customer->address) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">New Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Leave blank to keep current password">
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-warning fw-bold text-dark px-4 py-3 rounded-pill hover-grow"><i class="fa-solid fa-floppy-disk me-2"></i>Save Account Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection