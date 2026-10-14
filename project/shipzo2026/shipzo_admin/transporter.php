
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h4 class="fw-bold mb-0">
        Transporter Management
    </h4>

    <!-- Add Transporter Button -->
    <a href="add_transporter" class="btn btn-glass-primary">
        <i class="bi bi-truck me-1"></i>
        Add Transporter
    </a>

</div>

<div class="glass-table-wrapper">

    <div class="table-responsive">

        <table class="table glass-table align-middle">

            <thead>
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Address</th>
                    <th>Vehicle Type</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                foreach($transporter_arr as $data)
                {
                ?>

                <tr>

                    <!-- ID -->
                    <td>
                        <?php echo $data->transporter_id; ?>
                    </td>

                    <!-- Name -->
                    <td>
                        <?php echo $data->name; ?>
                    </td>

                    <!-- Email -->
                    <td>
                        <?php echo $data->email; ?>
                    </td>

                    <!-- Phone -->
                    <td>
                        <?php echo $data->phone; ?>
                    </td>

                    <!-- Password -->
                    <td>
                        <?php echo $data->password; ?>
                    </td>

                    <!-- Address -->
                    <td>
                        <?php echo $data->address; ?>
                    </td>

                    <!-- Vehicle Type -->
                    <td>
                        <?php echo $data->vehicle_type; ?>
                    </td>

                    <!-- Status -->
                    <td>

                        <?php
                        if($data->status == 'Active' || $data->status == 'active')
                        {
                        ?>
                            <a href="status?status_transporter=<?php echo $data->transporter_id; ?>" class="btn btn-sm btn-success">
                                Active
                            </a>
                        <?php
                        }
                        else
                        {
                        ?>
                            <a href="status?status_transporter=<?php echo $data->transporter_id; ?>" class="btn btn-sm btn-danger">
                                Inactive
                            </a>
                        <?php
                        }
                        ?>

                    </td>

                    <!-- Created Date -->
                    <td>
                        <?php echo $data->created_at; ?>
                    </td>

                    <!-- Action Buttons -->
                    <td class="text-end pe-4">

                        <a href="edit_transporter?edit=<?php echo $data->transporter_id; ?>" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <a href="delete?del_transporter=<?php echo $data->transporter_id; ?>" class="btn btn-sm btn-danger">
                            Delete
                        </a>

                    </td>

                </tr>

                <?php
                }
                ?>

            </tbody>

        </table>

    </div>

</div>

<?php include 'includes/footer.php'; ?>

