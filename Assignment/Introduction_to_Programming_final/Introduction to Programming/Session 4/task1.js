// Task 1: Calculate total bill amount using arithmetic operators

function calculateTotal(itemPrice, quantity) {
    let totalBill = itemPrice * quantity;
    return totalBill;
}

// Example usage:
let price = 250;
let qty = 3;
let total = calculateTotal(price, qty);

console.log("Item Price: Rs. " + price);
console.log("Quantity: " + qty);
console.log("Total Bill: Rs. " + total);
