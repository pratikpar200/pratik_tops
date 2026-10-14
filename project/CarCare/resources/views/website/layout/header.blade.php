<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR CARE - Professional Auto Care & Detailing Services</title>
    <meta name="description"
        content="CAR CARE provides top-notch automotive detailing, repair, washing, and maintenance services. Book online today!">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('website/assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <!-- Swiper Slider CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Custom Website CSS -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
</head>

<body>

@include('sweetalert::alert')


    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-box">
            <div class="configure-border-1">
                <div class="configure-core"></div>
            </div>
            <div class="configure-border-2">
                <div class="configure-core"></div>
            </div>
            <div class="logo-text"><i class="fa-solid fa-car-side me-2"></i>CAR CARE</div>
        </div>
    </div>

    <!-- Top Bar -->
    <div class="top-bar py-2 d-none d-lg-block bg-dark text-white border-bottom border-secondary border-opacity-25">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-4 text-sm">
                        <span><i class="fa-regular fa-clock text-warning me-2"></i>Mon - Sat: 8:00 AM - 8:00 PM</span>
                        <span><i class="fa-solid fa-envelope text-warning me-2"></i>support@carcare.com</span>
                        <span><i class="fa-solid fa-location-dot text-warning me-2"></i>123 Auto Street, AutoCity</span>
                    </div>
                </div>
                <div class="col-lg-5 text-end">
                    <div class="d-inline-flex align-items-center gap-3">
                        <a href="{{ url('/track-booking') }}"
                            class="top-link text-white text-decoration-none text-sm fw-medium"><i
                                class="fa-solid fa-magnifying-glass-location me-1 text-warning"></i> Track Booking</a>
                        <span class="text-secondary">|</span>
                        @if(session('customer_id'))
                            <span class="top-link text-white text-sm"><i class="fa-solid fa-circle-user me-1 text-warning"></i> {{ session('customer_name') }}</span>
                            <a href="{{ url('/logout') }}" class="top-link text-white text-decoration-none text-sm ms-2"><i
                                    class="fa-solid fa-right-from-bracket me-1 text-warning"></i> Logout</a>
                        @else
                            <a href="{{ url('/login') }}" class="top-link text-white text-decoration-none text-sm"><i
                                    class="fa-solid fa-user me-1 text-warning"></i> Login</a>
                            <a href="{{ url('/signup') }}" class="top-link text-white text-decoration-none text-sm ms-2"><i
                                    class="fa-solid fa-user-plus me-1 text-warning"></i> Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark-main py-3 shadow-lg" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <div class="brand-icon me-2 text-warning">
                    <i class="fa-solid fa-car-burst fa-2x"></i>
                </div>
                <div class="brand-text">
                    <span class="fw-bold text-white fs-3 font-heading tracking-tight">CAR<span
                            class="text-warning">CARE</span></span>
                    <span class="d-block text-xs text-uppercase tracking-wider text-muted opacity-75">Premium
                        Detailing</span>
                </div>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-semibold">
                    <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('services') || Request::is('service-details') ? 'active' : '' }}" href="{{ url('/services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('packages') ? 'active' : '' }}" href="{{ url('/packages') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('pricing') ? 'active' : '' }}" href="{{ url('/pricing') }}">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('gallery') ? 'active' : '' }}" href="{{ url('/gallery') }}">Gallery</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pages
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark border-0 shadow-lg animate slideIn">
                            <li><a class="dropdown-item" href="{{ url('/testimonials') }}"><i class="fa-solid fa-quote-left me-2 text-warning"></i> Testimonials</a></li>
                            <li><a class="dropdown-item" href="{{ url('/faq') }}"><i class="fa-solid fa-circle-question me-2 text-warning"></i> FAQ</a></li>
                            <li><a class="dropdown-item" href="{{ url('/blog') }}"><i class="fa-solid fa-blog me-2 text-warning"></i> Blog</a></li>
                            <li><a class="dropdown-item" href="{{ url('/terms') }}"><i class="fa-solid fa-file-contract me-2 text-warning"></i> Terms & Conditions</a></li>
                            <li><a class="dropdown-item" href="{{ url('/privacy') }}"><i class="fa-solid fa-shield-halved me-2 text-warning"></i> Privacy Policy</a></li>
                        </ul>
                    </li>
                    @if(session('customer_id'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark border-0 shadow-lg animate slideIn">
                            <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa-solid fa-id-card me-2 text-warning"></i> My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ url('/my-bookings') }}"><i class="fa-solid fa-calendar-check me-2 text-warning"></i> My Bookings</a></li>
                            <li><a class="dropdown-item" href="{{ url('/booking-history') }}"><i class="fa-solid fa-clock-rotate-left me-2 text-warning"></i> Booking History</a></li>
                            <li><a class="dropdown-item" href="{{ url('/invoice') }}"><i class="fa-solid fa-file-invoice-dollar me-2 text-warning"></i> Sample Invoice</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item"><a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a></li>
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('/booking') }}" class="btn btn-warning fw-bold px-4 py-2 rounded-pill shadow-sm hover-grow d-flex align-items-center">
                        <i class="fa-solid fa-calendar-plus me-2"></i> Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </nav>