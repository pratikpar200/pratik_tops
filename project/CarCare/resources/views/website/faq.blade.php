@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Help & Answers</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Frequently Asked Questions</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">FAQ</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Categorized FAQ Accordion -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                <h4 class="fw-bold font-heading mb-3 border-start border-4 border-warning ps-3">1. Detailing & Washing Questions</h4>
                <div class="accordion mb-5" id="faqGroup1">
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold font-heading" type="button" data-bs-toggle="collapse" data-bs-target="#g1q1">
                                How often should I get my vehicle professionally detailed?
                            </button>
                        </h2>
                        <div id="g1q1" class="accordion-collapse collapse show" data-bs-parent="#faqGroup1">
                            <div class="accordion-body text-muted text-sm">
                                For optimal paint and interior preservation, we recommend an exterior foam wash every 2-3 weeks, and a full interior steam & wax detail every 4-6 months.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold font-heading" type="button" data-bs-toggle="collapse" data-bs-target="#g1q2">
                                Are your interior cleaning chemicals safe for children and pets?
                            </button>
                        </h2>
                        <div id="g1q2" class="accordion-collapse collapse" data-bs-parent="#faqGroup1">
                            <div class="accordion-body text-muted text-sm">
                                Absolutely! We use 100% non-toxic, eco-friendly organic enzymes and pure high-temperature dry steam that kills 99.9% of bacteria without harsh chemical residue.
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="fw-bold font-heading mb-3 border-start border-4 border-primary ps-3">2. 9H Ceramic Coating & Paint Correction</h4>
                <div class="accordion mb-5" id="faqGroup2">
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold font-heading" type="button" data-bs-toggle="collapse" data-bs-target="#g2q1">
                                How long does a 9H Ceramic Coating last?
                            </button>
                        </h2>
                        <div id="g2q1" class="accordion-collapse collapse" data-bs-parent="#faqGroup2">
                            <div class="accordion-body text-muted text-sm">
                                Our Platinum 9H Nano Ceramic Coating comes with a written 5-Year Warranty. With proper maintenance washing, it protects against UV rays, acid rain, and light swirls.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold font-heading" type="button" data-bs-toggle="collapse" data-bs-target="#g2q2">
                                Will paint correction remove deep scratches?
                            </button>
                        </h2>
                        <div id="g2q2" class="accordion-collapse collapse" data-bs-parent="#faqGroup2">
                            <div class="accordion-body text-muted text-sm">
                                Paint correction removes 90%+ of swirl marks, oxidation, and clear coat scratches. If a scratch has penetrated past the clear coat down to the primer, touch-up paint may be required.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ask a Question Box -->
                <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4 bg-dark text-white text-center mt-5">
                    <h4 class="fw-bold font-heading text-warning mb-2"><i class="fa-solid fa-circle-question me-2"></i>Have A Custom Question?</h4>
                    <p class="text-light opacity-75 text-sm mb-4">Can't find the answer you're looking for? Reach out to our detailing support team.</p>
                    <a href="{{ url('/contact') }}" class="btn btn-warning fw-bold text-dark rounded-pill px-5 py-3 d-inline-block hover-grow">Contact Support Desk</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
