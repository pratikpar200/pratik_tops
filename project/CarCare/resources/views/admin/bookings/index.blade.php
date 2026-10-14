@extends('admin.layout.layout')

@section('container')
<style>
    /* Pagination link styling overrides for dark theme */
    .pagination .page-link {
        background-color: #1e293b;
        border-color: rgba(255, 255, 255, 0.08);
        color: #cbd5e1;
        font-size: 0.85rem;
        padding: 0.5rem 0.75rem;
        transition: all 0.2s ease;
    }
    .pagination .page-link:hover {
        background-color: #ffb703;
        color: #0b0f19;
        border-color: #ffb703;
    }
    .pagination .page-item.active .page-link {
        background-color: #ffb703;
        border-color: #ffb703;
        color: #0b0f19;
        font-weight: bold;
    }
    .pagination .page-item.disabled .page-link {
        background-color: #0f172a;
        border-color: rgba(255, 255, 255, 0.05);
        color: #475569;
    }
    .table-dark-custom tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.02);
    }
    .btn-action-custom {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        padding: 0;
        transition: all 0.2s ease;
    }
</style>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h3 class="fw-bold font-heading text-white mb-1">Service Bookings</h3>
        <p class="text-muted text-sm mb-0">Manage customer vehicle booking requests.</p>
    </div>
    <div class="mt-3 mt-md-0">
        <a href="{{ url('/admin/add-booking') }}" class="btn btn-warning fw-bold text-dark rounded-pill px-4"><i class="fa-solid fa-plus me-2"></i>Add Booking</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success bg-success-subtle border-success text-success alert-dismissible fade show rounded-3 mb-4" role="alert">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-circle-check fs-5 me-2"></i>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="admin-table-card p-4">
    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-3">
        <span class="text-muted text-xs text-uppercase font-heading fw-bold">
            @if($search)
                Search Results for "{{ $search }}" ({{ $bookings->total() }})
            @else
                Booking Records ({{ $bookings->total() }})
            @endif
        </span>
        <form action="{{ route('bookings.index') }}" method="GET" class="d-flex gap-2 w-100 w-sm-auto">
            <div class="input-group input-group-sm" style="max-width: 320px;">
                <span class="input-group-text bg-dark-main border-secondary text-muted">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="search" value="{{ $search }}" class="form-control bg-dark-main border-secondary text-white table-search-input shadow-none" placeholder="Search bookings...">
                @if($search)
                    <a href="{{ route('bookings.index') }}" class="btn btn-outline-secondary border-secondary d-flex align-items-center" title="Clear Search">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                @endif
            </div>
            <button type="submit" class="btn btn-sm btn-warning text-dark fw-bold px-3">Search</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-dark-custom align-middle text-sm">
            <thead>
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Vehicle</th>
                    <th>Service</th>
                    <th>Appt Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th style="width: 100px; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td class="fw-bold text-muted">#{{ $booking->id }}</td>
                        <td class="text-white fw-medium">{{ $booking->customer->name ?? 'N/A' }}</td>
                        <td>{{ $booking->customer->phone ?? 'N/A' }}</td>
                        <td>
                            <a href="mailto:{{ $booking->customer->email ?? '' }}" class="text-warning text-decoration-none hover-warning">
                                {{ $booking->customer->email ?? 'N/A' }}
                            </a>
                        </td>
                        <td class="text-white-50">
                            {{ $booking->vehicle_name }}
                            @if($booking->vehicle_number)
                                <small class="d-block text-muted">({{ $booking->vehicle_number }})</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-dark text-white">{{ $booking->serviceRelation->service_name ?? 'N/A' }}</span>
                        </td>
                        <td class="text-white-50">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</td>
                        <td>
                            @if($booking->booking_status == 'Pending')
                                <span class="badge bg-warning text-dark"><i class="fa-solid fa-clock me-1"></i>Pending</span>
                            @elseif($booking->booking_status == 'Confirmed')
                                <span class="badge bg-primary text-white"><i class="fa-solid fa-circle-check me-1"></i>Confirmed</span>
                            @elseif($booking->booking_status == 'Completed')
                                <span class="badge bg-success text-white"><i class="fa-solid fa-square-check me-1"></i>Completed</span>
                            @elseif($booking->booking_status == 'Cancelled')
                                <span class="badge bg-danger text-white"><i class="fa-solid fa-circle-xmark me-1"></i>Cancelled</span>
                            @else
                                <span class="badge bg-secondary text-white">{{ $booking->booking_status }}</span>
                            @endif
                        </td>
                        <td class="text-xs text-muted">{{ $booking->created_at->format('M d, Y') }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-outline-info btn-action-custom" title="View Booking">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-outline-warning btn-action-custom" title="Edit Booking">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-action-custom btn-delete-booking" 
                                        data-action="{{ route('bookings.destroy', $booking->id) }}" 
                                        title="Delete Booking">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted py-5">
                            <i class="fa-solid fa-calendar-times fs-3 mb-2 text-warning opacity-50"></i>
                            <p class="mb-0">No service bookings found.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination & Summary -->
    @if($bookings->total() > 0)
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 mt-4 pt-3 border-top border-secondary border-opacity-25">
            <div class="text-xs text-muted">
                Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }} of {{ $bookings->total() }} records
            </div>
            <div>
                {{ $bookings->links() }}
            </div>
        </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteBookingModal" tabindex="-1" aria-labelledby="deleteBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border border-secondary" style="background-color: #1e293b;">
            <div class="modal-header border-bottom border-secondary border-opacity-25">
                <h5 class="modal-title text-white" id="deleteBookingModalLabel">
                    <i class="fa-solid fa-triangle-exclamation text-danger me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-muted text-sm">
                Are you sure you want to delete this service booking? This action is permanent and cannot be undone.
            </div>
            <div class="modal-footer border-top border-secondary border-opacity-25">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4 text-xs" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteBookingForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill px-4 text-xs fw-bold">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteBookingModal'));
        const deleteForm = document.getElementById('deleteBookingForm');

        document.querySelectorAll('.btn-delete-booking').forEach(button => {
            button.addEventListener('click', function () {
                const action = this.getAttribute('data-action');
                deleteForm.setAttribute('action', action);
                deleteModal.show();
            });
        });
    });
</script>
@endsection