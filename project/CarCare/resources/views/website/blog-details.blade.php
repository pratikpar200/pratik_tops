@extends('website.layout.main')

@section('main_container')

<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Blog Details</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">5 Secrets to Maintain Ceramic Gloss</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">5 Secrets to Maintain Ceramic Gloss</li>
            </ol>
        </nav>
    </div>
</section>


<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <img src="https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?w=1000&auto=format&fit=crop&q=80" class="img-fluid rounded-4 mb-4 shadow" alt="Blog Image">
                <div class="d-flex align-items-center gap-3 text-sm text-muted mb-3">
                    <span><i class="fa-solid fa-user text-warning me-1"></i> Admin</span>
                    <span><i class="fa-solid fa-calendar text-warning me-1"></i> Oct 24, 2026</span>
                    <span><i class="fa-solid fa-tag text-warning me-1"></i> Maintenance</span>
                </div>
                <h2 class="fw-bold font-heading mb-3">5 Secrets to Maintain Your Ceramic Coating Gloss</h2>
                <p class="text-muted leading-relaxed">Ceramic coating gives your vehicle a mirror-like shine and hydrophobic protection. However, improper washing can scratch the topcoat. Always use a pH-neutral shampoo and the two-bucket wash method with microfiber towels.</p>
                <blockquote class="p-4 bg-light rounded-3 border-start border-4 border-warning my-4 font-heading fw-bold fs-5">
                    "Proper maintenance extends your 9H ceramic warranty from 3 years to over 5+ years of slickness."
                </blockquote>
            </div>
        </div>
    </div>
</section>
@endsection
