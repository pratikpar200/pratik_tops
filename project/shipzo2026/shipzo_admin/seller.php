<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Seller Management</h4>
</div>

<div class="glass-table-wrapper">
    <div class="table-responsive">
        <table class="table glass-table align-middle">
            <thead>
                <tr>
                    <th class="ps-4">Seller_ID</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    
                    <th>Status</th>
                    <th>Created At</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>
             <tbody>
							<?php
							foreach($Seller_arr as $data)
							{
							?>
               <tr>
    <td><?php echo $data->seller_id; ?></td>
    <td><?php echo $data->full_name; ?></td>
    <td><?php echo $data->phone; ?></td>
    <td><?php echo $data->email; ?></td>

    

   

    <td>
        <?php if($data->status == 'Active' || $data->status == 'active'){ ?>
            <a href="status?status_seller=<?php echo $data->seller_id; ?>" class="btn btn-sm btn-success">Active</a>
        <?php } else { ?>
            <a href="status?status_seller=<?php echo $data->seller_id; ?>" class="btn btn-sm btn-danger">Inactive</a>
        <?php } ?>
    </td>

    <td><?php echo $data->created_at; ?></td>
	
	
	<td>
                                        <a href="edit_seller?edit=<?php echo $data->seller_id; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="delete?del_seller=<?php echo $data->seller_id; ?>" class="btn btn-sm btn-danger">Delete</a>
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
