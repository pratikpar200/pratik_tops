<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<style>
    /* ===== Sidebar Full Height Scroll ===== */
    .glass-sidebar {
        overflow-y: auto;
    }

    /* ===== Scrollbar Design ===== */
    .glass-sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .glass-sidebar::-webkit-scrollbar-track {
        background: transparent;
    }

    .glass-sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 10px;
    }

    .glass-sidebar::-webkit-scrollbar-thumb:hover {
        background: #00c6ff;
    }
</style>

<!-- Sidebar -->
<aside class="glass-sidebar" id="sidebar">

    <!-- Header -->
    <div class="sidebar-header d-flex justify-content-between align-items-center mb-4">
        <div class="logo-area d-flex align-items-center">

            <!-- Logo -->
            <div class="logo-icon me-2 d-flex align-items-center justify-content-center"
                style="width:45px;height:45px;background:linear-gradient(135deg,#0d6efd,#00c6ff);border-radius:12px;color:#fff;font-size:20px;">
                <i class="bi bi-truck"></i>
            </div>

            <h5 class="fw-bold mb-0 text-white">
                Ship<span style="color:#00c6ff;">zo</span>
            </h5>
        </div>

        <button class="btn btn-close-preview d-lg-none text-white border-0" id="closeSidebar">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <!-- Menu -->
    <ul class="nav flex-column sidebar-nav">

        <li class="nav-item">
            <a href="dashboard" class="nav-link <?= $currentPage == 'dashboard' ? 'active' : '' ?>">
                <i class="bi bi-grid"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="employee" class="nav-link <?= $currentPage == 'employee' ? 'active' : '' ?>">
                <i class="bi bi-person-badge"></i> <span>Employee</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="seller" class="nav-link <?= $currentPage == 'seller' ? 'active' : '' ?>">
                <i class="bi bi-building"></i> <span>Seller</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="transporter" class="nav-link <?= $currentPage == 'transporter' ? 'active' : '' ?>">
                <i class="bi bi-truck"></i> <span>Transporter</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="orders" class="nav-link <?= $currentPage == 'orders' ? 'active' : '' ?>">
                <i class="bi bi-boxes"></i> <span>Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="payments" class="nav-link <?= $currentPage == 'payments' ? 'active' : '' ?>">
                <i class="bi bi-wallet2"></i> <span>Payments</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="contact" class="nav-link <?= $currentPage == 'Contact' ? 'active' : '' ?>">
                <i class="bi bi-envelope-fill"></i> <span>contact</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="reports" class="nav-link <?= $currentPage == 'reports' ? 'active' : '' ?>">
                <i class="bi bi-pie-chart-fill"></i> <span>Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="reviews" class="nav-link <?= $currentPage == 'reviews' ? 'active' : '' ?>">
                <i class="bi bi-chat-dots-fill"></i> <span>Reviews</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="otp" class="nav-link <?= $currentPage == 'OTP-Verify' ? 'active' : '' ?>">
                <i class="bi bi-shield-lock-fill"></i> <span>otp</span>
            </a>
        </li>

    </ul>

</aside>

<!-- Main Content Wrapper -->
<main class="main-content p-4">

    <!-- Topbar -->
    <div class="glass-topbar d-flex justify-content-between align-items-center mb-4">
        <div class="search-box">
            <div class="input-group">
                <span class="input-group-text bg-transparent border-0 text-white"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control glass-input border-0" placeholder="Search...">
            </div>
        </div>

        <div class="d-flex align-items-center gap-3">
            <button class="btn text-white position-relative profile-btn">
                <i class="bi bi-bell-fill fs-5"></i>
                <span
                    class="position-absolute top-25 start-75 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
            </button>

            <div class="dropdown">
                <button class="btn dropdown-toggle text-white d-flex align-items-center gap-2 border-0 profile-btn" type="button"
                    data-bs-toggle="dropdown">
                    <!-- Admin Avatar -->
                    <div class="d-flex align-items-center justify-content-center rounded-circle"
                         style="width:35px;height:35px;background:linear-gradient(135deg,#0D8ABC,#00c6ff);color:#fff;">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <span class="d-none d-md-block fw-medium"><?php echo isset($_SESSION['admin_name']) ? htmlspecialchars($_SESSION['admin_name']) : 'Admin'; ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end glass-dropdown mt-2">
                    <li><a class="dropdown-item text-danger logout-link" href="logout"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>