@extends('website.layout.main')

@section('main_container')

<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Data Protection</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Privacy Policy</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Privacy Policy</li>
            </ol>
        </nav>
    </div>
</section>


<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h4 class="fw-bold font-heading mb-3">Data Privacy Statement</h4>
                <p class="text-muted text-sm">CAR CARE respects your privacy. We collect personal information solely for booking confirmation, service communication, and customer support.</p>
            </div>
        </div>
    </div>
</section>
@endsection
