/* Website Main JS */
document.addEventListener("DOMContentLoaded", function () {
    // Preloader
    const preloader = document.getElementById('preloader');
    if (preloader) {
        setTimeout(() => {
            preloader.classList.add('fade-out');
        }, 400);
    }

    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    }

    // Back to top button
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });
        backToTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Sticky Header
    const mainNavbar = document.getElementById('mainNavbar');
    if (mainNavbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                mainNavbar.classList.add('shadow-lg', 'bg-dark');
            }
        });
    }
});
