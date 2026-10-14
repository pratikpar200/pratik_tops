@extends('admin.layout.main')

@section('main_container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Add New Employee</h3>
    <p class="text-muted text-sm mb-0">Enter the required details below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <form class="row g-3">
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Employee Name</label>
            <input type="text" class="form-control bg-dark-main border-secondary text-white" placeholder="">
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Role / Designation</label>
            <input type="text" class="form-control bg-dark-main border-secondary text-white" placeholder="">
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Phone</label>
            <input type="text" class="form-control bg-dark-main border-secondary text-white" placeholder="">
        </div>
        
        <div class="col-12 mt-4">
            <button type="button" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Save Record</button>
            <a href="javascript:history.back()" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
