@extends('admin.layout.main')
@section('main_container')
<div class="text-center py-5">
    <h4 class="fw-bold font-heading text-white">Logged Out</h4>
    <p class="text-muted">You have been logged out of the admin panel.</p>
    <a href="{{ url('/admin/login') }}" class="btn btn-warning fw-bold text-dark rounded-pill px-4">Login Again</a>
</div>
@endsection
