@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Auto Detailing Journal</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Car Care Blog</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Blog</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Blog Cards & Sidebar -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row g-5">
            <!-- Article Cards -->
            <div class="col-lg-8">
                <div class="row g-4">
                    <div class="col-md-6" data-aos="fade-up">
                        <div class="card border-0 shadow-sm blog-card h-100 rounded-4 bg-white overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?w=600&auto=format&fit=crop&q=80" class="card-img-top" style="height: 220px; object-fit: cover;">
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark font-heading mb-2">Tips & Maintenance</span>
                                <h5 class="fw-bold font-heading mb-2">5 Secrets to Maintain Your Ceramic Coating Gloss</h5>
                                <p class="text-muted text-sm mb-3">Learn the essential do's and don'ts of washing your coated vehicle at home to extend scratch protection...</p>
                                <div class="d-flex align-items-center justify-content-between text-xs text-muted pt-3 border-top">
                                    <span><i class="fa-solid fa-user me-1 text-warning"></i> Admin</span>
                                    <span><i class="fa-solid fa-calendar me-1 text-warning"></i> Oct 24, 2026</span>
                                </div>
                                <a href="{{ url('/blog-details') }}" class="btn btn-outline-dark fw-bold rounded-pill text-xs w-100 mt-3">Read Full Article <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card border-0 shadow-sm blog-card h-100 rounded-4 bg-white overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1507136566006-cfc505b114fc?w=600&auto=format&fit=crop&q=80" class="card-img-top" style="height: 220px; object-fit: cover;">
                            <div class="card-body p-4">
                                <span class="badge bg-primary text-white font-heading mb-2">Interior Care</span>
                                <h5 class="fw-bold font-heading mb-2">Why Leather Conditioning is Essential Every 6 Months</h5>
                                <p class="text-muted text-sm mb-3">Prevent leather drying, cracking, UV fading, and discoloration with proper hide nourishment routines...</p>
                                <div class="d-flex align-items-center justify-content-between text-xs text-muted pt-3 border-top">
                                    <span><i class="fa-solid fa-user me-1 text-warning"></i> Marcus V.</span>
                                    <span><i class="fa-solid fa-calendar me-1 text-warning"></i> Oct 18, 2026</span>
                                </div>
                                <a href="{{ url('/blog-details') }}" class="btn btn-outline-dark fw-bold rounded-pill text-xs w-100 mt-3">Read Full Article <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card border-0 shadow-sm blog-card h-100 rounded-4 bg-white overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1552930294-6b595f4c2974?w=600&auto=format&fit=crop&q=80" class="card-img-top" style="height: 220px; object-fit: cover;">
                            <div class="card-body p-4">
                                <span class="badge bg-success text-white font-heading mb-2">Eco Detailing</span>
                                <h5 class="fw-bold font-heading mb-2">How Waterless Steam Washing Saves 100+ Gallons</h5>
                                <p class="text-muted text-sm mb-3">Discover the science behind high-temperature dry steam sanitization and its environmental benefits...</p>
                                <div class="d-flex align-items-center justify-content-between text-xs text-muted pt-3 border-top">
                                    <span><i class="fa-solid fa-user me-1 text-warning"></i> Elena R.</span>
                                    <span><i class="fa-solid fa-calendar me-1 text-warning"></i> Sep 30, 2026</span>
                                </div>
                                <a href="{{ url('/blog-details') }}" class="btn btn-outline-dark fw-bold rounded-pill text-xs w-100 mt-3">Read Full Article <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4 rounded-4 bg-white mb-4">
                    <h5 class="fw-bold font-heading mb-3">Search Blog</h5>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search keywords...">
                        <button class="btn btn-warning fw-bold"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4 rounded-4 bg-white mb-4">
                    <h5 class="fw-bold font-heading mb-3">Categories</h5>
                    <ul class="list-unstyled mb-0 text-sm">
                        <li class="d-flex justify-content-between py-2 border-bottom"><a href="#" class="text-muted text-decoration-none">Ceramic Coating</a> <span>(12)</span></li>
                        <li class="d-flex justify-content-between py-2 border-bottom"><a href="#" class="text-muted text-decoration-none">Interior Restoration</a> <span>(8)</span></li>
                        <li class="d-flex justify-content-between py-2 border-bottom"><a href="#" class="text-muted text-decoration-none">Paint Correction</a> <span>(15)</span></li>
                        <li class="d-flex justify-content-between py-2"><a href="#" class="text-muted text-decoration-none">Maintenance Tips</a> <span>(20)</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
