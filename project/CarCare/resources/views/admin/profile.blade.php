@extends('admin.layout.layout')

@section('container')
<h3 class="fw-bold font-heading text-white mb-4">Administrator Profile</h3>

@if(session('success'))
    <div class="alert alert-success bg-success-subtle border-success text-success alert-dismissible fade show rounded-3 mb-4" role="alert">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-circle-check fs-5 me-2"></i>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row g-4">
    <div class="col-md-4">
        <div class="admin-table-card p-4 text-center">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80" class="rounded-circle border border-2 border-warning mb-3" width="100" height="100">
            <h5 class="fw-bold text-white mb-1">{{ $admin->name }}</h5>
            <span class="badge bg-warning text-dark mb-3">Super Admin</span>

            <ul class="list-unstyled text-start text-sm mt-3 mb-0">
                <li class="d-flex justify-content-between border-bottom border-secondary border-opacity-25 py-2">
                    <span class="text-muted">Email</span>
                    <span class="text-white fw-medium">{{ $admin->email }}</span>
                </li>
                <li class="d-flex justify-content-between border-bottom border-secondary border-opacity-25 py-2">
                    <span class="text-muted">Status</span>
                    <span class="badge {{ $admin->status === 'Active' ? 'bg-success' : 'bg-secondary' }}">{{ $admin->status }}</span>
                </li>
                <li class="d-flex justify-content-between py-2">
                    <span class="text-muted">Created</span>
                    <span class="text-white fw-medium">{{ $admin->created_at?->format('d M Y') }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-8">
        <div class="admin-table-card p-4">
            <h5 class="fw-bold text-white mb-3">Admin Details</h5>
            <form action="{{ url('/admin/profile') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label class="form-label text-xs text-muted fw-bold">Admin Name *</label>
                    <input type="text" name="name" class="form-control bg-dark-main border-secondary text-white @error('name') is-invalid @enderror" value="{{ old('name', $admin->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label text-xs text-muted fw-bold">System Email *</label>
                    <input type="email" name="email" class="form-control bg-dark-main border-secondary text-white @error('email') is-invalid @enderror" value="{{ old('email', $admin->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label text-xs text-muted fw-bold">New Password (leave blank to keep current)</label>
                    <input type="password" name="password" class="form-control bg-dark-main border-secondary text-white @error('password') is-invalid @enderror" placeholder="Minimum 6 characters">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-warning fw-bold text-dark px-4 rounded-pill">Save Profile Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection