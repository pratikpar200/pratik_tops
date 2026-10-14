@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Edit Gallery Item</h3>
    <p class="text-muted text-sm mb-0">Update gallery image details below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <form action="{{ url('/admin/edit-gallery/' . $gallery->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Image Title *</label>
            <input type="text" name="title" class="form-control bg-dark-main border-secondary text-white @error('title') is-invalid @enderror" placeholder="e.g. Interior Ceramic Finish" value="{{ old('title', $gallery->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Showcase Image (Leave blank to keep current)</label>
            <input type="file" name="image" class="form-control bg-dark-main border-secondary text-white @error('image') is-invalid @enderror">
            @if($gallery->image)
                <div class="mt-2 text-xs">
                    <span class="text-muted">Current image:</span>
                    <a href="{{ asset($gallery->image) }}" target="_blank" class="text-warning text-decoration-none ms-1">{{ basename($gallery->image) }}</a>
                </div>
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Update Record</button>
            <a href="{{ url('/admin/gallery') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
