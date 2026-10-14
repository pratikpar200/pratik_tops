@extends('website.layout.main')

@section('main_container')

<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">What People Say</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Client Reviews</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Client Reviews</li>
            </ol>
        </nav>
    </div>
</section>


<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm p-4 rounded-4 bg-light">
                    <div class="text-warning mb-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                    <p class="text-muted text-sm">"The ceramic coating on my BMW M4 is pristine. Car Care team is extremely detail-oriented!"</p>
                    <h6 class="fw-bold font-heading mb-0 text-dark">Marcus Vance</h6>
                    <small class="text-muted">BMW M4 Owner</small>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm p-4 rounded-4 bg-light">
                    <div class="text-warning mb-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                    <p class="text-muted text-sm">"Fast, friendly, and exceptional steam cleaning. Left my interior smelling brand new."</p>
                    <h6 class="fw-bold font-heading mb-0 text-dark">Sophia Chen</h6>
                    <small class="text-muted">Audi Q7 Owner</small>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
