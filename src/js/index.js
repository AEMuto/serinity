// Import main SCSS file
import "../scss/serinity.scss";
import { initCardSliders } from "./card-slider";
import { initCarousels } from "./testimony-carousel";

// Theme JavaScript goes here
console.log("Serinity Theme loaded");

// Add your JS functionality
document.addEventListener("DOMContentLoaded", function () {
  const methods_cards = initCardSliders();
  // Initialize testimonial carousels with options
  const testimonialsCarousels = initCarousels(".serinity-testimonies", ".serinity-testimony", {
    direction: "left", // "left" or "right"
    speed: 0.5, // Pixels per frame
    randomOpacity: false, // Random initial opacity
    timeBasedAnimation: false, // Enable time-based opacity and blur
  });
});
