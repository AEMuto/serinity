import { calculateElementsWidth, wait } from "./utils";

/**
 * Card class to manage individual carousel cards
 */
class SerinityCarouselCard {
  /**
   * Constructor for SerinityCarouselCard
   * @param {HTMLElement} element - The card element
   * @param {Object} options - Options for the card
   */
  constructor(element, options = {}) {
    this.element = element;
    this.options = {
      characterLimit: 250,
      ...options,
    };
    this.currentContent = this.element.querySelector("p").textContent.length;
    
    // Initialize states
    this.opacity = 1;
    
    // Apply initial styles
    this.updateAppearance();
    // Add read more button
    this.addReadMoreButton();
  }

  /**
   * Update card based on its position in the container
   * @param {number} containerLeft - Left edge of container
   * @param {number} containerRight - Right edge of container
   * @param {number} fadeZoneWidth - Width of the fade zone
   */
  updatePositionOpacity(containerLeft, containerRight, fadeZoneWidth) {
    // Calculate element's current position relative to container
    const rect = this.element.getBoundingClientRect();
    const containerRect = this.element.parentElement.parentElement.getBoundingClientRect();
    const cardLeft = rect.left - containerRect.left;
    const cardRight = rect.right - containerRect.left;

    // Determine fade zone boundaries
    const leftFadeOutEnd = containerLeft + fadeZoneWidth;
    const rightFadeInStart = containerRight - fadeZoneWidth;

    // Default opacity - fully visible
    let opacity = 1;

    // FADE IN from right - gradually increase opacity as card enters
    if (cardLeft > rightFadeInStart) {
      // Calculate how far the card has entered (0 = just at edge, 1 = fully entered fade zone)
      const progress = (containerRight - cardLeft) / fadeZoneWidth;
      opacity = Math.min(1, Math.max(0, progress));
    }

    // FADE OUT to left - gradually decrease opacity as card exits
    else if (cardRight < leftFadeOutEnd) {
      // Calculate how far the card is still visible (0 = at edge, 1 = fully in fade zone)
      const progress = (cardRight - containerLeft) / fadeZoneWidth;
      opacity = Math.min(1, Math.max(0, progress));
    }

    // Card completely outside viewport
    if (cardRight <= containerLeft || cardLeft >= containerRight) {
      opacity = 0;
    }

    this.positionOpacity = opacity;
    this.updateAppearance();
  }

  /**
   * Update the visual appearance of the card
   */
  updateAppearance() {
    // Apply opacity directly without any minimum floor
    this.element.style.opacity = this.positionOpacity?.toString() || "1";
    this.element.style.filter = "none";
  }

  /**
   * Handle hover state
   * @param {boolean} isHovering - Whether the card is being hovered
   */
  setHover(isHovering) {
    if (isHovering) {
      this.element.style.opacity = "1";
      this.element.style.filter = "none";
      this.element.style.transform = "translateY(-5px)";
      this.element.style.zIndex = "5";
    } else {
      this.updateAppearance();
      this.element.style.transform = "";
      this.element.style.zIndex = "";
    }
  }

  /**
   * Adds a "read more" button for long content
   */
  addReadMoreButton() {
    const contentCharLength = parseInt(this.currentContent, 10);
    if (
      !this.element.querySelector(".serinity-read-more") &&
      contentCharLength > this.options.characterLimit
    ) {
      const readMoreButton = document.createElement("button");
      readMoreButton.classList.add("serinity-read-more");
      this.element.appendChild(readMoreButton);
      readMoreButton.addEventListener("click", (e) => {
        e.stopPropagation();
        this.element.classList.toggle("expanded");
      });
    }
  }
}

/**
 * Carousel for Serinity Theme
 */
export class SerinityCarousel {
  /**
   * Constructor for the SerinityCarousel
   * @param {HTMLElement} containerElement - The container element for this carousel
   * @param {string} cardSelector - CSS selector for individual cards inside the container
   * @param {Object} options - Configuration options
   */
  constructor(containerElement, cardSelector, options = {}) {
    this.container = containerElement;
    this.cardSelector = cardSelector;
    this.options = {
      direction: "left", // "left" or "right"
      speed: 0.5, // Pixels per frame
      debug: false, // Show debug zones
      cardCharacterLimit: 250,
      ...options,
    };

    // Set scroll speed based on direction
    this.scrollSpeed = this.options.direction === "right" ? -this.options.speed : this.options.speed;

    this.isPaused = false;
    this.isHovering = false; // Track if any card is being hovered
    this.hoverTimeout = null; // Store the timeout reference
    this.animationId = null;

    // Initialize the carousel
    this.init();
  }

