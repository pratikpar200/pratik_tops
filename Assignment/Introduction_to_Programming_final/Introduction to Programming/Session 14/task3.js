// Task 3: Format follower counts into Instagram-style shorthand notation

/**
 * Formats a follower count into K or M format.
 * @param {number} count - Total followers
 * @returns {string} - Formatted follower string (e.g., '1.5K', '1.2M', '750')
 */
function formatFollowersCount(count) {
    // Check if count is in millions (1,000,000 or more)
    if (count >= 1000000) {
        let inMillions = count / 1000000;
        // Format to 1 decimal place if needed
        return (inMillions % 1 === 0 ? inMillions : inMillions.toFixed(1)) + "M";
    }
    // Check if count is in thousands (1,000 to 999,999)
    else if (count >= 1000) {
        let inThousands = count / 1000;
        // Format to 1 decimal place if needed
        return (inThousands % 1 === 0 ? inThousands : inThousands.toFixed(1)) + "K";
    }
    // Numbers below 1000 remain as-is
    else {
        return count.toString();
    }
}

// Test cases
console.log("1500 followers    -> " + formatFollowersCount(1500));    // Output: 1.5K
console.log("1200000 followers -> " + formatFollowersCount(1200000)); // Output: 1.2M
console.log("850 followers     -> " + formatFollowersCount(850));     // Output: 850
