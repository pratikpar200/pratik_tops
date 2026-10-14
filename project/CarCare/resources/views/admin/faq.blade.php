@extends('admin.layout.main')

@section('main_container')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h3 class="fw-bold font-heading text-white mb-1">FAQ Manager</h3>
        <p class="text-muted text-sm mb-0">Manage system records and configurations.</p>
    </div>
    <div class="mt-3 mt-md-0">
        <a href="{{ url('#') }}" class="btn btn-warning fw-bold text-dark rounded-pill px-4"><i class="fa-solid fa-plus me-2"></i>Add FAQ</a>
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
                    <th>ID</th><th>Question</th><th>Category</th><th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>#FAQ-01</td><td>How long does Ceramic Coating take?</td><td>General</td><td><span class='badge bg-success'>Active</span></td><td><a href='#' class='btn btn-sm btn-outline-warning'><i class='fa-solid fa-pen'></i></a></td></tr>

            </tbody>
        </table>
    </div>
</div>
@endsection
