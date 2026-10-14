/* Signup Form Validation & Live Password Strength Indicator */
document.addEventListener("DOMContentLoaded", function () {
    const signupForm = document.getElementById('signupForm');
    const passInput = document.getElementById('signupPassword');
    const confirmInput = document.getElementById('signupConfirmPassword');
    const strengthBar = document.getElementById('passwordStrengthBar');
    const strengthText = document.getElementById('passwordStrengthText');

    if (passInput && strengthBar) {
        passInput.addEventListener('input', function () {
            const val = passInput.value;
            let score = 0;
            if (val.length >= 6) score += 25;
            if (/[A-Z]/.test(val)) score += 25;
            if (/[0-9]/.test(val)) score += 25;
            if (/[^A-Za-z0-9]/.test(val)) score += 25;

            strengthBar.style.width = score + '%';
            if (score <= 25) {
                strengthBar.className = 'progress-bar bg-danger';
                strengthText.innerText = 'Weak Password';
            } else if (score <= 75) {
                strengthBar.className = 'progress-bar bg-warning';
                strengthText.innerText = 'Medium Password';
            } else {
                strengthBar.className = 'progress-bar bg-success';
                strengthText.innerText = 'Strong Password!';
            }
        });
    }

    if (signupForm) {
        signupForm.addEventListener('submit', function (e) {
            e.preventDefault();
            let isValid = true;
            const name = document.getElementById('signupName');
            const email = document.getElementById('signupEmail');
            const phone = document.getElementById('signupPhone');

            if (!name.value.trim()) { showInputError(name, 'Enter full name'); isValid = false; } else { clearInputError(name); }
            if (!validateEmail(email.value)) { showInputError(email, 'Enter valid email'); isValid = false; } else { clearInputError(email); }
            if (!validatePhone(phone.value)) { showInputError(phone, 'Enter valid phone'); isValid = false; } else { clearInputError(phone); }
            if (passInput.value.length < 6) { showInputError(passInput, 'Password must be at least 6 characters'); isValid = false; } else { clearInputError(passInput); }
            if (confirmInput.value !== passInput.value) { showInputError(confirmInput, 'Passwords do not match'); isValid = false; } else { clearInputError(confirmInput); }

            if (!isValid) {
                return;
            }

            const submitBtn = signupForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn ? submitBtn.innerHTML : null;
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Creating Account...';
            }

            fetch(signupForm.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json'
                },
                body: new FormData(signupForm)
            })
            .then(async (response) => {
                const data = await response.json();

                if (response.ok && data.success) {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Account Created!',
                            text: data.message || 'Account created successfully!',
                            confirmButtonColor: '#ffb703',
                            timer: 2000,
                            timerProgressBar: true
                        }).then(() => {
                            window.location.href = '/login';
                        });
                    } else {
                        const alert = document.getElementById('signupAlert');
                        if (alert) {
                            alert.classList.remove('d-none');
                            alert.innerHTML = '<i class="fa-solid fa-circle-check me-2"></i> Account created successfully! Redirecting to login...';
                        }
                        setTimeout(() => { window.location.href = '/login'; }, 1500);
                    }
                } else if (response.status === 422 && data.errors) {
                    if (data.errors.name) { showInputError(name, data.errors.name[0]); }
                    if (data.errors.email) { showInputError(email, data.errors.email[0]); }
                    if (data.errors.phone) { showInputError(phone, data.errors.phone[0]); }
                    if (data.errors.password) { showInputError(passInput, data.errors.password[0]); }

                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Please check your details',
                            text: 'Some fields need correction.',
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
});