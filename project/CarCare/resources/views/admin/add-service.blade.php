@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Add New Service</h3>
    <p class="text-muted text-sm mb-0">Enter the detailing service details below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <form action="{{ url('/admin/add-service') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Service Name *</label>
            <input type="text" name="service_name" class="form-control bg-dark-main border-secondary text-white @error('service_name') is-invalid @enderror" placeholder="e.g. Premium Clay Polish" value="{{ old('service_name') }}">
            @error('service_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Price ($) *</label>
            <input type="number" step="0.01" name="price" class="form-control bg-dark-main border-secondary text-white @error('price') is-invalid @enderror" placeholder="99.99" value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Duration (e.g. 1.5 Hours) *</label>
            <input type="text" name="duration" class="form-control bg-dark-main border-secondary text-white @error('duration') is-invalid @enderror" placeholder="e.g. 2 Hours" value="{{ old('duration') }}">
            @error('duration')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Status *</label>
            <select name="status" class="form-select bg-dark-main border-secondary text-white @error('status') is-invalid @enderror">
                <option value="Active" @selected(old('status') == 'Active')>Active</option>
                <option value="Inactive" @selected(old('status') == 'Inactive')>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Service Image</label>
            <input type="file" name="image" class="form-control bg-dark-main border-secondary text-white @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Description *</label>
            <textarea name="description" class="form-control bg-dark-main border-secondary text-white @error('description') is-invalid @enderror" rows="2" placeholder="Describe what is included in this service...">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Save Record</button>
            <a href="{{ url('/admin/services') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
