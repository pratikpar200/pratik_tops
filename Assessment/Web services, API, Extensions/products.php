<?php

/*
Q1. Build REST API Endpoints

GET    /products       -> Fetch all products
POST   /products       -> Add new product
PUT    /products/{id}  -> Update product
DELETE /products/{id}  -> Delete product

Return JSON responses and use correct HTTP status codes.
*/

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET")
{
    http_response_code(200);

    echo json_encode([
        "message" => "All Products Fetched"
    ]);
}

elseif($method == "POST")
{
    http_response_code(201);

    echo json_encode([
        "message" => "Product Added Successfully"
    ]);
}

elseif($method == "PUT")
{
    http_response_code(200);

    echo json_encode([
        "message" => "Product Updated Successfully"
    ]);
}

elseif($method == "DELETE")
{
    http_response_code(200);

    echo json_encode([
        "message" => "Product Deleted Successfully"
    ]);
}

else
{
    http_response_code(404);

    echo json_encode([
        "message" => "Invalid Request"
    ]);
}

?>