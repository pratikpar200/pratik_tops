// Task 5: Difference between pre-increment (++count) and post-increment (count++)

console.log("--- Post-Increment (followerCount++) ---");
let followerCount1 = 500;
console.log("Initial follower count: " + followerCount1);
// Post-increment: uses current value first, then increments
console.log("Value during followerCount1++: " + (followerCount1++));
console.log("Value after post-increment: " + followerCount1);

console.log("\n--- Pre-Increment (++followerCount) ---");
let followerCount2 = 500;
console.log("Initial follower count: " + followerCount2);
// Pre-increment: increments first, then uses new value
console.log("Value during ++followerCount2: " + (++followerCount2));
console.log("Value after pre-increment: " + followerCount2);
