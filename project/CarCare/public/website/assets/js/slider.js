/* Swiper Slider Initialization */
document.addEventListener("DOMContentLoaded", function () {
    // Hero Slider
    if (document.querySelector('.heroSwiper')) {
        new Swiper('.heroSwiper', {
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: { crossFade: true },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }

    // Testimonial Slider
    if (document.querySelector('.testimonialSwiper')) {
        new Swiper('.testimonialSwiper', {
            loop: true,
            autoplay: { delay: 4000 },
            slidesPerView: 1,
            spaceBetween: 30,
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            },
            pagination: { el: '.testimonial-pagination', clickable: true },
        });
    }

    // Blog Slider
    if (document.querySelector('.blogSwiper')) {
        new Swiper('.blogSwiper', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 25,
            breakpoints: {
                768: { slidesPerView: 2 },
                1200: { slidesPerView: 3 }
            },
            navigation: { nextEl: '.blog-next', prevEl: '.blog-prev' }
        });
    }
});
