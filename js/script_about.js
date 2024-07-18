// Toggle the navigation menu when hamburger icon is clicked
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    const navItems = document.querySelectorAll('.nav-item');

    // Toggle menu visibility
    hamburger.addEventListener('click', function() {
        navLinks.classList.toggle('show');
        document.body.classList.toggle('no-scroll');
    });

    // Close menu when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!navLinks.contains(event.target) && !hamburger.contains(event.target)) {
            navLinks.classList.remove('show');
            document.body.classList.remove('no-scroll');
        }
    });

    // Add smooth scrolling effect to navigation links
    navItems.forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            window.scrollTo({
                top: targetElement.offsetTop - 70,
                behavior: 'smooth'
            });
            navLinks.classList.remove('show');
            document.body.classList.remove('no-scroll');
        });
    });

    // Highlight navigation links based on scroll position
    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY + window.innerHeight / 2;
        navItems.forEach(function(item) {
            const section = document.querySelector(item.getAttribute('href'));
            if (section.offsetTop <= scrollPosition && section.offsetTop + section.offsetHeight > scrollPosition) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    });
});
