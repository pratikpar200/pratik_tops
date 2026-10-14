@extends('website.layout.main')

@section('main_container')

<section class="py-5 bg-dark text-white min-vh-100 d-flex align-items-center">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6" data-aos="zoom-in">
                <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4 bg-dark-card text-white">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold font-heading text-warning"><i class="fa-solid fa-user-plus me-2"></i>Create Account</h2>
                        <p class="text-muted text-sm">Join Car Care VIP Club for exclusive detailing perks.</p>
                    </div>

                    <div id="signupAlert" class="alert alert-success d-none mb-3"></div>

                    <form id="signupForm" class="row g-3" action="{{ url('/signup') }}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Full Name *</label>
                            <input type="text" class="form-control bg-dark-main border-secondary text-white" id="signupName" name="name" placeholder="John Doe">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Email Address *</label>
                            <input type="email" class="form-control bg-dark-main border-secondary text-white" id="signupEmail" name="email" placeholder="john@example.com">
                        </div>
                        <div class="col-12">
                            <label class="form-label text-sm fw-bold">Phone Number *</label>
                            <input type="text" class="form-control bg-dark-main border-secondary text-white" id="signupPhone" name="phone" placeholder="+1 234 567 890">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Password *</label>
                            <input type="password" class="form-control bg-dark-main border-secondary text-white" id="signupPassword" name="password" placeholder="••••••••">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold">Confirm Password *</label>
                            <input type="password" class="form-control bg-dark-main border-secondary text-white" id="signupConfirmPassword" name="password_confirmation" placeholder="••••••••">
                        </div>
                        <!-- Password strength meter -->
                        <div class="col-12">
                            <small class="d-block text-xs text-muted mb-1" id="passwordStrengthText">Password Strength</small>
                            <div class="progress bg-secondary" style="height: 6px;">
                                <div class="progress-bar" id="passwordStrengthBar" role="progressbar" style="width: 0%;"></div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-warning fw-bold w-100 py-3 rounded-pill hover-grow">Create Account</button>
                        </div>
                    </form>
                    <div class="text-center mt-4 text-sm text-muted">
                        Already registered? <a href="{{ url('/login') }}" class="text-warning text-decoration-none fw-bold">Login Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection