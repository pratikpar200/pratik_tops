@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Edit Mechanic</h3>
    <p class="text-muted text-sm mb-0">Update the mechanic's professional profile below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <form action="{{ url('/admin/edit-mechanic/' . $mechanic->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Full Name *</label>
            <input type="text" name="name" class="form-control bg-dark-main border-secondary text-white @error('name') is-invalid @enderror" placeholder="Alex Carter" value="{{ old('name', $mechanic->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Phone Number *</label>
            <input type="text" name="phone" class="form-control bg-dark-main border-secondary text-white @error('phone') is-invalid @enderror" placeholder="+1 (555) 123-4567" value="{{ old('phone', $mechanic->phone) }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Email Address *</label>
            <input type="email" name="email" class="form-control bg-dark-main border-secondary text-white @error('email') is-invalid @enderror" placeholder="alex@carcare.com" value="{{ old('email', $mechanic->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Specialization (e.g. Ceramic Coatings / Engines) *</label>
            <input type="text" name="specialization" class="form-control bg-dark-main border-secondary text-white @error('specialization') is-invalid @enderror" placeholder="e.g. Paint Correction" value="{{ old('specialization', $mechanic->specialization) }}">
            @error('specialization')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Experience (e.g. 5 Years) *</label>
            <input type="text" name="experience" class="form-control bg-dark-main border-secondary text-white @error('experience') is-invalid @enderror" placeholder="e.g. 3 Years" value="{{ old('experience', $mechanic->experience) }}">
            @error('experience')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Status *</label>
            <select name="status" class="form-select bg-dark-main border-secondary text-white @error('status') is-invalid @enderror">
                <option value="Active" @selected(old('status', $mechanic->status) == 'Active')>Active</option>
                <option value="Inactive" @selected(old('status', $mechanic->status) == 'Inactive')>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Photo (Leave blank to keep current)</label>
            <input type="file" name="photo" class="form-control bg-dark-main border-secondary text-white @error('photo') is-invalid @enderror">
            @if($mechanic->photo)
                <div class="mt-2 text-xs">
                    <span class="text-muted">Current photo:</span>
                    <a href="{{ asset($mechanic->photo) }}" target="_blank" class="text-warning text-decoration-none ms-1">{{ basename($mechanic->photo) }}</a>
                </div>
            @endif
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Home Address *</label>
            <textarea name="address" class="form-control bg-dark-main border-secondary text-white @error('address') is-invalid @enderror" rows="2" placeholder="Residential address...">{{ old('address', $mechanic->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Update Record</button>
            <a href="{{ url('/admin/mechanics') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
