document.addEventListener('DOMContentLoaded', function() {
    // Navbar Scroll Effect
    const navbar = document.querySelector('.navbar');
    const heroHeight = document.querySelector('.hero').offsetHeight;

    window.addEventListener('scroll', function() {
        if (window.scrollY > heroHeight) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Hamburger Menu Toggle
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('nav-links');

    hamburger.addEventListener('click', function() {
        navLinks.classList.toggle('show');
        hamburger.classList.toggle('is-active');
    });

    // Initialize slick slider for testimonials
    $('.testimonial-slider').slick({
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        prevArrow: '<button type="button" class="slick-prev">←</button>',
        nextArrow: '<button type="button" class="slick-next">→</button>',
        appendArrows: '.testimonial-slider-controls'
    });
});
