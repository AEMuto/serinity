/**
 * Calculate the total width of elements including margins
 * @param {Array<HTMLElement>} elements - Array of DOM elements
 * @returns {number} Total width including margins
 */
export function calculateElementsWidth(elements) {
  return elements.reduce((width, element) => {
    const style = window.getComputedStyle(element);
    const marginLeft = parseFloat(style.marginLeft || "0");
    const marginRight = parseFloat(style.marginRight || "0");
    return width + element.offsetWidth + marginLeft + marginRight;
  }, 0);
}

/**
 * Delay execution for a given amount of time in milliseconds
 * @param {number} ms 
 * @returns {Promise<void>}
 */
export const wait = (ms) => new Promise((resolve) => setTimeout(resolve, ms));

/**
 * Debounce function to limit the number of times a function is called
 * @param {Function} fn - Function to be called
 * @param {number} delay - Delay in milliseconds
 * @returns {Function} Debounced function
 */
export const debounce = (fn, delay) => {
  let timeout;
  return function (...args) {
    clearTimeout(timeout);
    timeout = setTimeout(() => fn.apply(this, args), delay);
  };
}