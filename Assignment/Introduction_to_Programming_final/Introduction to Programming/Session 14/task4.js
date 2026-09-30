// Task 4: Debugging even number loop

/*
Error identified in original code:
The if condition used a single equals sign '=' (assignment operator) instead of '===' or '==' (equality comparison operator).
'if (i % 2 = 0)' caused a syntax error: "Invalid left-hand side in assignment".
*/

console.log("=== Even numbers from 1 to 10 ===");

// Loop through numbers from 1 to 10
for (let i = 1; i <= 10; i++) {
    // Check if the current number is divisible by 2 with no remainder (even number)
    if (i % 2 === 0) {
        console.log(i);
    }
}
