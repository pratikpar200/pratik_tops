<?php include_once("Header.php"); ?>

<div class="page-header">
    <div class="container">
        <h1>Track Shipment</h1>
        <p class="lead">Real-time visibility for your cargo.</p>
    </div>
</div>

<section class="section-padding bg-light" style="min-height: 60vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4 p-5 text-center mb-5">
                    <h3 class="fw-bold mb-4">Enter Tracking ID</h3>
                    <form id="demoTrackingForm" class="mx-auto" style="max-width: 500px;">
                        <div class="input-group input-group-lg shadow-sm rounded-3 overflow-hidden mb-3">
                            <span class="input-group-text bg-white border-0"><i class="fa-solid fa-barcode text-muted"></i></span>
                            <input type="text" id="trackingId" class="form-control border-0 bg-white" placeholder="e.g. SHPZ-12345" required>
                            <button class="btn btn-primary px-4 fw-bold" type="submit">Track</button>
                        </div>
                        <p class="small text-muted">Demo: Type any ID. Length of string changes tracking status.</p>
                    </form>
                    
                    <div id="trackingError" class="alert alert-danger mt-4 d-none">
                        Please enter a valid Tracking ID.
                    </div>
                </div>

                <!-- Tracking Results UI -->
                <div id="trackingResult" class="card border-0 shadow-sm rounded-4 p-5 d-none">
                    <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-3">
                        <div>
                            <h5 class="fw-bold mb-0">Status Overview</h5>
                            <p class="text-muted small mb-0">Tracking ID: <span class="fw-bold text-dark">SHPZ-XXXXXX</span></p>
                        </div>
                        <span class="badge bg-success px-3 py-2">In Transit</span>
                    </div>
                    
                    <div class="tracking-steps">
                        <div class="step">
                            <div class="step-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                            <h6 class="fw-bold mb-0">Booked</h6>
                            <p class="small text-muted">Order Confirmed</p>
                        </div>
                        <div class="step">
                            <div class="step-icon"><i class="fa-solid fa-box-open"></i></div>
                            <h6 class="fw-bold mb-0">Picked Up</h6>
                            <p class="small text-muted">From Sender</p>
                        </div>
                        <div class="step">
                            <div class="step-icon"><i class="fa-solid fa-warehouse"></i></div>
                            <h6 class="fw-bold mb-0">In Warehouse</h6>
                            <p class="small text-muted">Processing Hub</p>
                        </div>
                        <div class="step">
                            <div class="step-icon"><i class="fa-solid fa-truck-fast"></i></div>
                            <h6 class="fw-bold mb-0">In Transit</h6>
                            <p class="small text-muted">On the way</p>
                        </div>
                        <div class="step">
                            <div class="step-icon"><i class="fa-solid fa-motorcycle"></i></div>
                            <h6 class="fw-bold mb-0">Out for Delivery</h6>
                            <p class="small text-muted">OTP Required</p>
                        </div>
                        <div class="step">
                            <div class="step-icon"><i class="fa-solid fa-house-circle-check"></i></div>
                            <h6 class="fw-bold mb-0">Delivered</h6>
                            <p class="small text-muted">Successfully</p>
                        </div>
                    </div>
                    
                    <div class="alert alert-info mt-5 border-0 d-flex align-items-center">
                        <i class="fa-solid fa-shield-halved fs-3 me-3"></i>
                        <div>
                            <strong>OTP Security Active:</strong> Receiver must provide OTP to the delivery driver to accept this parcel.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once("Footer.php"); ?>
