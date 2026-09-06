<?php
function myProductFilter($products, $keyword) {
    $matched = array();
    for ($i = 0; $i < count($products); $i++) {
        if (strpos(strtolower($products[$i]), strtolower($keyword)) !== false) {
            array_push($matched, $products[$i]);
        }
    }
    return $matched;
}

$products = ["Samsung Mobile", "Nike Shoes", "Redmi Mobile", "Adidas Shoes"];
$result = myProductFilter($products, "Mobile");
print_r($result);
?>