// Import main SCSS file
import "../scss/serinity.scss";
import { initCarousels } from "./serinity-carousel";

// Theme JavaScript goes here
console.log("Serinity Theme loaded");

// Add your JS functionality
document.addEventListener("DOMContentLoaded", function () {
  // Remove admin bar height from root element
  const hasAdminBar = !!document.querySelector("#wpadminbar");
  if (!hasAdminBar)
    document.documentElement.style.setProperty("--wp-admin--admin-bar--height", "0px");

  // Responisve Nav menu toggle
  const hamburger = document.querySelector('.serinity-hamburger-menu');
  hamburger.addEventListener('click', function() {
    const expanded = this.getAttribute('aria-expanded') === 'true' || false;
    this.setAttribute('aria-expanded', !expanded);
  });

  // Initialize testimonial carousels with options
  const testimonialsCarousels = initCarousels(".serinity-testimonies", ".serinity-testimony", {
    direction: "left", // "left" or "right"
    speed: 0.2, // Pixels per frame
    mobileTitle: "Témoignages", // Title for mobile carousel
    debug: false,
  });
});
