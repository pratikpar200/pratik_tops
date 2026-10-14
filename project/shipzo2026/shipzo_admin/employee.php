<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h4 class="fw-bold mb-0">
        Employee Management
    </h4>

    <!-- Add Employee Button -->
    <a href="add_employee" class="btn btn-glass-primary">
        <i class="bi bi-person-plus-fill me-1"></i>
        Add Employee
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
                    <th>Status</th>
                    <th>Created At</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                foreach($employee_arr as $data)
                {
                ?>

                <tr>

                    <td><?php echo $data->employee_id; ?></td>

                    <td><?php echo $data->name; ?></td>

                    <td><?php echo $data->email; ?></td>

                    <td><?php echo $data->phone; ?></td>

                    <td><?php echo $data->password; ?></td>

                    <td><?php echo $data->address; ?></td>

                    <td>

                        <?php
                        if($data->status == 'Active' || $data->status == 'active')
                        {
                        ?>
                        <a href="status?status_employee=<?php echo $data->employee_id; ?>" class="btn btn-sm btn-success">
                            Active
                        </a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <a href="status?status_employee=<?php echo $data->employee_id; ?>" class="btn btn-sm btn-danger">
                            Inactive
                        </a>
                        <?php
                        }
                        ?>

                    </td>

                    <td><?php echo $data->created_at; ?></td>

                    <td class="text-end pe-4">

                         <a href="edit_employee?edit=<?php echo $data->employee_id; ?>" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <a href="delete?del_employee=<?php echo $data->employee_id; ?>" class="btn btn-sm btn-danger">
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