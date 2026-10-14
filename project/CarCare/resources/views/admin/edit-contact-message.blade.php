@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">View Contact Message</h3>
    <p class="text-muted text-sm mb-0">Details of the customer inquiry message below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <div class="row g-3">
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Name</label>
            <input type="text" class="form-control bg-dark-main border-secondary text-white" value="{{ $message->name }}" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Email</label>
            <input type="text" class="form-control bg-dark-main border-secondary text-white" value="{{ $message->email }}" readonly>
        </div>

        <div class="col-12 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Subject</label>
            <input type="text" class="form-control bg-dark-main border-secondary text-white" value="{{ $message->subject }}" readonly>
        </div>

        <div class="col-12 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Message</label>
            <textarea class="form-control bg-dark-main border-secondary text-white" rows="5" readonly>{{ $message->message }}</textarea>
        </div>

        <div class="col-12 mt-4">
            <a href="{{ url('/admin/contact-messages') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Back to Messages</a>
        </div>
    </div>
</div>
@endsection