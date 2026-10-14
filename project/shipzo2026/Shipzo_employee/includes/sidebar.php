<?php
// includes/sidebar.php
$url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
?>

<!-- Sidebar -->
<aside class="glass-sidebar" id="sidebar">
    <div class="sidebar-header d-flex justify-content-between align-items-center mb-4">
        <div class="logo-area d-flex align-items-center">
            <div class="logo-icon me-2 d-flex align-items-center justify-content-center"
                 style="width:45px;height:45px;background:linear-gradient(135deg,#0d6efd,#00c6ff);border-radius:12px;color:#fff;font-size:20px;">
                <i class="bi bi-truck"></i>
            </div>
            <h5 class="fw-bold mb-0 text-white tracker-title">
                Ship<span style="color:#00c6ff;">zo</span> <small style="font-size: 10px; opacity: 0.7;"></small>
            </h5>
        </div>
        <button class="btn btn-close-preview d-lg-none text-white border-0" id="closeSidebar">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <ul class="nav flex-column sidebar-nav mt-3">
        <li class="nav-item">
            <a href="dashboard" class="nav-link <?= $url == '/dashboard' ? 'active' : '' ?>">
                <i class="bi bi-grid"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="orders" class="nav-link <?= $url == '/orders' ? 'active' : '' ?>">
                <i class="bi bi-boxes"></i> <span>Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="assign-transporter" class="nav-link <?= $url == '/assign-transporter' ? 'active' : '' ?>">
                <i class="bi bi-truck-flatbed"></i> <span>Assign Transporter</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="contact" class="nav-link <?= $url == '/contact' ? 'active' : '' ?>">
                <i class="bi bi-envelope"></i> <span>Contact</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="payment" class="nav-link <?= $url == '/payment' ? 'active' : '' ?>">
                <i class="bi bi-credit-card"></i> <span>Payment</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="otp" class="nav-link <?= $url == '/otp' ? 'active' : '' ?>">
                <i class="bi bi-key"></i> <span>OTP</span>
            </a>
        </li>



        <li class="nav-item">
            <a href="logout" class="nav-link <?= $url == '/logout' ? 'active' : '' ?>">
                <i class="bi bi-box-arrow-right text-danger"></i> <span class="text-danger">Logout</span>
            </a>
        </li>
    </ul>
</aside>

<!-- Main Area Container -->
<main class="main-content" id="mainContent">

<!-- Top Header -->
<header class="glass-topbar d-flex justify-content-between align-items-center mb-4">

    <div class="d-flex align-items-center">
        <button class="btn btn-menu text-white d-lg-none me-3" id="toggleSidebar">
            <i class="bi bi-list fs-4"></i>
        </button>

        <div class="search-box glass-card d-none d-md-flex align-items-center">
            <i class="bi bi-search text-white-50 ms-3"></i>
            <input type="text" class="form-control glass-input border-0" placeholder="Search orders, tickets...">
        </div>
    </div>

    <div class="topbar-actions d-flex align-items-center gap-3">

        <button class="btn btn-icon glass-card text-white position-relative">
            <i class="bi bi-bell-fill"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
        </button>

        <div class="dropdown">
            <button class="btn dropdown-toggle text-white d-flex align-items-center gap-2 border-0 profile-btn"
                    type="button" data-bs-toggle="dropdown">

                <!-- Employee Avatar -->
                <div class="d-flex align-items-center justify-content-center rounded-circle"
                     style="width:35px;height:35px;background:linear-gradient(135deg,#6c5ce7,#00cec9);color:#fff;">
                    <i class="bi bi-person-badge"></i>
                </div>

                <span class="d-none d-md-block fw-medium"><?php echo isset($_SESSION['employee_name']) ? $_SESSION['employee_name'] : 'Employee'; ?></span>
            </button>

            <ul class="dropdown-menu dropdown-menu-end glass-dropdown mt-2">
                <li><a class="dropdown-item text-danger" href="logout"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
            </ul>
        </div>

    </div>
</header>