  /**
   * Initialize the carousel
   */
  init() {
    // Set up the container styling
    this.setupContainer();

    // Set up event listeners
    this.setupEventListeners();

    // Start the animation
    this.startAnimation();

    // Show debug zones if enabled
    if (this.options.debug) this.showDebugZones();
  }

  /**
   * Set up the container with necessary CSS properties
   */
  setupContainer() {
    // Create inner wrapper for scrolling
    this.scrollWrapper = document.createElement("div");
    this.scrollWrapper.className = "serinity-carousel-wrapper";

    // Get all carousel cards
    const carouselCards = Array.from(this.container.querySelectorAll(this.cardSelector));

    // Store container dimensions
    this.containerWidth = this.container.offsetWidth;
    this.fadeZoneWidth = carouselCards[0].offsetWidth;

    // Store the original cards
    this.originalCarouselCards = carouselCards;

    // Move all cards to the wrapper
    carouselCards.forEach((card) => this.scrollWrapper.appendChild(card));

    // Add the wrapper back to the container
    this.container.appendChild(this.scrollWrapper);

    // Create clones for the infinite scroll
    this.createClones();

    // Calculate dimensions
    this.calculateDimensions();

    // Create card objects for each card
    this.initializeCards();
  }

  /**
   * Create clones for infinite scrolling
   */
  createClones() {
    const className = this.cardSelector.replace(/^[.#]/, "");
    // Two sets of clones - one at the beginning and one at the end
    this.originalCarouselCards.forEach((card) => {
      const preClone = card.cloneNode(true);
      preClone.setAttribute("aria-hidden", "true");
      preClone.classList.add(`${className}-clone`);
      this.scrollWrapper.insertBefore(preClone, this.scrollWrapper.firstChild);

      const postClone = card.cloneNode(true);
      postClone.setAttribute("aria-hidden", "true");
      postClone.classList.add(`${className}-clone`);
      this.scrollWrapper.appendChild(postClone);
    });

    // Get all cards including clones
    this.allCarouselCards = Array.from(this.scrollWrapper.querySelectorAll(this.cardSelector));
  }

  /**
   * Initialize card objects for each carousel card
   */
  initializeCards() {
    this.cards = this.allCarouselCards.map((carouselCard) => {
      const card = new SerinityCarouselCard(carouselCard, {
        characterLimit: this.options.cardCharacterLimit,
      });

      // Add hover listeners
      carouselCard.addEventListener("mouseenter", () => {
        // Clear any pending resume timeout
        if (this.hoverTimeout) {
          clearTimeout(this.hoverTimeout);
          this.hoverTimeout = null;
        }
        
        this.isHovering = true;
        this.isPaused = true;
        card.setHover(true);
      });

      carouselCard.addEventListener("mouseleave", () => {
        card.setHover(false);
        
        // Set a timeout before resuming animation
        // This gives time for the mouse to move to another card
        this.hoverTimeout = setTimeout(() => {
          // Only resume if we're not hovering any card
          if (!this.container.matches(':hover')) {
            this.isHovering = false;
            this.isPaused = false;
          }
          this.hoverTimeout = null;
        }, 300);
      });

      return card;
    });
    
    // Add a listener to the container to track when mouse leaves the entire carousel
    this.container.addEventListener("mouseleave", () => {
      // When mouse leaves the entire container, resume animation after a short delay
      setTimeout(() => {
        this.isHovering = false;
        this.isPaused = false;
      }, 300);
    });
  }

  /**
   * Calculate dimensions needed for the animation
   */
  calculateDimensions() {
    // Set viewport dimensions to full container
    this.viewportLeft = 0;
    this.viewportWidth = this.containerWidth;
    this.viewportRight = this.viewportWidth;

    // Calculate single set width
    this.singleSetWidth = calculateElementsWidth(this.originalCarouselCards);

    // Start position at one set width for proper looping
    this.scrollPosition = this.singleSetWidth;

    // Apply initial position
    this.scrollWrapper.style.transform = `translateX(-${this.scrollPosition}px)`;

    // Get center point of container for opacity calculations
    this.containerCenter = this.container.offsetWidth / 2;
  }

  /**
   * Set up event listeners
   */
  setupEventListeners() {
    // Pause when tab is inactive
    document.addEventListener("visibilitychange", () => {
      this.isPaused = document.hidden;
    });

    // Handle resize
    window.addEventListener("resize", () => {
      this.containerWidth = this.container.offsetWidth;
      this.fadeZoneWidth = this.originalCarouselCards[0].offsetWidth;
      this.containerCenter = this.containerWidth / 2;
      this.calculateDimensions();
      this.updateCardAppearance();
    });
  }

  /**
   * Update appearance of all cards
   */
  updateCardAppearance() {
    this.cards.forEach((card) => {
      card.updatePositionOpacity(this.viewportLeft, this.viewportRight, this.fadeZoneWidth);
    });
  }

  /**
   * Start the animation loop
   */
  startAnimation() {
    const animate = () => {
      if (!this.isPaused) {
        // Increment scroll position
        this.scrollPosition += this.scrollSpeed;

        // Check for reset
        if (this.scrollSpeed > 0 && this.scrollPosition >= this.singleSetWidth * 2) {
          // Reset when scrolling left
          this.scrollPosition = this.singleSetWidth;
        } else if (this.scrollSpeed < 0 && this.scrollPosition <= 0) {
          // Reset when scrolling right
          this.scrollPosition = this.singleSetWidth;
        }

        // Apply the transform
        this.scrollWrapper.style.transform = `translateX(-${this.scrollPosition}px)`;
      }

      // Always update card appearances
      this.updateCardAppearance();

      // Continue animation
      this.animationId = requestAnimationFrame(animate);
    };

    // Start animation
    this.animationId = requestAnimationFrame(animate);
  }

  /**
   * Shows visual debug indicators for fade zones
   * Call this method after initialization to show the zones
   */
  showDebugZones() {
    // Remove any existing debug elements
    const existing = this.container.querySelectorAll(".serinity-debug-zone");
    existing.forEach((el) => el.remove());

    // Create left fade zone indicator
    const leftZone = document.createElement("div");
    leftZone.className = "serinity-debug-zone serinity-debug-zone-left";
    leftZone.style.cssText = `
    position: absolute;
    top: 0;
    left: ${this.viewportLeft}px;
    width: ${this.fadeZoneWidth}px;
    height: 100%;
    border: 2px solid red;
    background: rgba(255, 0, 0, 0.1);
    z-index: 1000;
    pointer-events: none;
  `;

    // Create right fade zone indicator
    const rightZone = document.createElement("div");
    rightZone.className = "serinity-debug-zone serinity-debug-zone-right";
    rightZone.style.cssText = `
    position: absolute;
    top: 0;
    right: ${this.containerWidth - this.viewportRight}px;
    width: ${this.fadeZoneWidth}px;
    height: 100%;
    border: 2px solid red;
    background: rgba(255, 0, 0, 0.1);
    z-index: 1000;
    pointer-events: none;
  `;

    // Add the indicators to the container
    this.container.appendChild(leftZone);
    this.container.appendChild(rightZone);

    console.log(
      "Debug zones added. Left zone width:",
      this.fadeZoneWidth,
      "Right zone width:",
      this.fadeZoneWidth,
      "Viewport:",
      this.viewportLeft,
      this.viewportRight
    );
  }

  /**
   * Stop animation and clean up
   */
  destroy() {
    if (this.animationId) {
      cancelAnimationFrame(this.animationId);
    }
    
    if (this.hoverTimeout) {
      clearTimeout(this.hoverTimeout);
    }
  }
}

/**
 * Initialize carousels with a selector and options
 * @param {string} containerSelector - CSS selector for carousel containers
 * @param {string} cardSelector - CSS selector for individual cards
 * @param {Object} options - Configuration options
 * @returns {Array} - Array of SerinityCarousel instances
 */
export function initCarousels(containerSelector, cardSelector, options = {}) {
  const containers = document.querySelectorAll(containerSelector);

  if (containers.length === 0) return [];

  const carousels = [];
  containers.forEach((containerElement) => {
    carousels.push(new SerinityCarousel(containerElement, cardSelector, options));
  });

  return carousels;
}