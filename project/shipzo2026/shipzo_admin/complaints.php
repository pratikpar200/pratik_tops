<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">contact_us</h4>
</div>

<div class="row g-4">
    <div class="col-xl-8">
        <div class="glass-card p-0 overflow-hidden h-100">
            <div class="p-3 border-bottom border-light border-opacity-10 bg-white bg-opacity-10 d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold"><i class="bi bi-list-task me-2"></i>Active Tickets</h6>
            </div>

            <div class="table-responsive">
                <table class="table glass-table align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Name</th>
                            <th>Email</th>
							<th>Subject</th>
                            <th>Message</th>
                            <th class="text-end pe-4">Created At</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="ps-4">1</td>
                            <td>Rahul Sharma</td>
                            <td>rahul@gmail.com</td>
							<td>booking</td>
                            <td>Need urgent truck booking for Delhi route.</td>
                            <td class="text-end pe-4">2026-04-26</td>
                        </tr>

                        <tr>
                            <td class="ps-4">2</td>
                            <td>Aman Verma</td>
                            <td>aman@shipmail.com</td>
							<td>fast</td>
                            <td>Tracking ID not updating status.</td>
                            <td class="text-end pe-4">2026-04-25</td>
                        </tr>

                        <tr>
                            <td class="ps-4">3</td>
                            <td>Priya Mehta</td>
                            <td>priya@gmail.com</td>
							<td>warehouse</td>
                            <td>Need warehouse storage for 7 days.</td>
                            <td class="text-end pe-4">2026-04-24</td>
                        </tr>

                        <tr>
                            <td class="ps-4">4</td>
                            <td>Vikas Singh</td>
                            <td>vikas@yahoo.com</td>
							<td>subscription</td>
                            <td>Want monthly premium subscription details.</td>
                            <td class="text-end pe-4">2026-04-23</td>
                        </tr>

                        <tr>
                            <td class="ps-4">5</td>
                            <td>Sneha Patel</td>
                            <td>sneha@gmail.com</td>
							<td>OTP</td>
                            <td>Parcel delivered but OTP not received.</td>
                            <td class="text-end pe-4">2026-04-22</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="glass-card p-4 h-100">
            <h6 class="fw-bold mb-4">
                <i class="bi bi-patch-check-fill text-success me-2"></i>
                contact_us Form
            </h6>

            <form>
                <div class="mb-3">
                    <label class="form-label text-white-50 small">Select ID</label>
                    <select class="form-select glass-input">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white-50 small">Response</label>
                    <textarea class="form-control glass-input" rows="5" placeholder="Type resolution or update here..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label text-white-50 small">Final Status</label>
                    <select class="form-select glass-input">
                        <option>Mark as Resolved</option>
                        <option>Pending Transport Response</option>
                        <option>Awaiting Customer</option>
                    </select>
                </div>

                <button type="button" class="btn btn-glass-primary w-100 py-2">
                    <i class="bi bi-send-fill me-2"></i>Submit
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>