// Import main SCSS file
import "../scss/serinity.scss";
import { initCardSliders } from "./card-slider";
import { initCarousels } from "./testimony-carousel";

// Theme JavaScript goes here
console.log("Serinity Theme loaded");

// Add your JS functionality
document.addEventListener("DOMContentLoaded", function () {
  const hasAdminBar = !!document.querySelector("#wpadminbar");
  if (!hasAdminBar) document.documentElement.style.setProperty('--wp-admin--admin-bar--height', '0px');
  const expandPlansBtn = document.querySelector("#expand-plans");
  const plans = document.querySelector("#plans");

  expandPlansBtn.addEventListener("click", (e) => {
    plans.classList.toggle("open");
  });

  const methods_cards = initCardSliders();
  // Initialize testimonial carousels with options
  const testimonialsCarousels = initCarousels(".serinity-testimonies", ".serinity-testimony", {
    direction: "left", // "left" or "right"
    speed: 0.5, // Pixels per frame
    randomOpacity: false, // Random initial opacity
    timeBasedAnimation: false, // Enable time-based opacity and blur
  });
});