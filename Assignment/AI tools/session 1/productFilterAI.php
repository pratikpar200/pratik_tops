<?php

function searchProducts($products, $keyword)
{
    $result = [];

    foreach ($products as $product) {
        if (stripos($product, $keyword) !== false) {
            $result[] = $product;
        }
    }

    return $result;
}

// Product list
$products = [
    "iPhone 16",
    "Samsung Galaxy S25",
    "Realme Narzo",
    "Redmi Note 14",
    "OnePlus Nord"
];

// Search keyword
$keyword = "Red";

// Display matching products
print_r(searchProducts($products, $keyword));

?>