@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Our Legacy & Mission</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">About Car Care</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Company Story -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1617814076367-b759c7d7e738?w=800&auto=format&fit=crop&q=80" class="img-fluid rounded-4 shadow-lg" alt="About Car Care">
                    <div class="position-absolute bottom-0 end-0 bg-warning text-dark p-4 rounded-4 shadow-lg d-none d-md-block" style="margin-right: -20px; margin-bottom: -20px;">
                        <h2 class="fw-extrabold font-heading mb-0">12+</h2>
                        <small class="fw-bold text-uppercase">Years of Excellence</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="section-subtitle mb-2">Our Company Story</span>
                <h2 class="fw-bold font-heading display-6 mb-3">Pioneering Automotive Detailing <span class="text-warning">Since 2014</span></h2>
                <p class="text-muted mb-4">CAR CARE started with a single mission: to bring showroom-grade perfection to everyday vehicle owners. Over the past decade, we have grown into the region's most trusted automotive spa, serving over 50,000 satisfied car owners with state-of-the-art ceramic coatings, steam restoration, and paint correction.</p>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-3 border-start border-4 border-warning">
                            <h4 class="fw-bold font-heading mb-1 text-dark">50,000+</h4>
                            <small class="text-muted">Vehicles Transformed</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-3 border-start border-4 border-primary">
                            <h4 class="fw-bold font-heading mb-1 text-dark">99.8%</h4>
                            <small class="text-muted">Client Satisfaction</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 h-100 bg-white border-top border-4 border-warning">
                    <div class="p-3 bg-warning-subtle text-warning rounded-circle d-inline-flex mb-3" style="width: 60px; height: 60px; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-bullseye fa-2x"></i>
                    </div>
                    <h4 class="fw-bold font-heading mb-3">Our Mission</h4>
                    <p class="text-muted mb-0">To deliver uncompromising automotive care through innovative eco-friendly techniques, certified master craftsmanship, and transparent pricing that gives every vehicle owner pride in their ride.</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 h-100 bg-white border-top border-4 border-primary">
                    <div class="p-3 bg-primary-subtle text-primary rounded-circle d-inline-flex mb-3" style="width: 60px; height: 60px; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-eye fa-2x"></i>
                    </div>
                    <h4 class="fw-bold font-heading mb-3">Our Vision</h4>
                    <p class="text-muted mb-0">To lead the nation in sustainable luxury auto detailing, setting new benchmarks for vehicle protection, ceramic coating longevity, and customer experience nationwide.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Growth Timeline -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle mb-2">Our Journey</span>
            <h2 class="fw-bold font-heading display-6">Growth & <span class="text-warning">Milestones</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                <div class="p-4 bg-light rounded-4 text-center h-100">
                    <span class="badge bg-warning text-dark font-heading fw-bold mb-2">2014</span>
                    <h5 class="fw-bold font-heading mb-2">First Bay Opened</h5>
                    <p class="text-muted text-sm mb-0">Launched our flagship hand wash station with 3 detailers.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 text-center h-100">
                    <span class="badge bg-warning text-dark font-heading fw-bold mb-2">2017</span>
                    <h5 class="fw-bold font-heading mb-2">Ceramic Lab Launch</h5>
                    <p class="text-muted text-sm mb-0">Introduced 9H Nano Ceramic Coating technology.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-light rounded-4 text-center h-100">
                    <span class="badge bg-warning text-dark font-heading fw-bold mb-2">2021</span>
                    <h5 class="fw-bold font-heading mb-2">Eco-Steam Upgrade</h5>
                    <p class="text-muted text-sm mb-0">Shifted to 100% biodegradable steam sanitization.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="p-4 bg-light rounded-4 text-center h-100">
                    <span class="badge bg-warning text-dark font-heading fw-bold mb-2">2026</span>
                    <h5 class="fw-bold font-heading mb-2">50K Cars Milestone</h5>
                    <p class="text-muted text-sm mb-0">Expanded to 5 state-of-the-art regional detailing centers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle mb-2">Master Detailers</span>
            <h2 class="fw-bold font-heading display-6">Meet Our <span class="text-warning">Leadership</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                <div class="card border-0 shadow-sm team-card text-center p-3 rounded-4 bg-white">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&auto=format&fit=crop&q=80" class="card-img-top rounded-4 mb-3" style="height: 220px; object-fit: cover;">
                    <h5 class="fw-bold font-heading mb-1">David Miller</h5>
                    <small class="text-warning font-heading fw-bold mb-2 d-block">Founder & Master Detailer</small>
                    <p class="text-muted text-xs">IDA Certified Paint Correction Specialist.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm team-card text-center p-3 rounded-4 bg-white">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&auto=format&fit=crop&q=80" class="card-img-top rounded-4 mb-3" style="height: 220px; object-fit: cover;">
                    <h5 class="fw-bold font-heading mb-1">Sarah Jenkins</h5>
                    <small class="text-warning font-heading fw-bold mb-2 d-block">Head of Operations</small>
                    <p class="text-muted text-xs">Ensuring seamless white-glove customer care.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm team-card text-center p-3 rounded-4 bg-white">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&auto=format&fit=crop&q=80" class="card-img-top rounded-4 mb-3" style="height: 220px; object-fit: cover;">
                    <h5 class="fw-bold font-heading mb-1">Marcus Vance</h5>
                    <small class="text-warning font-heading fw-bold mb-2 d-block">Ceramic Coating Expert</small>
                    <p class="text-muted text-xs">Over 1,000+ supercar coatings applied.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm team-card text-center p-3 rounded-4 bg-white">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&auto=format&fit=crop&q=80" class="card-img-top rounded-4 mb-3" style="height: 220px; object-fit: cover;">
                    <h5 class="fw-bold font-heading mb-1">Elena Rostova</h5>
                    <small class="text-warning font-heading fw-bold mb-2 d-block">Interior Specialist</small>
                    <p class="text-muted text-xs">Master of leather restoration & steam care.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
