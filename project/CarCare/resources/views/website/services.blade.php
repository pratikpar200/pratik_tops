    @extends('website.layout.main')

    @section('main_container')
    <!-- Page Header Banner -->
    <section class="bg-dark text-white py-5 position-relative">
        <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
            <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Full Range Detailing</span>
            <h1 class="display-4 fw-bold font-heading text-white mb-2">Our Premium Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-sm mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- All Service Cards Grid -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-subtitle mb-2">Specialized Treatments</span>
                <h2 class="fw-bold font-heading display-6">Comprehensive Car <span class="text-warning">Care Solutions</span></h2>
                <p class="text-muted max-w-2xl mx-auto">From express hand washes to 5-year ceramic armor, explore our comprehensive range of auto spa services.</p>
            </div>
           <div class="row g-4">

    @foreach($services as $service)

    <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm service-card h-100 bg-white p-3 rounded-4">

            <img src="{{ asset($service->image) }}"
                 class="card-img-top rounded-3"
                 style="height:220px;object-fit:cover;">

            <div class="card-body">

                <h5>{{ $service->service_name }}</h5>

                <p>{{ $service->description }}</p>

                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 text-primary">${{ $service->price }}</h6>
                    <small class="text-muted">{{ $service->duration }}</small>
                </div>

            </div>

        </div>
    </div>

    @endforeach

</div>
    </section>

    <!-- Service FAQ Accordion -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-subtitle mb-2">Service Queries</span>
                <h2 class="fw-bold font-heading display-6">Frequently Asked <span class="text-warning">Questions</span></h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9" data-aos="fade-up">
                    <div class="accordion" id="servicesFaqAccordion">
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold font-heading" type="button" data-bs-toggle="collapse" data-bs-target="#srvFaq1">
                                    How often should I get my car detailed?
                                </button>
                            </h2>
                            <div id="srvFaq1" class="accordion-collapse collapse show" data-bs-parent="#servicesFaqAccordion">
                                <div class="accordion-body text-muted text-sm">
                                    We recommend an exterior hand wash every 2-3 weeks, and a comprehensive steam interior & wax treatment every 3 to 6 months to preserve paint and leather quality.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold font-heading" type="button" data-bs-toggle="collapse" data-bs-target="#srvFaq2">
                                    What is the difference between wax and ceramic coating?
                                </button>
                            </h2>
                            <div id="srvFaq2" class="accordion-collapse collapse" data-bs-parent="#servicesFaqAccordion">
                                <div class="accordion-body text-muted text-sm">
                                    Traditional wax sits on top of the paint and lasts 1-3 months. Ceramic coating forms a hard chemical bond with the factory clear coat, lasting 2 to 5 years with superior scratch and chemical protection.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

