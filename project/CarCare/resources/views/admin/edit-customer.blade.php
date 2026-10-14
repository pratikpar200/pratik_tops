@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Edit Customer</h3>
    <p class="text-muted text-sm mb-0">Update the customer details below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <form action="{{ url('/admin/edit-customer/' . $customer->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Full Name *</label>
            <input type="text" name="name" class="form-control bg-dark-main border-secondary text-white @error('name') is-invalid @enderror" placeholder="John Doe" value="{{ old('name', $customer->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Email Address *</label>
            <input type="email" name="email" class="form-control bg-dark-main border-secondary text-white @error('email') is-invalid @enderror" placeholder="john@example.com" value="{{ old('email', $customer->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Phone Number *</label>
            <input type="text" name="phone" class="form-control bg-dark-main border-secondary text-white @error('phone') is-invalid @enderror" placeholder="+1 (555) 000-0000" value="{{ old('phone', $customer->phone) }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Status *</label>
            <select name="status" class="form-select bg-dark-main border-secondary text-white @error('status') is-invalid @enderror">
                <option value="Active" @selected(old('status', $customer->status) == 'Active')>Active</option>
                <option value="Inactive" @selected(old('status', $customer->status) == 'Inactive')>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Password (Leave blank to keep current)</label>
            <input type="password" name="password" class="form-control bg-dark-main border-secondary text-white @error('password') is-invalid @enderror" placeholder="Minimum 6 characters">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Address *</label>
            <textarea name="address" class="form-control bg-dark-main border-secondary text-white @error('address') is-invalid @enderror" rows="2" placeholder="Street address...">{{ old('address', $customer->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Update Record</button>
            <a href="{{ url('/admin/customers') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
