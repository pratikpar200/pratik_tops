<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">System Users</h4>

   <!-- Add Employee Button -->


    <div class="d-flex gap-2">

        <!-- Add Employee Button -->
        <a href="add_employee.php" class="btn btn-success">
            <i class="bi bi-person-plus-fill me-1"></i> Add Employee
        </a>

       <a href="add_transporter.php" class="btn btn-success">
            <i class="bi bi-person-plus-fill me-1"></i> Add Transporter
        </a>

    </div>

</div>

<div class="glass-table-wrapper">
    <div class="table-responsive">
        <table class="table glass-table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td class="ps-4">1</td>
                    <td>Rahul Sharma</td>
                    <td>rahul@gmail.com</td>
                    <td>rahul123</td>
                    <td>9876543210</td>
                    <td><span class="badge bg-primary">Seller</span></td>
                    <td>2026-04-26</td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-sm btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="ps-4">2</td>
                    <td>Amit Verma</td>
                    <td>amit@gmail.com</td>
                    <td>amit123</td>
                    <td>9988776655</td>
                    <td><span class="badge bg-success">Transporter</span></td>
                    <td>2026-04-25</td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-sm btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="ps-4">3</td>
                    <td>Priya Patel</td>
                    <td>priya@gmail.com</td>
                    <td>priya123</td>
                    <td>9090909090</td>
                    <td><span class="badge bg-warning text-dark">Employee</span></td>
                    <td>2026-04-24</td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-sm btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="ps-4">4</td>
                    <td>Admin User</td>
                    <td>admin@shipzo.com</td>
                    <td>admin123</td>
                    <td>9000011111</td>
                    <td><span class="badge bg-primary">Seller</span></td>
                    <td>2026-04-23</td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-sm btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="ps-4">5</td>
                    <td>Sneha Kapoor</td>
                    <td>sneha@gmail.com</td>
                    <td>sneha123</td>
                    <td>9811223344</td>
                    <td><span class="badge bg-primary">Seller</span></td>
                    <td>2026-04-22</td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-sm btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>