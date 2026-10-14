@extends('website.layout.main')

@section('main_container')
<!-- Page Header Banner -->
<section class="bg-dark text-white py-5 position-relative">
    <div class="container py-4 text-center position-relative z-2" data-aos="fade-down">
        <span class="badge bg-warning text-dark font-heading fw-bold px-3 py-2 mb-2 text-uppercase">Payment Receipt</span>
        <h1 class="display-4 fw-bold font-heading text-white mb-2">Service Invoice</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-sm mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white opacity-75" aria-current="page">Invoice</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Invoice Card Container -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-9" data-aos="fade-up">
                <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4 bg-white" id="printableArea">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center border-bottom pb-4 mb-4">
                        <div>
                            <h2 class="fw-bold font-heading text-dark mb-0"><i class="fa-solid fa-car-burst text-warning me-2"></i>CAR<span class="text-warning">CARE</span></h2>
                            <p class="text-muted text-xs mb-0">123 Auto Street, Detailing Quarter, AutoCity NY 10001</p>
                            <small class="text-muted text-xs">Hotline: +1 (800) 555-CARCARE</small>
                        </div>
                        <div class="text-sm-end mt-3 mt-sm-0">
                            <h4 class="fw-bold font-heading text-uppercase text-muted mb-0">OFFICIAL INVOICE</h4>
                            <span class="fw-bold text-dark fs-5">#INV-2026-9082</span>
                            <div class="mt-1"><span class="badge bg-success font-heading px-3 py-1">PAID IN FULL</span></div>
                        </div>
                    </div>

                    <div class="row mb-4 text-sm">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <small class="text-muted text-uppercase fw-bold d-block mb-1">Customer Information:</small>
                            <h6 class="fw-bold font-heading mb-1">Alex Morgan</h6>
                            <p class="text-muted mb-1">alex.morgan@example.com</p>
                            <p class="text-muted mb-0">Vehicle: <strong>BMW M4 Competition</strong> (ABC-1234)</p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <small class="text-muted text-uppercase fw-bold d-block mb-1">Invoice Details:</small>
                            <p class="mb-1">Issue Date: <strong>Oct 28, 2026</strong></p>
                            <p class="mb-1">Payment Method: <strong>Credit Card (ending 4092)</strong></p>
                            <p class="mb-0">Service Technician: <strong>Marcus Vance</strong></p>
                        </div>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table table-bordered align-middle text-sm mb-0">
                            <thead class="table-dark font-heading text-uppercase text-xs">
                                <tr>
                                    <th>Item Description</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Unit Price</th>
                                    <th class="text-end">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong class="d-block text-dark">Ultra Gloss 9H Nano Ceramic Coating</strong>
                                        <small class="text-muted">Multi-stage paint correction, decontamination clay bar treatment & 5-year ceramic shield layer.</small>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$499.00</td>
                                    <td class="text-end fw-bold">$499.00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="d-block text-dark">Leather Hide Conditioning Add-On</strong>
                                        <small class="text-muted">Organic hide nourishment & UV protection cream application.</small>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$50.00</td>
                                    <td class="text-end fw-bold">$50.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Subtotal:</th>
                                    <th class="text-end">$549.00</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-end">Tax (8%):</th>
                                    <th class="text-end">$43.92</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-end text-dark font-heading fs-5">Grand Total:</th>
                                    <th class="text-end text-warning font-heading fs-4">$592.92</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <small class="text-muted text-xs">Thank you for choosing CAR CARE! Drive safe & stay shiny.</small>
                        <button class="btn btn-warning fw-bold text-dark px-4 py-2 rounded-pill hover-grow" onclick="window.print()"><i class="fa-solid fa-print me-2"></i>Print Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
