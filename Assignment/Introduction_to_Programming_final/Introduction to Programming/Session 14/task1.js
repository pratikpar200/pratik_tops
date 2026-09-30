// Task 1: Debugging and fixing Zomato order price calculation

/*
Errors identified in original code:
1. 'total =+ prices[i]' was using '=+' (unary plus assignment) instead of '+=' (addition assignment).
   This caused total to simply be assigned the current item's price on each iteration rather than accumulating.
2. 'i = 0' was missing the 'let' keyword, creating an undeclared global variable.
*/

let items = ["Burger", "Pizza", "Fries"];
let prices = [120, 250, 90];
let total = 0;

// Fixed: declared loop variable with let, and used '+=' for sum accumulation
for (let i = 0; i < items.length; i++) {
    total += prices[i];
}

console.log("Ordered Items: " + items.join(", "));
console.log("Total price is: Rs. " + total);
