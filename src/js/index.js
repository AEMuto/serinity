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
    if (plans.classList.contains("open")) {
      // scroll to anchor #aurea
      const offset = plans.offsetTop - 100;
      window.scrollTo({
        top: offset,
        behavior: "smooth"
      });
    }
  });

  const methods_cards = initCardSliders();

  // Initialize testimonial carousels with options
  const testimonialsCarousels = initCarousels(".serinity-testimonies", ".serinity-testimony", {
    direction: "left", // "left" or "right"
    speed: .5, // Pixels per frame
    mobileTitle: "Témoignages", // Title for mobile carousel
    debug: false,
  });
});