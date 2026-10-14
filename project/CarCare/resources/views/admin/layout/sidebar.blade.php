<!-- Sidebar Navigation -->
    <aside class="admin-sidebar bg-dark text-white border-end border-secondary border-opacity-25" id="adminSidebar">
        <div class="sidebar-content pt-5 pb-4 px-3">
            <div class="user-brief-card mb-4 mt-3 p-3 bg-dark-main rounded-3 border border-secondary border-opacity-25 text-center">
                <div class="position-relative d-inline-block mb-2">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=120&auto=format&fit=crop&q=80" alt="Admin" class="rounded-circle border border-2 border-warning" width="60" height="60">
                    <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-dark rounded-circle"></span>
                </div>
                <h6 class="mb-0 fw-bold text-white">{{ session('admin_name', 'Admin') }}</h6>
                <small class="text-warning text-xs font-heading">Super Administrator</small>
            </div>

            <ul class="nav nav-pills flex-column gap-1 sidebar-nav text-sm">
                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge-high me-3 text-warning"></i> Dashboard
                    </a>
                </li>

                <li class="nav-header text-uppercase text-muted text-xs font-heading fw-bold mt-3 mb-1 px-3">Core Operations</li>

                <li class="nav-item">
                    <a href="{{ url('/admin/bookings') }}" class="nav-link {{ Request::is('admin/bookings*') || Request::is('admin/add-booking') || Request::is('admin/edit-booking') ? 'active' : '' }}">
                        <i class="fa-solid fa-calendar-check me-3 text-warning"></i> Bookings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/customers') }}" class="nav-link {{ Request::is('admin/customers*') || Request::is('admin/add-customer') || Request::is('admin/edit-customer') ? 'active' : '' }}">
                        <i class="fa-solid fa-users me-3 text-warning"></i> Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/services') }}" class="nav-link {{ Request::is('admin/services*') || Request::is('admin/add-service') ? 'active' : '' }}">
                        <i class="fa-solid fa-screwdriver-wrench me-3 text-warning"></i> Services
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/packages') }}" class="nav-link {{ Request::is('admin/packages*') || Request::is('admin/add-package') ? 'active' : '' }}">
                        <i class="fa-solid fa-cubes me-3 text-warning"></i> Packages
                    </a>
                </li>

                <li class="nav-header text-uppercase text-muted text-xs font-heading fw-bold mt-3 mb-1 px-3">Staff & Workshop</li>

                <li class="nav-item">
                    <a href="{{ url('/admin/mechanics') }}" class="nav-link {{ Request::is('admin/mechanics*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-gear me-3 text-warning"></i> Mechanics
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/employees') }}" class="nav-link {{ Request::is('admin/employees*') || Request::is('admin/add-employee') ? 'active' : '' }}">
                        <i class="fa-solid fa-id-badge me-3 text-warning"></i> Employees
                    </a>
                </li>

                <li class="nav-header text-uppercase text-muted text-xs font-heading fw-bold mt-3 mb-1 px-3">Financials</li>

                <li class="nav-item">
                    <a href="{{ url('/admin/invoices') }}" class="nav-link {{ Request::is('admin/invoices*') ? 'active' : '' }}">
                        <i class="fa-solid fa-file-invoice-dollar me-3 text-warning"></i> Invoices
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/payments') }}" class="nav-link {{ Request::is('admin/payments*') ? 'active' : '' }}">
                        <i class="fa-solid fa-credit-card me-3 text-warning"></i> Payments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/reports') }}" class="nav-link {{ Request::is('admin/reports*') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-line me-3 text-warning"></i> Reports
                    </a>
                </li>

                <li class="nav-header text-uppercase text-muted text-xs font-heading fw-bold mt-3 mb-1 px-3">Content & Engagement</li>

                <li class="nav-item">
                    <a href="{{ url('/admin/gallery') }}" class="nav-link {{ Request::is('admin/gallery*') ? 'active' : '' }}">
                        <i class="fa-solid fa-images me-3 text-warning"></i> Gallery Manager
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/reviews') }}" class="nav-link {{ Request::is('admin/reviews*') ? 'active' : '' }}">
                        <i class="fa-solid fa-star me-3 text-warning"></i> Reviews
                    </a>
                </li>
               <li class="nav-item">
    <a href="{{ url('/admin/contact-messages') }}" class="nav-link {{ Request::is('admin/contact-messages*') ? 'active' : '' }}">
        <i class="fa-solid fa-address-book me-3 text-warning"></i> Contacts
    </a>
</li>
                <li class="nav-item">
                    <a href="{{ url('/admin/faq') }}" class="nav-link {{ Request::is('admin/faq*') ? 'active' : '' }}">
                        <i class="fa-solid fa-circle-question me-3 text-warning"></i> FAQ Manager
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/notifications') }}" class="nav-link {{ Request::is('admin/notifications*') ? 'active' : '' }}">
                        <i class="fa-solid fa-bell me-3 text-warning"></i> Notifications
                    </a>
                </li>

                <li class="nav-header text-uppercase text-muted text-xs font-heading fw-bold mt-3 mb-1 px-3">System</li>

                <li class="nav-item">
                    <a href="{{ url('/admin/settings') }}" class="nav-link {{ Request::is('admin/settings*') ? 'active' : '' }}">
                        <i class="fa-solid fa-sliders me-3 text-warning"></i> Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/profile') }}" class="nav-link {{ Request::is('admin/profile*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user me-3 text-warning"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/logout') }}" class="nav-link text-danger">
                        <i class="fa-solid fa-right-from-bracket me-3"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </aside>