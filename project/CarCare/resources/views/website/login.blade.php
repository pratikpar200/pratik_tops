@extends('website.layout.main')

@section('main_container')
<section class="py-5 bg-dark text-white min-vh-100 d-flex align-items-center">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5" data-aos="zoom-in">
                <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4 bg-dark-card text-white">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold font-heading text-warning"><i class="fa-solid fa-car-burst me-2"></i>CAR CARE</h2>
                        <p class="text-muted text-sm">Welcome back! Login to your account.</p>
                    </div>

                    <div id="loginAlert" class="alert alert-success d-none mb-3"></div>

                    <form id="loginForm" class="g-3" action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-sm fw-bold">Email Address</label>
                            <input type="email" class="form-control bg-dark-main border-secondary text-white" id="loginEmail" name="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-sm fw-bold">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control bg-dark-main border-secondary text-white" id="loginPassword" name="password" placeholder="••••••••">
                                <button class="btn btn-outline-secondary" type="button" id="toggleLoginPass"><i class="fa-solid fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center text-sm mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label text-muted" for="rememberMe">Remember Me</label>
                            </div>
                            <a href="{{ url('/forgot-password') }}" class="text-warning text-decoration-none">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-warning fw-bold w-100 py-3 rounded-pill hover-grow">Sign In</button>
                    </form>
                    <div class="text-center mt-4 text-sm text-muted">
                        Don't have an account? <a href="{{ url('/signup') }}" class="text-warning text-decoration-none fw-bold">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'warning',
            title: 'Login Required',
            text: @json(session('error')),
            confirmButtonColor: '#ffb703'
        });
    });
</script>
@endif
@if(session('logout_success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: @json(session('logout_success')),
            confirmButtonColor: '#ffb703',
            timer: 1800,
            timerProgressBar: true
        });
    });
</script>
@endif
@endsection