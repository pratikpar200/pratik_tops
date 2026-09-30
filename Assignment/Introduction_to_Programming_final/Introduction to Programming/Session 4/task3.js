// Task 3: Check eligibility for special offer using relational and logical operators

function isEligibleForOffer(age, orderValue) {
    // Return true if user is 18 or older AND order value is above 500
    if (age >= 18 && orderValue > 500) {
        return true;
    } else {
        return false;
    }
}

// Example usage:
console.log("Age 20, Order 650: " + isEligibleForOffer(20, 650)); // Expected: true
console.log("Age 16, Order 800: " + isEligibleForOffer(16, 800)); // Expected: false (age < 18)
console.log("Age 25, Order 400: " + isEligibleForOffer(25, 400)); // Expected: false (order <= 500)
