<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user_id'])) {
    echo "<script>window.location='login';</script>";
    exit;
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php include('Header.php'); ?>

<style>
    body{
        background:#f4f7fc;
    }
    .profile-section{
        padding:80px 0;
    }
    .profile-card{
        background:#fff;
        border-radius:20px;
        padding:40px;
        box-shadow:0 10px 30px rgba(0,0,0,0.08);
        border:1px solid #eaeaea;
    }
    .profile-header{
        text-align:center;
        margin-bottom:40px;
    }
    .profile-avatar{
        width:110px;
        height:110px;
        border-radius:50%;
        background:#0d47a1;
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:40px;
        margin:auto;
        margin-bottom:15px;
        font-weight:bold;
        overflow: hidden;
    }
    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .profile-header h2{
        font-weight:700;
        color:#0d1b4c;
    }
    .profile-header p{
        color:#777;
    }
    .form-label{
        font-weight:600;
        color:#0d1b4c;
    }
    .form-control{
        height:55px;
        border-radius:12px;
        border:1px solid #dcdcdc;
    }
    .form-control:focus{
        box-shadow:none;
        border-color:#ff6600;
    }
    .btn-save{
        background:#0d47a1;
        color:#fff;
        padding:14px 35px;
        border-radius:12px;
        font-weight:600;
        border:none;
        transition:0.3s;
    }
    .btn-save:hover{
        background:#ff6600;
        color:#fff;
    }
    .profile-box{
        background:#f9fbff;
        border-radius:15px;
        padding:25px;
        border:1px solid #e5e5e5;
    }
</style>

<section class="profile-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <?php if(!empty($user->photo)): ?>
                                <img src="images/<?php echo $user->photo; ?>" alt="Profile Photo">
                            <?php else: ?>
                                <?php echo strtoupper(substr($user->full_name, 0, 1)); ?>
                            <?php endif; ?>
                        </div>
                        <h2>My Profile</h2>
                        <p>Manage your Shipzo account details</p>
                    </div>

                    <form action="edit_profile" method="post" enctype="multipart/form-data" onsubmit="return profile_validation(this)">
                        <div id="msg" class="text-danger mb-3 text-center" style="font-weight: bold;"></div>
                        <div class="row g-4">
                            
                           <!-- <div class="col-12 text-center mb-2">
                                <label class="btn btn-outline-primary btn-sm rounded-pill px-4">
                                    <i class="fa-solid fa-camera me-1"></i> Change Photo
                                    <input type="file" name="photo" class="d-none" accept="image/*">
                                </label>
                            </div>   -->

                            <div class="col-md-6">
                                <div class="profile-box">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="full_name" class="form-control" value="<?php echo htmlspecialchars($user->full_name); ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="profile-box">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($user->phone); ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="profile-box">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user->email); ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="profile-box">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep unchanged">
                                </div>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button type="submit" name="update_profile" class="btn-save">
                                    Update Profile
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/validation.js"></script>
<?php include('Footer.php'); ?>
