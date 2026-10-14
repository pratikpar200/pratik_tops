@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Edit Package</h3>
    <p class="text-muted text-sm mb-0">Update the system service package details below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <form action="{{ url('/admin/edit-package/' . $package->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Package Name *</label>
            <input type="text" name="package_name" class="form-control bg-dark-main border-secondary text-white @error('package_name') is-invalid @enderror" placeholder="e.g. Monthly Unlimited Wash" value="{{ old('package_name', $package->package_name) }}">
            @error('package_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Price ($) *</label>
            <input type="number" step="0.01" name="price" class="form-control bg-dark-main border-secondary text-white @error('price') is-invalid @enderror" placeholder="199.99" value="{{ old('price', $package->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Validity (e.g. 30 Days / 1 Year) *</label>
            <input type="text" name="validity" class="form-control bg-dark-main border-secondary text-white @error('validity') is-invalid @enderror" placeholder="e.g. 30 Days" value="{{ old('validity', $package->validity) }}">
            @error('validity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Status *</label>
            <select name="status" class="form-select bg-dark-main border-secondary text-white @error('status') is-invalid @enderror">
                <option value="Active" @selected(old('status', $package->status) == 'Active')>Active</option>
                <option value="Inactive" @selected(old('status', $package->status) == 'Inactive')>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Package Image (Leave blank to keep current)</label>
            <input type="file" name="image" class="form-control bg-dark-main border-secondary text-white @error('image') is-invalid @enderror">
            @if($package->image)
                <div class="mt-2 text-xs">
                    <span class="text-muted">Current image:</span>
                    <a href="{{ asset($package->image) }}" target="_blank" class="text-warning text-decoration-none ms-1">{{ basename($package->image) }}</a>
                </div>
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Description *</label>
            <textarea name="description" class="form-control bg-dark-main border-secondary text-white @error('description') is-invalid @enderror" rows="2" placeholder="Describe the inclusions and details of this package...">{{ old('description', $package->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Update Record</button>
            <a href="{{ url('/admin/packages') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
