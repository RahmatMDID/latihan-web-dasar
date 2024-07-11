/**
 * Smooth Scroll for Navigation Links
 * This script listens for click events on navigation links
 * and smoothly scrolls to the corresponding section.
 */
document.querySelectorAll('nav .nav-links a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();  // Prevent the default anchor behavior
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'  // Smooth scrolling effect
        });
    });
});

/**
 * Scroll to Reveal Effect
 * This script adds a 'visible' class to elements when they come into view,
 * triggering animations or other effects.
 */
const revealElements = document.querySelectorAll('.reveal');

const revealOnScroll = () => {
    const windowHeight = window.innerHeight;  // Get the height of the viewport
    revealElements.forEach(el => {
        const elementTop = el.getBoundingClientRect().top;  // Get the element's position relative to the viewport
        if (elementTop < windowHeight - 100) {  // Check if the element is within 100px of the viewport
            el.classList.add('visible');  // Add 'visible' class to trigger animations
        }
    });
};

window.addEventListener('scroll', revealOnScroll);  // Call the function on scroll
revealOnScroll();  // Initial check to reveal elements on page load

/**
 * Add 'reveal' class to sections that need the scroll reveal effect
 * This class is used to apply the scroll reveal effect defined in the CSS.
 */
document.querySelectorAll('section').forEach(section => {
    section.classList.add('reveal');
});
