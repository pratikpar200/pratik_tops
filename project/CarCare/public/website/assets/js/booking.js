/* Booking Form JS Validation & Interactive Handler */
document.addEventListener("DOMContentLoaded", function () {
    const bookingForm = document.getElementById('bookingForm');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function (e) {
            e.preventDefault();
            let isValid = true;

            const name = document.getElementById('customerName');
            const phone = document.getElementById('customerPhone');
            const email = document.getElementById('customerEmail');
            const company = document.getElementById('vehicleCompany');
            const model = document.getElementById('vehicleModel');
            const service = document.getElementById('bookingService');
            const date = document.getElementById('appointmentDate');

            if (!name.value.trim()) { showInputError(name, 'Please enter your full name'); isValid = false; } else { clearInputError(name); }
            if (!validatePhone(phone.value)) { showInputError(phone, 'Please enter a valid phone number'); isValid = false; } else { clearInputError(phone); }
            if (!validateEmail(email.value)) { showInputError(email, 'Please enter a valid email address'); isValid = false; } else { clearInputError(email); }
            if (!company.value) { showInputError(company, 'Please select your vehicle company'); isValid = false; } else { clearInputError(company); }
            if (!model.value.trim()) { showInputError(model, 'Please enter vehicle model'); isValid = false; } else { clearInputError(model); }
            if (!service.value) { showInputError(service, 'Please select a service'); isValid = false; } else { clearInputError(service); }
            if (!date.value) { showInputError(date, 'Please choose appointment date'); isValid = false; } else { clearInputError(date); }

            if (!isValid) {
                return;
            }

            const submitBtn = bookingForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn ? submitBtn.innerHTML : null;
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Submitting...';
            }

            fetch(bookingForm.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: new FormData(bookingForm)
            })
            .then(async (response) => {
                const data = await response.json();

                if (response.ok && data.success) {
                    const alertBox = document.getElementById('bookingAlert');
                    if (alertBox) {
                        alertBox.classList.remove('d-none');
                        alertBox.innerHTML = '<i class="fa-solid fa-circle-check me-2"></i> <strong>Booking Confirmed Successfully!</strong> We have sent confirmation details to your email.';
                        bookingForm.reset();
                        window.scrollTo({ top: alertBox.offsetTop - 100, behavior: 'smooth' });
                    }
                    setTimeout(() => {
                        window.location.href = data.redirect || '/booking-history';
                    }, 1500);
                } else if (data.errors) {
                    const fieldMap = {
                        customer_name: name,
                        phone: phone,
                        email: email,
                        vehicle_company: company,
                        vehicle_model: model,
                        service: service,
                        appointment_date: date
                    };
                    Object.keys(data.errors).forEach(function (key) {
                        if (fieldMap[key]) {
                            showInputError(fieldMap[key], data.errors[key][0]);
                        }
                    });
                } else if (data.redirect) {
                    window.location.href = data.redirect;
                }
            })
            .catch(() => {
                const alertBox = document.getElementById('bookingAlert');
                if (alertBox) {
                    alertBox.classList.remove('d-none', 'alert-success');
                    alertBox.classList.add('alert-danger');
                    alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-2"></i> Something went wrong. Please try again.';
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