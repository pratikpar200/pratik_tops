@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Service Archives</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Booking History</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Booking History</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Past Services Table -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-up">
            <div class="table-responsive">
                <table class="table align-middle text-sm mb-0">
                    <thead class="table-dark font-heading text-uppercase text-xs">
                        <tr>
                            <th class="ps-4">Booking ID</th>
                            <th>Service Name</th>
                            <th>Vehicle</th>
                            <th>Completed Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Receipt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4 fw-bold font-heading text-warning">#BK-8801</td>
                            <td>Exterior Foam Wash & High-Gloss Polish</td>
                            <td>BMW M4</td>
                            <td>Sep 14, 2026</td>
                            <td class="fw-bold">$49.00</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td class="text-end pe-4"><a href="{{ url('/invoice') }}" class="btn btn-sm btn-outline-dark rounded-pill"><i class="fa-solid fa-file-invoice me-1"></i> Invoice</a></td>
                        </tr>
                        <tr>
                            <td class="ps-4 fw-bold font-heading text-warning">#BK-8420</td>
                            <td>Interior Steam Extraction & Leather Care</td>
                            <td>BMW M4</td>
                            <td>May 22, 2026</td>
                            <td class="fw-bold">$129.00</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td class="text-end pe-4"><a href="{{ url('/invoice') }}" class="btn btn-sm btn-outline-dark rounded-pill"><i class="fa-solid fa-file-invoice me-1"></i> Invoice</a></td>
                        </tr>
                        <tr>
                            <td class="ps-4 fw-bold font-heading text-warning">#BK-7990</td>
                            <td>Engine Bay Steam Cleaning & Degreasing</td>
                            <td>BMW M4</td>
                            <td>Jan 10, 2026</td>
                            <td class="fw-bold">$89.00</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td class="text-end pe-4"><a href="{{ url('/invoice') }}" class="btn btn-sm btn-outline-dark rounded-pill"><i class="fa-solid fa-file-invoice me-1"></i> Invoice</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
