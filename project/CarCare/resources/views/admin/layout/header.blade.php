<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR CARE Admin - Management Dashboard</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Admin Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>
<body class="bg-admin-body">


@include('sweetalert::alert')

<div class="admin-wrapper d-flex">
    <!-- Top Header -->
    <header class="admin-header fixed-top bg-dark text-white border-bottom border-secondary border-opacity-25 shadow-sm px-3 py-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-dark text-warning border-0 fs-5" id="sidebarToggleBtn">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/admin/dashboard') }}">
                    <i class="fa-solid fa-car-burst text-warning me-2 fs-4"></i>
                    <span class="fw-bold fs-4 tracking-tight">CAR<span class="text-warning">CARE</span> <span class="badge bg-warning text-dark text-xs ms-1">ADMIN</span></span>
                </a>
            </div>

            <!-- Global Search & User Actions -->
            <div class="d-flex align-items-center gap-3">
                <form class="d-none d-md-block" style="width: 250px;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-dark-main border-secondary text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control bg-dark-main border-secondary text-white shadow-none" placeholder="Search admin...">
                    </div>
                </form>

                <!-- Notifications Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-dark text-white position-relative p-2" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New notifications</span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end border-0 shadow-lg" style="min-width: 280px;">
                        <li class="dropdown-header fw-bold text-uppercase text-muted text-xs">Notifications (3 New)</li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ url('/admin/notifications') }}">
                                <div class="bg-warning text-dark rounded-circle p-2 fs-6"><i class="fa-solid fa-calendar-plus"></i></div>
                                <div>
                                    <p class="mb-0 text-sm fw-medium">New Booking #BK-9082</p>
                                    <small class="text-muted text-xs">5 mins ago</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ url('/admin/contact-messages') }}">
                                <div class="bg-info text-dark rounded-circle p-2 fs-6"><i class="fa-solid fa-envelope"></i></div>
                                <div>
                                    <p class="mb-0 text-sm fw-medium">Contact Inquiry Received</p>
                                    <small class="text-muted text-xs">25 mins ago</small>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="text-center"><a href="{{ url('/admin/notifications') }}" class="text-warning text-xs text-decoration-none fw-bold">View All Notifications</a></li>
                    </ul>
                </div>

                <!-- Admin Profile Menu -->
                <div class="dropdown">
                    <button class="btn btn-dark d-flex align-items-center gap-2 border-0 p-1" data-bs-toggle="dropdown">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Admin Avatar" class="rounded-circle border border-warning" width="36" height="36">
                        <span class="d-none d-md-inline-block text-white text-sm fw-medium">{{ session('admin_name', 'Admin') }} <i class="fa-solid fa-chevron-down text-xs text-muted ms-1"></i></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end border-0 shadow-lg">
                        <li class="px-3 py-2">
                            <span class="d-block fw-bold text-white">{{ session('admin_name', 'Admin') }}</span>
                            <span class="d-block text-muted text-xs">Super Admin</span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('/admin/profile') }}"><i class="fa-solid fa-user-gear me-2 text-warning"></i> Admin Profile</a></li>
                        <li><a class="dropdown-item" href="{{ url('/admin/settings') }}"><i class="fa-solid fa-sliders me-2 text-warning"></i> System Settings</a></li>
                        <li><a class="dropdown-item" href="{{ url('/admin/change-password') }}"><i class="fa-solid fa-key me-2 text-warning"></i> Change Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{ url('/admin/logout') }}"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>