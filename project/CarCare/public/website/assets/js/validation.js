/* Form Validation Helper Functions */
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

function validatePhone(phone) {
    const re = /^[+\d\s\(\)-]{7,20}$/;
    return re.test(phone);
}

function showInputError(inputEl, message) {
    inputEl.classList.add('is-invalid');
    let feedback = inputEl.nextElementSibling;
    if (!feedback || !feedback.classList.contains('invalid-feedback')) {
        feedback = document.createElement('div');
        feedback.className = 'invalid-feedback';
        inputEl.parentNode.appendChild(feedback);
    }
    feedback.innerText = message;
}

function clearInputError(inputEl) {
    inputEl.classList.remove('is-invalid');
    inputEl.classList.add('is-valid');
    let feedback = inputEl.nextElementSibling;
    if (feedback && feedback.classList.contains('invalid-feedback')) {
        feedback.innerText = '';
    }
}
