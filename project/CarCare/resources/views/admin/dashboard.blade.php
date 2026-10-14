@extends('admin.layout.layout')

@section('container')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h3 class="fw-bold font-heading text-white mb-1">Dashboard Overview</h3>
        <p class="text-muted text-sm mb-0">Welcome back, Alex! Here is what's happening at Car Care today.</p>
    </div>
    <div class="mt-3 mt-md-0">
        <a href="{{ url('/admin/add-booking') }}" class="btn btn-warning fw-bold text-dark rounded-pill px-4"><i class="fa-solid fa-plus me-2"></i>New Booking</a>
    </div>
</div>

<!-- Stats Cards Row 1 -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase text-xs fw-bold font-heading">Total Customers</span>
                    <h2 class="fw-extrabold text-white font-heading my-2">{{ number_format($totalCustomers) }}</h2>
                    <span class="text-success text-xs fw-bold"><i class="fa-solid fa-users me-1"></i>Active Directory</span>
                </div>
                <div class="p-3 bg-primary-subtle text-primary rounded-circle fs-3"><i class="fa-solid fa-users"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase text-xs fw-bold font-heading">Total Bookings</span>
                    <h2 class="fw-extrabold text-white font-heading my-2">{{ number_format($totalBookings) }}</h2>
                    <span class="text-success text-xs fw-bold"><i class="fa-solid fa-calendar-check me-1"></i>Reservations</span>
                </div>
                <div class="p-3 bg-warning-subtle text-warning rounded-circle fs-3"><i class="fa-solid fa-calendar-day"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase text-xs fw-bold font-heading">Total Revenue</span>
                    <h2 class="fw-extrabold text-white font-heading my-2">${{ number_format($totalPayments, 2) }}</h2>
                    <span class="text-success text-xs fw-bold"><i class="fa-solid fa-sack-dollar me-1"></i>Earned Payments</span>
                </div>
                <div class="p-3 bg-success-subtle text-success rounded-circle fs-3"><i class="fa-solid fa-sack-dollar"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase text-xs fw-bold font-heading">Total Reviews</span>
                    <h2 class="fw-extrabold text-white font-heading my-2">{{ number_format($totalReviews) }}</h2>
                    <span class="text-success text-xs fw-bold"><i class="fa-solid fa-star me-1"></i>Feedback Left</span>
                </div>
                <div class="p-3 bg-info-subtle text-info rounded-circle fs-3"><i class="fa-solid fa-star"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards Row 2 -->
<div class="row g-3 mb-4">
    <div class="col-sm-4">
        <div class="stat-card p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase text-xs fw-bold font-heading">Total Services</span>
                    <h5 class="fw-bold text-white font-heading my-2 fs-3">{{ $totalServices }} Available</h5>
                </div>
                <div class="p-3 bg-secondary-subtle text-secondary rounded-circle fs-4"><i class="fa-solid fa-screwdriver-wrench"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="stat-card p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase text-xs fw-bold font-heading">Total Mechanics</span>
                    <h5 class="fw-bold text-white font-heading my-2 fs-3">{{ $totalMechanics }} On Duty</h5>
                </div>
                <div class="p-3 bg-secondary-subtle text-secondary rounded-circle fs-4"><i class="fa-solid fa-user-gear"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="stat-card p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase text-xs fw-bold font-heading">Total Packages</span>
                    <h5 class="fw-bold text-white font-heading my-2 fs-3">{{ $totalPackages }} Active</h5>
                </div>
                <div class="p-3 bg-secondary-subtle text-secondary rounded-circle fs-4"><i class="fa-solid fa-cubes"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Bookings Table -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="admin-table-card p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="fw-bold font-heading text-white mb-0">Recent Bookings</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-dark-custom align-middle">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Vehicle</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentBookings as $booking)
                            <tr>
                                <td class="fw-bold text-warning">#BK-{{ $booking->id }}</td>
                                <td class="text-white">{{ optional($booking->customer)->name }}</td>
                                <td>{{ optional($booking->serviceRelation)->service_name }}</td>
                                <td class="text-white-50">{{ $booking->vehicle_name }}</td>
                                <td>
                                    @if($booking->booking_status == 'Pending')
                                        <span class="badge bg-warning text-dark"><i class="fa-solid fa-clock me-1"></i>Pending</span>
                                    @elseif($booking->booking_status == 'Confirmed')
                                        <span class="badge bg-primary text-white"><i class="fa-solid fa-circle-check me-1"></i>Confirmed</span>
                                    @elseif($booking->booking_status == 'Completed')
                                        <span class="badge bg-success text-white"><i class="fa-solid fa-square-check me-1"></i>Completed</span>
                                    @else
                                        <span class="badge bg-danger text-white"><i class="fa-solid fa-circle-xmark me-1"></i>Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/admin/bookings/' . $booking->id . '/edit') }}" class="btn btn-sm btn-outline-warning p-1 px-2"><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No recent bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="admin-table-card p-4 h-100">
            <h5 class="fw-bold font-heading text-white mb-3">Service Distribution</h5>
            <!-- SVG Chart Representation -->
            <div class="text-center py-4">
                <svg width="180" height="180" viewBox="0 0 42 42" class="donut">
                    <circle class="donut-hole" cx="21" cy="21" r="15.915" fill="#1e293b"></circle>
                    <circle class="donut-ring" cx="21" cy="21" r="15.915" fill="transparent" stroke="#0f172a" stroke-width="4"></circle>
                    <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#ffb703" stroke-width="4" stroke-dasharray="45 55" stroke-dashoffset="25"></circle>
                    <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#0d6efd" stroke-width="4" stroke-dasharray="30 70" stroke-dashoffset="80"></circle>
                    <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#10b981" stroke-width="4" stroke-dasharray="25 75" stroke-dashoffset="50"></circle>
                </svg>
                <div class="d-flex justify-content-center gap-3 text-xs text-muted mt-3">
                    <span><i class="fa-solid fa-circle text-warning me-1"></i>Ceramic</span>
                    <span><i class="fa-solid fa-circle text-primary me-1"></i>Wash</span>
                    <span><i class="fa-solid fa-circle text-success me-1"></i>Steam</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
