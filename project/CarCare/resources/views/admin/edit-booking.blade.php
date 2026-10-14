@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Edit Booking</h3>
    <p class="text-muted text-sm mb-0">Update the vehicle service booking details below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <form action="{{ url('/admin/bookings/' . $booking->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Select Customer *</label>
            <select name="customer_id" class="form-select bg-dark-main border-secondary text-white @error('customer_id') is-invalid @enderror">
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" @selected(old('customer_id', $booking->customer_id) == $customer->id)>
                        {{ $customer->name }} ({{ $customer->phone }})
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Select Detailing Service *</label>
            <select name="service_id" class="form-select bg-dark-main border-secondary text-white @error('service_id') is-invalid @enderror">
                <option value="">Select Service</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" @selected(old('service_id', $booking->service_id) == $service->id)>
                        {{ $service->service_name }} (${{ number_format($service->price, 2) }})
                    </option>
                @endforeach
            </select>
            @error('service_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Assign Mechanic</label>
            <select name="mechanic_id" class="form-select bg-dark-main border-secondary text-white @error('mechanic_id') is-invalid @enderror">
                <option value="">No Mechanic Assigned</option>
                @foreach($mechanics as $mechanic)
                    <option value="{{ $mechanic->id }}" @selected(old('mechanic_id', $booking->mechanic_id) == $mechanic->id)>
                        {{ $mechanic->name }} ({{ $mechanic->specialization }})
                    </option>
                @endforeach
            </select>
            @error('mechanic_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Vehicle Name (Manufacturer & Model) *</label>
            <input type="text" name="vehicle_name" class="form-control bg-dark-main border-secondary text-white @error('vehicle_name') is-invalid @enderror" placeholder="e.g. BMW M4" value="{{ old('vehicle_name', $booking->vehicle_name) }}">
            @error('vehicle_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Vehicle Number (License Plate)</label>
            <input type="text" name="vehicle_number" class="form-control bg-dark-main border-secondary text-white @error('vehicle_number') is-invalid @enderror" placeholder="ABC-1234" value="{{ old('vehicle_number', $booking->vehicle_number) }}">
            @error('vehicle_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Booking Date *</label>
            <input type="date" name="booking_date" class="form-control bg-dark-main border-secondary text-white @error('booking_date') is-invalid @enderror" value="{{ old('booking_date', $booking->booking_date) }}">
            @error('booking_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Booking Time *</label>
            <input type="time" name="booking_time" class="form-control bg-dark-main border-secondary text-white @error('booking_time') is-invalid @enderror" value="{{ old('booking_time', \Carbon\Carbon::parse($booking->booking_time)->format('H:i')) }}">
            @error('booking_time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Service Amount ($) *</label>
            <input type="number" step="0.01" name="amount" class="form-control bg-dark-main border-secondary text-white @error('amount') is-invalid @enderror" placeholder="0.00" value="{{ old('amount', $booking->amount) }}">
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Booking Status *</label>
            <select name="booking_status" class="form-select bg-dark-main border-secondary text-white @error('booking_status') is-invalid @enderror">
                <option value="Pending" @selected(old('booking_status', $booking->booking_status) == 'Pending')>Pending</option>
                <option value="Confirmed" @selected(old('booking_status', $booking->booking_status) == 'Confirmed')>Confirmed</option>
                <option value="Completed" @selected(old('booking_status', $booking->booking_status) == 'Completed')>Completed</option>
                <option value="Cancelled" @selected(old('booking_status', $booking->booking_status) == 'Cancelled')>Cancelled</option>
            </select>
            @error('booking_status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Payment Status *</label>
            <select name="payment_status" class="form-select bg-dark-main border-secondary text-white @error('payment_status') is-invalid @enderror">
                <option value="Pending" @selected(old('payment_status', $booking->payment_status) == 'Pending')>Pending</option>
                <option value="Paid" @selected(old('payment_status', $booking->payment_status) == 'Paid')>Paid</option>
                <option value="Failed" @selected(old('payment_status', $booking->payment_status) == 'Failed')>Failed</option>
            </select>
            @error('payment_status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Special Notes / Instructions</label>
            <textarea name="notes" class="form-control bg-dark-main border-secondary text-white @error('notes') is-invalid @enderror" rows="3" placeholder="Additional customer instructions...">{{ old('notes', $booking->notes) }}</textarea>
            @error('notes')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Update Record</button>
            <a href="{{ url('/admin/bookings') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
