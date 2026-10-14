@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Edit Review</h3>
    <p class="text-muted text-sm mb-0">Update the customer review details below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <form action="{{ url('/admin/edit-review/' . $review->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Select Customer *</label>
            <select name="customer_id" class="form-select bg-dark-main border-secondary text-white @error('customer_id') is-invalid @enderror">
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" @selected(old('customer_id', $review->customer_id) == $customer->id)>
                        {{ $customer->name }} ({{ $customer->email }})
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Select Booking *</label>
            <select name="booking_id" class="form-select bg-dark-main border-secondary text-white @error('booking_id') is-invalid @enderror">
                <option value="">Select Booking</option>
                @foreach($bookings as $booking)
                    <option value="{{ $booking->id }}" @selected(old('booking_id', $review->booking_id) == $booking->id)>
                        Booking #{{ $booking->id }} - {{ optional($booking->customer)->name ?? 'Customer' }} ({{ $booking->vehicle_name }})
                    </option>
                @endforeach
            </select>
            @error('booking_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Rating (1 to 5 Stars) *</label>
            <select name="rating" class="form-select bg-dark-main border-secondary text-white @error('rating') is-invalid @enderror">
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" @selected(old('rating', $review->rating) == $i)>{{ $i }} Stars</option>
                @endfor
            </select>
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Status *</label>
            <select name="status" class="form-select bg-dark-main border-secondary text-white @error('status') is-invalid @enderror">
                <option value="Approved" @selected(old('status', $review->status) == 'Approved')>Approved</option>
                <option value="Pending" @selected(old('status', $review->status) == 'Pending')>Pending</option>
                <option value="Spam" @selected(old('status', $review->status) == 'Spam')>Spam</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Review *</label>
            <textarea name="review" class="form-control bg-dark-main border-secondary text-white @error('review') is-invalid @enderror" rows="3" placeholder="Enter customer's review comment...">{{ old('review', $review->review) }}</textarea>
            @error('review')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Update Record</button>
            <a href="{{ url('/admin/reviews') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
