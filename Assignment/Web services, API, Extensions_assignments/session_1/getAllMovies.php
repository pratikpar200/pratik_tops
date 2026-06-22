<?php

/*
Q1. Create a PHP file named getAllMovies.php that returns a JSON array of 5 movies.
*/

/*
Q3. Return HTTP status code 404 and JSON error message if fail=true.
*/

/*
Q4. Use standard REST API response schema for success and error responses.
*/

header("Content-Type: application/json");

if(isset($_GET['fail']) && $_GET['fail'] == "true")
{
    http_response_code(404);

    echo json_encode([
        "status" => false,
        "message" => "Movies Not Found",
        "data" => null
    ]);

    exit;
}

$movies = [
    [
        "id" => 1,
        "title" => "Jawan",
        "genre" => "Action"
    ],
    [
        "id" => 2,
        "title" => "Pathaan",
        "genre" => "Action"
    ],
    [
        "id" => 3,
        "title" => "Animal",
        "genre" => "Drama"
    ],
    [
        "id" => 4,
        "title" => "3 Idiots",
        "genre" => "Comedy"
    ],
    [
        "id" => 5,
        "title" => "Dangal",
        "genre" => "Sports"
    ]
];

echo json_encode([
    "status" => true,
    "message" => "Movies Retrieved Successfully",
    "data" => $movies
]);

?>