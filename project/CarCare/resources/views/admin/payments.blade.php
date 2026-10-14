@extends('admin.layout.layout')

@section('container')
<style>
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
        <h3 class="fw-bold font-heading text-white mb-1">Payments Management</h3>
        <p class="text-muted text-sm mb-0">Track bookings customer payments and transactions.</p>
    </div>
    <div class="mt-3 mt-md-0">
        <a href="{{ url('/admin/add-payment') }}" class="btn btn-warning fw-bold text-dark rounded-pill px-4"><i class="fa-solid fa-plus me-2"></i>Add Payment</a>
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
                Search Results for "{{ $search }}" ({{ $payments->total() }})
            @else
                Payment Records ({{ $payments->total() }})
            @endif
        </span>
        <form action="{{ url('/admin/payments') }}" method="GET" class="d-flex gap-2 w-100 w-sm-auto">
            <div class="input-group input-group-sm" style="max-width: 320px;">
                <span class="input-group-text bg-dark-main border-secondary text-muted">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="search" value="{{ $search }}" class="form-control bg-dark-main border-secondary text-white table-search-input shadow-none" placeholder="Search payments...">
                @if($search)
                    <a href="{{ url('/admin/payments') }}" class="btn btn-outline-secondary border-secondary d-flex align-items-center" title="Clear Search">
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
                    <th style="width: 80px;">ID</th>
                    <th>Booking</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th>Payment Date</th>
                    <th>Status</th>
                    <th style="width: 120px; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                    <tr>
                        <td class="fw-bold text-muted">#{{ $payment->id }}</td>
                        <td class="text-white-50">
                            Booking #{{ $payment->booking_id }}
                            <small class="d-block text-muted">{{ optional($payment->booking)->vehicle_name }}</small>
                        </td>
                        <td class="text-white fw-medium">{{ optional($payment->customer)->name }}</td>
                        <td class="text-warning fw-bold">${{ number_format($payment->amount, 2) }}</td>
                        <td>{{ $payment->payment_method }}</td>
                        <td class="text-white-50">{{ $payment->transaction_id ?? 'N/A' }}</td>
                        <td class="text-white-50">{{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y H:i') }}</td>
                        <td>
                            @if($payment->payment_status == 'Paid')
                                <span class="badge bg-success text-white"><i class="fa-solid fa-circle-check me-1"></i>Paid</span>
                            @elseif($payment->payment_status == 'Refunded')
                                <span class="badge bg-info text-dark"><i class="fa-solid fa-rotate-left me-1"></i>Refunded</span>
                            @elseif($payment->payment_status == 'Failed')
                                <span class="badge bg-danger text-white"><i class="fa-solid fa-circle-xmark me-1"></i>Failed</span>
                            @else
                                <span class="badge bg-warning text-dark"><i class="fa-solid fa-clock me-1"></i>Pending</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ url('/admin/edit-payment/' . $payment->id) }}" class="btn btn-outline-warning btn-action-custom" title="Edit Payment">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-action-custom btn-delete-payment" 
                                        data-action="{{ url('/admin/delete-payment/' . $payment->id) }}" 
                                        title="Delete Payment">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-5">
                            <i class="fa-solid fa-credit-card fs-3 mb-2 text-warning opacity-50"></i>
                            <p class="mb-0">No payment records found.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($payments->total() > 0)
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 mt-4 pt-3 border-top border-secondary border-opacity-25">
            <div class="text-xs text-muted">
                Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }} of {{ $payments->total() }} records
            </div>
            <div>
                {{ $payments->links() }}
            </div>
        </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deletePaymentModal" tabindex="-1" aria-labelledby="deletePaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border border-secondary" style="background-color: #1e293b;">
            <div class="modal-header border-bottom border-secondary border-opacity-25">
                <h5 class="modal-title text-white" id="deletePaymentModalLabel">
                    <i class="fa-solid fa-triangle-exclamation text-danger me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-muted text-sm">
                Are you sure you want to delete this payment record? This action is permanent and cannot be undone.
            </div>
            <div class="modal-footer border-top border-secondary border-opacity-25">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4 text-xs" data-bs-dismiss="modal">Cancel</button>
                <form id="deletePaymentForm" method="POST" action="">
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
        const deleteModal = new bootstrap.Modal(document.getElementById('deletePaymentModal'));
        const deleteForm = document.getElementById('deletePaymentForm');

        document.querySelectorAll('.btn-delete-payment').forEach(button => {
            button.addEventListener('click', function () {
                const action = this.getAttribute('data-action');
                deleteForm.setAttribute('action', action);
                deleteModal.show();
            });
        });
    });
</script>
@endsection
