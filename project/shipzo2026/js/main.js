document.addEventListener('DOMContentLoaded', function() {
    // Navbar sticky effect is handled by Bootstrap fixed-top, 
    // but we can add a shadow class on scroll
    const navbar = document.querySelector('.navbar');
    if(navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-sm');
            } else {
                navbar.classList.remove('shadow-sm');
            }
        });
    }

    // Demo Tracking Logic
    const trackingForm = document.getElementById('demoTrackingForm');
    if(trackingForm) {
        trackingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const trackingId = document.getElementById('trackingId').value;
            const resultDiv = document.getElementById('trackingResult');
            const errorDiv = document.getElementById('trackingError');
            
            if(trackingId.trim() === '') {
                errorDiv.classList.remove('d-none');
                resultDiv.classList.add('d-none');
                return;
            }

            errorDiv.classList.add('d-none');
            resultDiv.classList.remove('d-none');
            
            // Randomize steps for demo purpose
            const steps = document.querySelectorAll('.step');
            steps.forEach(step => {
                step.classList.remove('active', 'completed');
            });

            // Demo logic: simulate tracking progress based on input length or randomly
            let progress = (trackingId.length % 5) + 1; // 1 to 5
            
            for(let i=0; i < steps.length; i++) {
                if(i < progress) {
                    steps[i].classList.add('completed');
                } else if(i === progress) {
                    steps[i].classList.add('active');
                }
            }
        });
    }

    // Initialize Bootstrap tooltips if any
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
