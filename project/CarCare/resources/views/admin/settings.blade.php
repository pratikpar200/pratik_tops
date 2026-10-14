@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">System Configuration Settings</h3>
    <p class="text-muted text-sm mb-0">Modify global website configurations below.</p>
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

<div class="admin-table-card p-4 p-md-5">
    <form action="{{ url('/admin/settings') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Website Name *</label>
            <input type="text" name="website_name" class="form-control bg-dark-main border-secondary text-white @error('website_name') is-invalid @enderror" value="{{ old('website_name', $setting->website_name) }}">
            @error('website_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Support Email Address *</label>
            <input type="email" name="email" class="form-control bg-dark-main border-secondary text-white @error('email') is-invalid @enderror" value="{{ old('email', $setting->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Hotline Phone Number *</label>
            <input type="text" name="phone" class="form-control bg-dark-main border-secondary text-white @error('phone') is-invalid @enderror" value="{{ old('phone', $setting->phone) }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Website Logo (Leave blank to keep current)</label>
            <input type="file" name="logo" class="form-control bg-dark-main border-secondary text-white @error('logo') is-invalid @enderror">
            @if($setting->logo)
                <div class="mt-2 text-xs">
                    <span class="text-muted">Current Logo:</span>
                    <a href="{{ asset($setting->logo) }}" target="_blank" class="text-warning text-decoration-none ms-1">{{ basename($setting->logo) }}</a>
                </div>
            @endif
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Facebook Profile Link</label>
            <input type="url" name="facebook" class="form-control bg-dark-main border-secondary text-white @error('facebook') is-invalid @enderror" placeholder="https://facebook.com/example" value="{{ old('facebook', $setting->facebook) }}">
            @error('facebook')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Instagram Profile Link</label>
            <input type="url" name="instagram" class="form-control bg-dark-main border-secondary text-white @error('instagram') is-invalid @enderror" placeholder="https://instagram.com/example" value="{{ old('instagram', $setting->instagram) }}">
            @error('instagram')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Workshop Address *</label>
            <textarea name="address" class="form-control bg-dark-main border-secondary text-white @error('address') is-invalid @enderror" rows="2" placeholder="Enter workshop operational address...">{{ old('address', $setting->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Save Settings</button>
            <a href="javascript:history.back()" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
