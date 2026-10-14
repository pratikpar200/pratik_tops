
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Shipzo Transport</title>
    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Local CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .auth-container { display: flex; align-items: center; justify-content: center; padding: 3rem 1rem; min-height: 100vh; }
        .glass-auth-card { max-width: 600px; width: 100%; padding: 2.5rem; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
        .form-control.glass-input, .form-select.glass-input { padding: 0.8rem 1.2rem; }
        .img-upload-wrapper { width: 100px; height: 100px; border-radius: 50%; background: rgba(255,255,255,0.1); border: 2px dashed rgba(255,255,255,0.5); display: flex; align-items: center; justify-content: center; cursor: pointer; margin: 0 auto; color: white; transition: all 0.3s; }
        .img-upload-wrapper:hover { border-color: #00cec9; color: #00cec9; background: rgba(255,255,255,0.2); }
    </style>
</head>
<body>
    <div class="glass-bg">
        <div class="blob blob-1"></div><div class="blob blob-2"></div><div class="blob blob-3"></div>
    </div>
    
    <div class="auth-container">
        <div class="glass-auth-card text-white text-center">
            <h3 class="fw-bold mb-1">Create Account</h3>
            <p class="text-white-50 small mb-4">Register for Shipzo Transport Admin</p>
            
            <form action="login.php" method="post" class="text-start">
                <div class="mb-4 text-center">
                    <label for="profileImg" class="img-upload-wrapper">
                        <i class="bi bi-camera fs-3"></i>
                    </label>
                    <input type="file" id="profileImg" class="d-none">
                    <p class="small text-white-50 mt-2">Upload Profile Image</p>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white-50">Full Name</label>
                        <input type="text" class="form-control glass-input" placeholder="e.g. Jane Doe">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white-50">Email</label>
                        <input type="email" class="form-control glass-input" placeholder="e.g. jane@domain.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white-50">Phone</label>
                        <input type="text" class="form-control glass-input" placeholder="+1 ...">
                    </div>
                   
                    <div class="col-md-6">
                        <label class="form-label text-white-50">Password</label>
                        <input type="password" class="form-control glass-input" placeholder="Create password">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white-50">Confirm Password</label>
                        <input type="password" class="form-control glass-input" placeholder="Confirm password">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-glass-primary w-100 py-2 mb-3 mt-2">Create Account</button>
                <div class="text-center">
                    <span class="text-white-50 small">Already registered?</span>
                    <a href="login.php" class="text-info text-decoration-none small fw-bold">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
