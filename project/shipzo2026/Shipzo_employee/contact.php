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
                            <th>Status</th>
                            <th class="text-end pe-4">Created At</th>
                        </tr>
                    </thead>

                    <tbody>
					

<?php
if(!empty($contact_arr))
{
    foreach($contact_arr as $data)
    {
?>
<tr>
    <td class="ps-4"><?php echo $data->contact_id; ?></td>
    <td><?php echo $data->name; ?></td>
    <td><?php echo $data->email; ?></td>
    <td><?php echo $data->subject; ?></td>
    <td><?php echo $data->message; ?></td>
    <td><?php echo isset($data->status) ? $data->status : 'Pending'; ?></td>
    <td class="text-end pe-4"><?php echo $data->created_at; ?></td>
</tr>

<?php
    }
}
?>

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

            <form action="contact" method="POST">
                <div class="mb-3">
                    <label class="form-label text-white-50 small">Select ID</label>
                    <select name="contact_id" class="form-select glass-input" required>
                        <option value="">Select ID</option>
                        <?php
                        if(!empty($contact_arr))
                        {
                            foreach($contact_arr as $row)
                            {
                        ?>
                                <option value="<?php echo $row->contact_id; ?>"><?php echo $row->contact_id; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white-50 small">Response</label>
                    <textarea name="response" class="form-control glass-input" rows="5" placeholder="Type resolution or update here..." required></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label text-white-50 small">Final Status</label>
                    <select name="status" class="form-select glass-input" required>
                        <option value="Resolved">Mark as Resolved</option>
                        <option value="Pending Transport Response">Pending Transport Response</option>
                        <option value="Awaiting Customer">Awaiting Customer</option>
                    </select>
                </div>

                <button type="submit" name="submit_response" class="btn btn-glass-primary w-100 py-2">
                    <i class="bi bi-send-fill me-2"></i>Submit
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>