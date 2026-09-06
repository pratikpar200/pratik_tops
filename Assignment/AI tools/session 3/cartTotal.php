<?php
// function to calculate total cart price with 5% delivery charge
function calculateCartTotal($items) {
    $subtotal = 0;
    foreach ($items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    $deliveryCharge = $subtotal * 0.05;
    $total = $subtotal + $deliveryCharge;
    return $total;
}

// Sample Zomato-style cart items
$cartItems = [
    ["name" => "Pizza", "price" => 300, "quantity" => 2],
    ["name" => "Burger", "price" => 150, "quantity" => 1],
    ["name" => "Coke", "price" => 50, "quantity" => 2]
];

$total = calculateCartTotal($cartItems);
echo "Total cart price (with 5% delivery charge): ₹" . $total;
?>