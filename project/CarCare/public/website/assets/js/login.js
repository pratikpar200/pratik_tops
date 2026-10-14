/* Login Form Validation */
document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();
            let isValid = true;
            const email = document.getElementById('loginEmail');
            const pass = document.getElementById('loginPassword');

            if (!validateEmail(email.value)) { showInputError(email, 'Enter a valid email'); isValid = false; } else { clearInputError(email); }
            if (pass.value.length < 6) { showInputError(pass, 'Password must be at least 6 characters'); isValid = false; } else { clearInputError(pass); }

            if (!isValid) {
                return;
            }

            const submitBtn = loginForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn ? submitBtn.innerHTML : null;
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Signing In...';
            }

            const tokenInput = loginForm.querySelector('input[name="_token"]');

            fetch(loginForm.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': tokenInput ? tokenInput.value : ''
                },
                body: new FormData(loginForm)
            })
            .then(async (response) => {
                const data = await response.json();

                if (response.ok && data.success) {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful!',
                            text: data.message || 'Redirecting...',
                            confirmButtonColor: '#ffb703',
                            timer: 1500,
                            timerProgressBar: true
                        }).then(() => {
                            window.location.href = '/';
                        });
                    } else {
                        window.location.href = '/';
                    }
                } else if (data.message) {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: data.message,
                            confirmButtonColor: '#ffb703'
                        });
                    }
                } else {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Something went wrong',
                            text: 'Please try again in a moment.',
                            confirmButtonColor: '#ffb703'
                        });
                    }
                }
            })
            .catch(() => {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Connection Error',
                        text: 'Could not reach the server. Please check your connection and try again.',
                        confirmButtonColor: '#ffb703'
                    });
                }
            })
            .finally(() => {
                if (submitBtn && originalBtnText !== null) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            });
        });
    }

    // Toggle Password Visibility
    const toggleBtn = document.getElementById('toggleLoginPass');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            const passInput = document.getElementById('loginPassword');
            const icon = this.querySelector('i');
            if (passInput.type === 'password') {
                passInput.type = 'text';
                icon.className = 'fa-solid fa-eye-slash';
            } else {
                passInput.type = 'password';
                icon.className = 'fa-solid fa-eye';
            }
        });
    }
});