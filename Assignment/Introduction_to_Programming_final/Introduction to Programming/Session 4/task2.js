// Task 2: Flipkart-style discount calculator

function calculateDiscountedPrice(productPrice, discountPercentage, isMember) {
    let totalDiscount = discountPercentage;

    // Apply extra 5% discount if isMember is true using logical operator
    if (isMember === true) {
        totalDiscount = totalDiscount + 5;
    }

    let discountAmount = (productPrice * totalDiscount) / 100;
    let finalPrice = productPrice - discountAmount;

    return finalPrice;
}

// Example usage:
let price = 2000;
let discount = 10; // 10% base discount
let isFlipkartPlusMember = true;

let finalAmount = calculateDiscountedPrice(price, discount, isFlipkartPlusMember);

console.log("Original Price: Rs. " + price);
console.log("Is Plus Member: " + isFlipkartPlusMember);
console.log("Final Price after discount: Rs. " + finalAmount);
