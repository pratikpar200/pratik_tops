@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Showroom Finish</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Our Work Gallery</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Gallery</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Filterable Image Gallery -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle mb-2">Portfolio</span>
            <h2 class="fw-bold font-heading display-6">Recent <span class="text-warning">Projects</span></h2>
            <div class="d-inline-flex flex-wrap gap-2 mt-3">
                <button class="filter-btn active" data-filter="all">All Work</button>
                <button class="filter-btn" data-filter="ceramic">Ceramic Coating</button>
                <button class="filter-btn" data-filter="wash">Foam Wash</button>
                <button class="filter-btn" data-filter="interior">Interior Steam</button>
                <button class="filter-btn" data-filter="paint">Paint Correction</button>
            </div>
        </div>

        <div class="row g-4">
    @forelse($galleryItems as $item)
        <div class="col-md-6 col-lg-4 gallery-item-col" data-aos="zoom-in">
            <div class="card border-0 shadow-sm overflow-hidden rounded-4 position-relative group">
                <img src="{{ asset($item->image) }}" class="img-fluid" style="height: 260px; object-fit: cover;">
                <div class="card-body p-3">
                    <h6 class="fw-bold font-heading mb-1 mt-1">{{ $item->title }}</h6>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="mb-0 text-muted">No gallery items found.</p>
        </div>
    @endforelse
</div>
</section>

<!-- Before & After Comparison Showcase -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle mb-2">Transformations</span>
            <h2 class="fw-bold font-heading display-6">Before & After <span class="text-warning">Showcase</span></h2>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-md-6" data-aos="fade-right">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="bg-dark text-white text-center py-2 font-heading fw-bold">BEFORE (Scratched Paint)</div>
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=600&auto=format&fit=crop&q=80" class="img-fluid" style="height: 280px; object-fit: cover; filter: grayscale(40%);">
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="card border-2 border-warning shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-warning text-dark text-center py-2 font-heading fw-bold">AFTER (9H Ceramic Mirror Finish)</div>
                    <img src="https://images.unsplash.com/photo-1617814076367-b759c7d7e738?w=600&auto=format&fit=crop&q=80" class="img-fluid" style="height: 280px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
