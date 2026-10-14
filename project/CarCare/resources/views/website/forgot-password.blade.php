@extends('website.layout.main')

@section('main_container')
<section class="py-5 bg-dark text-white min-vh-100 d-flex align-items-center">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4" data-aos="zoom-in">
                <div class="card border-0 shadow-lg p-4 rounded-4 bg-dark-card text-white text-center">
                    <i class="fa-solid fa-key text-warning fa-3x mb-3"></i>
                    <h4 class="fw-bold font-heading mb-2">Reset Password</h4>
                    <p class="text-muted text-sm mb-4">Enter your registered email address and we'll send you a password reset link.</p>
                    <form>
                        <div class="mb-3 text-start">
                            <label class="form-label text-sm">Email Address</label>
                            <input type="email" class="form-control bg-dark-main border-secondary text-white" placeholder="name@example.com" required>
                        </div>
                        <button type="submit" class="btn btn-warning fw-bold w-100 py-2 rounded-pill">Send Reset Link</button>
                    </form>
                    <a href="{{ url('/login') }}" class="text-warning text-sm text-decoration-none d-block mt-4"><i class="fa-solid fa-arrow-left me-1"></i> Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
