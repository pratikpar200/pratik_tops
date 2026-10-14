@extends('admin.layout.main')

@section('main_container')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h3 class="fw-bold font-heading text-white mb-1">Invoices Management</h3>
        <p class="text-muted text-sm mb-0">Manage system records and configurations.</p>
    </div>
    <div class="mt-3 mt-md-0">
        <a href="{{ url('#') }}" class="btn btn-warning fw-bold text-dark rounded-pill px-4"><i class="fa-solid fa-plus me-2"></i>Generate Invoice</a>
    </div>
</div>

<div class="admin-table-card p-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="text-muted text-xs text-uppercase font-heading fw-bold">Data Records</span>
        <input type="text" class="form-control form-control-sm bg-dark-main border-secondary text-white table-search-input" style="width: 250px;" placeholder="Search records...">
    </div>
    <div class="table-responsive">
        <table class="table table-dark-custom align-middle">
            <thead>
                <tr>
                    <th>Invoice ID</th><th>Customer</th><th>Amount</th><th>Date</th><th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>#INV-9082</td><td>Alex Morgan</td><td>$549.00</td><td>Oct 28, 2026</td><td><span class='badge bg-success'>Paid</span></td><td><a href='#' class='btn btn-sm btn-outline-info'><i class='fa-solid fa-eye'></i></a></td></tr>

            </tbody>
        </table>
    </div>
</div>
@endsection
