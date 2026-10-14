@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Booking Detail</h3>
    <p class="text-muted text-sm mb-0">Detailed view of service reservation request.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <div class="card bg-transparent border-0">
        <div class="card-body p-0">
            <!-- Header Section -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-start border-bottom border-secondary border-opacity-25 pb-3 mb-4">
                <div>
                    <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-1 mb-2">RESERVATION #{{ $booking->id }}</span>
                    <h4 class="text-white fw-bold mb-1">
                        {{ $booking->serviceRelation->service_name ?? 'N/A' }}
                    </h4>
                    <p class="text-muted text-xs mb-0">
                        <i class="fa-solid fa-calendar-day me-1"></i>Requested Visit: <strong>{{ \Carbon\Carbon::parse($booking->booking_date)->format('l, F d, Y') }}</strong>
                        @if($booking->booking_time)
                            <span class="ms-2"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</span>
                        @endif
                    </p>
                </div>
                <div class="mt-3 mt-sm-0 text-sm-end">
                    <span class="d-block text-xs text-muted mb-1">Current Status</span>
                    @if($booking->booking_status == 'Pending')
                        <span class="badge bg-warning text-dark fs-6 px-3 py-2"><i class="fa-solid fa-clock me-1"></i>Pending</span>
                    @elseif($booking->booking_status == 'Confirmed')
                        <span class="badge bg-primary text-white fs-6 px-3 py-2"><i class="fa-solid fa-circle-check me-1"></i>Confirmed</span>
                    @elseif($booking->booking_status == 'Completed')
                        <span class="badge bg-success text-white fs-6 px-3 py-2"><i class="fa-solid fa-square-check me-1"></i>Completed</span>
                    @elseif($booking->booking_status == 'Cancelled')
                        <span class="badge bg-danger text-white fs-6 px-3 py-2"><i class="fa-solid fa-circle-xmark me-1"></i>Cancelled</span>
                    @else
                        <span class="badge bg-secondary text-white fs-6 px-3 py-2">{{ $booking->booking_status }}</span>
                    @endif
                    <span class="d-block text-xs text-muted mb-1 mt-2">Payment Status</span>
                    @if($booking->payment_status == 'Paid')
                        <span class="badge bg-success text-white px-3 py-2"><i class="fa-solid fa-check me-1"></i>Paid</span>
                    @else
                        <span class="badge bg-warning text-dark px-3 py-2"><i class="fa-solid fa-hourglass-half me-1"></i>{{ $booking->payment_status }}</span>
                    @endif
                </div>
            </div>

            <!-- Content Grid -->
            <div class="row g-4 mb-4">
                <!-- Customer Details -->
                <div class="col-md-6">
                    <div class="p-4 rounded-3 border border-secondary border-opacity-25 h-100" style="background-color: #0f172a;">
                        <h5 class="text-white fw-bold border-bottom border-secondary border-opacity-25 pb-2 mb-3">
                            <i class="fa-solid fa-user text-warning me-2"></i>Customer Info
                        </h5>
                        <div class="mb-3">
                            <span class="d-block text-xs text-muted fw-bold text-uppercase mb-1">Full Name</span>
                            <span class="text-white fs-6 fw-medium">{{ $booking->customer->name ?? 'N/A' }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="d-block text-xs text-muted fw-bold text-uppercase mb-1">Phone Number</span>
                            <span class="text-white fs-6 fw-medium">{{ $booking->customer->phone ?? 'N/A' }}</span>
                        </div>
                        <div class="mb-0">
                            <span class="d-block text-xs text-muted fw-bold text-uppercase mb-1">Email Address</span>
                            <a href="mailto:{{ $booking->customer->email ?? '' }}" class="text-warning text-decoration-none hover-warning fs-6 fw-medium">
                                {{ $booking->customer->email ?? 'N/A' }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Vehicle Details -->
                <div class="col-md-6">
                    <div class="p-4 rounded-3 border border-secondary border-opacity-25 h-100" style="background-color: #0f172a;">
                        <h5 class="text-white fw-bold border-bottom border-secondary border-opacity-25 pb-2 mb-3">
                            <i class="fa-solid fa-car text-warning me-2"></i>Vehicle Info
                        </h5>
                        <div class="mb-3">
                            <span class="d-block text-xs text-muted fw-bold text-uppercase mb-1">Vehicle</span>
                            <span class="text-white fs-6 fw-medium">{{ $booking->vehicle_name }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="d-block text-xs text-muted fw-bold text-uppercase mb-1">License Plate Number</span>
                            <span class="text-white fs-6 fw-medium">{{ $booking->vehicle_number ?: 'N/A' }}</span>
                        </div>
                        <div class="mb-0">
                            <span class="d-block text-xs text-muted fw-bold text-uppercase mb-1">Amount</span>
                            <span class="text-white fs-6 fw-medium">${{ number_format($booking->amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message / Requests -->
            <div class="mb-4">
                <span class="d-block text-xs text-muted fw-bold text-uppercase mb-2">Special Requests or Instructions</span>
                <div class="p-4 rounded-3 text-white-50 border border-secondary border-opacity-25" style="background-color: #0f172a; white-space: pre-wrap; line-height: 1.6; font-size: 0.95rem;">{{ $booking->notes ?: 'No special instructions provided by customer.' }}</div>
            </div>

            <!-- Quick Action Form for Status Update -->
            <div class="p-4 rounded-3 border border-warning border-opacity-25 mb-4" style="background-color: rgba(255,183,3,0.03);">
                <h5 class="text-white fw-bold mb-3"><i class="fa-solid fa-sliders text-warning me-2"></i>Update Booking Status</h5>
                <form action="{{ route('bookings.update', $booking->id) }}" method="POST" class="row g-3 align-items-center">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="customer_id" value="{{ $booking->customer_id }}">
                    <input type="hidden" name="service_id" value="{{ $booking->service_id }}">
                    <input type="hidden" name="mechanic_id" value="{{ $booking->mechanic_id }}">
                    <input type="hidden" name="vehicle_name" value="{{ $booking->vehicle_name }}">
                    <input type="hidden" name="vehicle_number" value="{{ $booking->vehicle_number }}">
                    <input type="hidden" name="booking_date" value="{{ $booking->booking_date }}">
                    <input type="hidden" name="booking_time" value="{{ $booking->booking_time }}">
                    <input type="hidden" name="amount" value="{{ $booking->amount }}">
                    <input type="hidden" name="payment_status" value="{{ $booking->payment_status }}">
                    <input type="hidden" name="notes" value="{{ $booking->notes }}">
                    <div class="col-sm-6 col-md-4">
                        <select name="booking_status" class="form-select bg-dark-main border-secondary text-white" required>
                            <option value="Pending" @selected($booking->booking_status == 'Pending')>Pending</option>
                            <option value="Confirmed" @selected($booking->booking_status == 'Confirmed')>Confirmed</option>
                            <option value="Completed" @selected($booking->booking_status == 'Completed')>Completed</option>
                            <option value="Cancelled" @selected($booking->booking_status == 'Cancelled')>Cancelled</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill px-4">Update Status</button>
                    </div>
                </form>
            </div>

            <!-- Footer Meta -->
            <div class="text-xs text-muted mb-4">
                <span>Created At: {{ $booking->created_at->format('M d, Y h:i A') }}</span>
                <span class="ms-3">Last Updated: {{ $booking->updated_at->format('M d, Y h:i A') }}</span>
            </div>

            <!-- Actions Section -->
            <div class="d-flex align-items-center border-top border-secondary border-opacity-25 pt-4 mt-4">
                <a href="{{ route('bookings.index') }}" class="btn btn-outline-light rounded-pill px-4 py-2">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back to Bookings
                </a>
            </div>
        </div>
    </div>
</div>
@endsection