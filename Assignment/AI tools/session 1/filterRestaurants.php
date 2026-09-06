<?php
function filterRestaurants($restaurants, $keyword) {
    $result = [];
    foreach ($restaurants as $restaurant) {
        if (stripos($restaurant, $keyword) !== false) {
            $result[] = $restaurant;
        }
    }
    return $result;
}

$restaurants = ["Domino's Pizza", "Burger King", "Pizza Hut", "KFC", "Pizza Corner"];
$filtered = filterRestaurants($restaurants, "Pizza");

foreach ($filtered as $name) {
    echo $name . "<br>";
}
?>