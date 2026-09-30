// Task 2: Rewritten isEven function with proper indentation and beginner-friendly comments

/**
 * Checks whether a given number is even or odd.
 * @param {number} num - The number to check
 * @returns {boolean} - true if even, false if odd
 */
function isEven(num) {
    // Step 1: Check if the number is divisible by 2 with no remainder
    if (num % 2 === 0) {
        // If remainder is 0, the number is even
        return true;
    } else {
        // Otherwise, the number is odd
        return false;
    }
}

// Example tests:
console.log("Is 4 even? " + isEven(4)); // Returns true
console.log("Is 7 even? " + isEven(7)); // Returns false
