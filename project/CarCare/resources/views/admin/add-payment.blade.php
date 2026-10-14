@extends('admin.layout.layout')

@section('container')
<div class="mb-4">
    <h3 class="fw-bold font-heading text-white mb-1">Add New Payment</h3>
    <p class="text-muted text-sm mb-0">Record a new payment transaction below.</p>
</div>

<div class="admin-table-card p-4 p-md-5">
    <form action="{{ url('/admin/add-payment') }}" method="POST" class="row g-3">
        @csrf
        
        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Select Booking *</label>
            <select name="booking_id" class="form-select bg-dark-main border-secondary text-white @error('booking_id') is-invalid @enderror">
                <option value="">Select Booking</option>
                @foreach($bookings as $booking)
                    <option value="{{ $booking->id }}" @selected(old('booking_id') == $booking->id)>
                        Booking #{{ $booking->id }} - {{ optional($booking->customer)->name ?? 'Customer' }} ({{ $booking->vehicle_name }})
                    </option>
                @endforeach
            </select>
            @error('booking_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Select Customer *</label>
            <select name="customer_id" class="form-select bg-dark-main border-secondary text-white @error('customer_id') is-invalid @enderror">
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" @selected(old('customer_id') == $customer->id)>
                        {{ $customer->name }} ({{ $customer->email }})
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Amount ($) *</label>
            <input type="number" step="0.01" name="amount" class="form-control bg-dark-main border-secondary text-white @error('amount') is-invalid @enderror" placeholder="99.99" value="{{ old('amount') }}">
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Payment Method *</label>
            <select name="payment_method" class="form-select bg-dark-main border-secondary text-white @error('payment_method') is-invalid @enderror">
                <option value="Cash" @selected(old('payment_method') == 'Cash')>Cash</option>
                <option value="Credit Card" @selected(old('payment_method') == 'Credit Card')>Credit Card</option>
                <option value="Debit Card" @selected(old('payment_method') == 'Debit Card')>Debit Card</option>
                <option value="UPI / Online" @selected(old('payment_method') == 'UPI / Online')>UPI / Online</option>
                <option value="PayPal" @selected(old('payment_method') == 'PayPal')>PayPal</option>
            </select>
            @error('payment_method')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Transaction ID</label>
            <input type="text" name="transaction_id" class="form-control bg-dark-main border-secondary text-white @error('transaction_id') is-invalid @enderror" placeholder="e.g. TXN987654321" value="{{ old('transaction_id') }}">
            @error('transaction_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Payment Date *</label>
            <input type="datetime-local" name="payment_date" class="form-control bg-dark-main border-secondary text-white @error('payment_date') is-invalid @enderror" value="{{ old('payment_date', now()->format('Y-m-d\TH:i')) }}">
            @error('payment_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-xs fw-bold text-muted">Payment Status *</label>
            <select name="payment_status" class="form-select bg-dark-main border-secondary text-white @error('payment_status') is-invalid @enderror">
                <option value="Paid" @selected(old('payment_status') == 'Paid')>Paid</option>
                <option value="Pending" @selected(old('payment_status') == 'Pending')>Pending</option>
                <option value="Failed" @selected(old('payment_status') == 'Failed')>Failed</option>
                <option value="Refunded" @selected(old('payment_status') == 'Refunded')>Refunded</option>
            </select>
            @error('payment_status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-warning fw-bold text-dark rounded-pill px-4 py-2">Save Record</button>
            <a href="{{ url('/admin/payments') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
