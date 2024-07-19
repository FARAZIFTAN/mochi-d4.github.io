$(document).ready(function() {
    // Testimonial slider initialization
    $('.testimonial-slider').slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
    });

    // Hamburger menu toggle
    $('#hamburger').click(function() {
        $('#nav-links').toggleClass('show');
    });

    // New arrivals image animation
    $('.promo-item').on('mouseenter', function() {
        $(this).find('img').css('transform', 'scale(1.1)');
    }).on('mouseleave', function() {
        $(this).find('img').css('transform', 'scale(1)');
    });

    // Navbar scroll effect
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 50) {
            $('.navbar').addClass('scrolled');
        } else {
            $('.navbar').removeClass('scrolled');
        }
    });
});
