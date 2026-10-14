<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

 <style>
        .auth-container { display: flex; align-items: center; justify-content: center; padding: 3rem 1rem; min-height: 100vh; }
        .glass-auth-card { max-width: 600px; width: 100%; padding: 2.5rem; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
        .form-control.glass-input, .form-select.glass-input { padding: 0.8rem 1.2rem; }
        .img-upload-wrapper { width: 100px; height: 100px; border-radius: 50%; background: rgba(255,255,255,0.1); border: 2px dashed rgba(255,255,255,0.5); display: flex; align-items: center; justify-content: center; cursor: pointer; margin: 0 auto; color: white; transition: all 0.3s; }
        .img-upload-wrapper:hover { border-color: #00cec9; color: #00cec9; background: rgba(255,255,255,0.2); }
    </style>

<div class="auth-container">

    <div class="glass-auth-card text-white">

        <h3 class="text-center fw-bold mb-4">
            <i class="bi bi-person-plus-fill me-2"></i>
            Add Staff Member
        </h3>

        <!-- Profile Upload -->
        

       <form method="post">

    <div class="row">

        <div class="col-md-6 mb-3">
            <label class="form-label text-white-50">Full Name</label>
            <input type="text" name="name" class="form-control glass-input">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-white-50">Email Address</label>
            <input type="email" name="email" class="form-control glass-input">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-white-50">Phone Number</label>
            <input type="text" name="phone" class="form-control glass-input">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label text-white-50">Password</label>
            <input type="password" name="password" class="form-control glass-input">
        </div>

        <div class="col-md-12 mb-4">
            <label class="form-label text-white-50">Address</label>
            <textarea name="address" class="form-control glass-input"></textarea>
        </div>

    </div>

    <button type="submit" name="add_employee" class="btn btn-success py-2">
        Add Employee
    </button>

</form>

    </div>

</div>

<?php include 'includes/footer.php'; ?>
