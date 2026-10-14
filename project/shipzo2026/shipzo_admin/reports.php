<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Monthly Reports & Analytics</h4>
    <button class="btn btn-glass-outline"><i class="bi bi-printer me-2"></i>Print All</button>
</div>

<!-- Monthly Report Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="glass-card p-4 text-center h-100">
            <i class="bi bi-file-earmark-excel display-4 text-success mb-3 d-block opacity-75"></i>
            <h5 class="fw-bold">Financial Audits</h5>
            <p class="text-white-50 small mb-4">Summarised earnings, balances and transport payouts formatted in spreadsheet structures.</p>
            <button class="btn btn-glass-outline w-100">Download Excel</button>
        </div>
    </div>
    <div class="col-md-4">
        <div class="glass-card p-4 text-center h-100">
            <i class="bi bi-file-earmark-pdf display-4 text-danger mb-3 d-block opacity-75"></i>
            <h5 class="fw-bold">Performance Summary</h5>
            <p class="text-white-50 small mb-4">Generate PDF containing analytics detailing average delivery speeds and completion rates.</p>
            <button class="btn btn-glass-outline w-100">Download PDF</button>
        </div>
    </div>
   
</div>

<div class="glass-table-wrapper">
    <div class="p-3 border-bottom border-light border-opacity-10 bg-white bg-opacity-10 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Recent Compiled Artifacts</h6>
    </div>
    <div class="table-responsive">
        <table class="table glass-table align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Report Name</th>
                    <th>Generation Engine</th>
                    <th>Scope Interval</th>
                    <th class="text-end pe-4">Action</th>
                </tr>
            </thead>
           
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
