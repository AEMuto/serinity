/**
 * Card Slider functionality for Serinity Theme
 */

export class CardSlider {
  /**
   * Constructor for the CardSlider
   * @param {HTMLElement} container - The container element for this slider
   */
  constructor(container) {
    // Store references to DOM elements
    this.container = container;
    this.cards = container.querySelectorAll(".serinity-card");
    this.prevButtons = container.querySelectorAll(".serinity-card-prev");
    this.nextButtons = container.querySelectorAll(".serinity-card-next");

    // Initialize state
    this.currentIndex = 0;
    this.totalCards = this.cards.length;
    this.isAnimating = false;

    // Initialize the slider
    this.init();
  }

  /**
   * Initialize the slider
   */
  init() {
    // Hide all cards except the first one
    this.cards.forEach((card, index) => {
      if (index !== 0) {
        card.style.display = "none";
      }
    });

    // Bind event handlers
    this.handlePrevClick = this.handlePrevClick.bind(this);
    this.handleNextClick = this.handleNextClick.bind(this);

    // Add event listeners
    this.prevButtons.forEach((button) => {
      button.addEventListener("click", this.handlePrevClick);
    });

    this.nextButtons.forEach((button) => {
      button.addEventListener("click", this.handleNextClick);
    });
  }

  /**
   * Handle click on previous button
   */
  handlePrevClick(e) {
    if (!this.isAnimating) {
      this.navigateCards("prev");
    }
  }

  /**
   * Handle click on next button
   */
  handleNextClick(e) {
    if (!this.isAnimating) {
      this.navigateCards("next");
    }
  }

  /**
   * Navigate to previous or next card with animation
   * @param {string} direction - Direction to navigate: 'prev' or 'next'
   */
  navigateCards(direction) {
    const currentCard = this.cards[this.currentIndex];

    // Calculate new index based on direction
    let newIndex;
    if (direction === "prev") {
      newIndex = (this.currentIndex - 1 + this.totalCards) % this.totalCards;
    } else {
      newIndex = (this.currentIndex + 1) % this.totalCards;
    }

    const newCard = this.cards[newIndex];

    // Set animating flag to prevent multiple clicks
    this.isAnimating = true;

    // Fade out current card
    this.fadeOut(currentCard, () => {
      currentCard.style.display = "none";
      newCard.style.display = "flex";
      newCard.style.opacity = "0";
      this.fadeIn(newCard, () => {
        // Reset animating flag when animation completes
        this.isAnimating = false;
      });

      // Update current index
      this.currentIndex = newIndex;
    });
  }

  /**
   * Fade out an element with animation
   * @param {HTMLElement} element - Element to fade out
   * @param {Function} callback - Function to call after animation completes
   */
  fadeOut(element, callback) {
    element.style.opacity = "1";

    let opacity = 1;
    const timer = setInterval(() => {
      if (opacity <= 0.1) {
        clearInterval(timer);
        element.style.opacity = "0";
        if (callback) callback();
      }
      element.style.opacity = opacity;
      opacity -= opacity * 0.1;
    }, 20);
  }

  /**
   * Fade in an element with animation
   * @param {HTMLElement} element - Element to fade in
   * @param {Function} callback - Function to call after animation completes
   */
  fadeIn(element, callback) {
    let opacity = 0.1;
    element.style.opacity = opacity;

    const timer = setInterval(() => {
      if (opacity >= 1) {
        clearInterval(timer);
        element.style.opacity = "1";
        if (callback) callback();
      }
      element.style.opacity = opacity;
      opacity += opacity * 0.1;
    }, 20);
  }

  /**
   * Clean up event listeners when the slider is no longer needed
   * (helpful for single page applications or when components are dynamically added/removed)
   */
  destroy() {
    this.prevButtons.forEach((button) => {
      button.removeEventListener("click", this.handlePrevClick);
    });

    this.nextButtons.forEach((button) => {
      button.removeEventListener("click", this.handleNextClick);
    });
  }
}

/**
 * Initialize all card sliders on the page
 */
export function initCardSliders() {
  const containers = document.querySelectorAll(".serinity-cards-container");

  // Create an array to store all slider instances
  const sliders = [];

  // Initialize a new slider for each container
  containers.forEach((container) => {
    sliders.push(new CardSlider(container));
  });

  // Return the array of sliders (could be useful for further manipulation)
  return sliders;
}
