// Import main SCSS file
import "../scss/serinity.scss";
import { initCardSliders } from "./serinity-slider";
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
  const navMenu = document.querySelector('.serinity-header-navigation-menu');
  hamburger.addEventListener('click', function() {
    const expanded = this.getAttribute('aria-expanded') === 'true' || false;
    this.setAttribute('aria-expanded', !expanded);
  });

  // Expand plans
  const expandPlansBtn = document.querySelector("#expand-plans");
  const plans = document.querySelector("#plans");

  expandPlansBtn.addEventListener("click", (e) => {
    plans.classList.toggle("open");
    if (plans.classList.contains("open")) {
      // scroll to anchor #aurea
      const offset = plans.offsetTop - 100;
      window.scrollTo({
        top: offset,
        behavior: "smooth",
      });
    }
  });

  // Initialize card sliders
  const methods_cards = initCardSliders();

  // Initialize testimonial carousels with options
  const testimonialsCarousels = initCarousels(".serinity-testimonies", ".serinity-testimony", {
    direction: "left", // "left" or "right"
    speed: 0.2, // Pixels per frame
    mobileTitle: "Témoignages", // Title for mobile carousel
    debug: false,
  });
});
