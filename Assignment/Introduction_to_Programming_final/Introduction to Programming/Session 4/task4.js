// Task 4: Check if an Instagram post is trending
// Condition: at least 1000 likes OR more than 200 comments AND at least 50 shares.

let likes = 1200;
let comments = 150;
let shares = 60;

// Operator precedence: AND (&&) has higher precedence than OR (||)
let isTrending = (likes >= 1000) || (comments > 200 && shares >= 50);

console.log("Likes: " + likes);
console.log("Comments: " + comments);
console.log("Shares: " + shares);
console.log("Is Post Trending? " + isTrending);
