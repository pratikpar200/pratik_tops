@extends('website.layout.main')
@section('main_container')

<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">9H Ceramic Shield</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Service Details</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Service Details</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-lg-8">
                <img src="https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?w=1000&auto=format&fit=crop&q=80" class="img-fluid rounded-4 mb-4 shadow">
                <h3 class="fw-bold font-heading mb-3">Ultra Gloss Ceramic Protection 9H</h3>
                <p class="text-muted">Nano ceramic coating chemically bonds with factory paint for hydrophobic gloss protection.</p>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4 bg-light rounded-4">
                    <h5 class="fw-bold font-heading mb-3">Book This Service</h5>
                    <a href="{{ url('/booking') }}" class="btn btn-warning fw-bold w-100 rounded-pill">Reserve Slot Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
