
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<style>
    /* Prevent the massive table from stretching the parent flex containers */
    .main-content {
        max-width: calc(100vw - 300px); /* Keep it within viewport minus sidebar */
    }
    .glass-table-wrapper {
        width: 100%;
        max-width: 100%;
    }
    .table-responsive {
        overflow-x: auto;
        width: 100%;
    }
    @media (max-width: 991px) {
        .main-content { max-width: 100vw; padding: 1rem !important; }
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Orders Management</h4>
</div>

<div class="glass-table-wrapper">
    <div class="table-responsive">
        <table class="table glass-table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Seller ID</th>
                    <th>Transporter ID</th>
                    <th>Customer Type</th>
                    <th>Company Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Pickup Address</th>
                    <th>Delivery Address</th>
                    <th>Pickup Date</th>
                    <th>Expected Delivery</th>
                    <th>Parcel Type</th>
                    <th>Quantity</th>
                    <th>Delivery Speed</th>
                    <th>Special Instructions</th>
                    <th>Created At</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                if(!empty($orders_arr))
                {
                    foreach($orders_arr as $fetch)
                {
                ?>
                <tr>
                    <td class="ps-4"><?php echo $fetch->id ?? $fetch->order_id ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->seller_id ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->transporter_id ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->customer_type ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->customer_name ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->contact_number ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->email ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->pickup_address ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->delivery_address ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->pickup_date ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->expected_delivery ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->parcel_type ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->quantity ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->delivery_speed ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->special_instructions ?? 'N/A'; ?></td>
                    <td><?php echo $fetch->created_at ?? 'N/A'; ?></td>
                    <td class="text-end pe-4">
                        <a href="delete_order?id=<?php echo $fetch->id ?? $fetch->order_id; ?>" class="btn btn-sm btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php
                    }
                }
                else
                {
                    echo '<tr><td colspan="17" class="text-center">No Orders Found</td></tr>';
                }
                ?>

            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
