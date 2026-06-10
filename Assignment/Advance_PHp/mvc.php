<?php

// Question:
// Create a simple MVC application that demonstrates the separation of concerns by
// implementing a basic "User" module with a model, view, and controller.

// ---------------- MODEL ----------------
class UserModel
{
    public function getUserData()
    {
        // sample data (normally comes from database)
        return [
            "name" => "Rahul",
            "email" => "rahul@example.com",
            "age" => 20
        ];
    }
}

// ---------------- CONTROLLER ----------------
class UserController
{
    private $model;

    public function __construct()
    {
        // creating model object
        $this->model = new UserModel();
    }

    public function showUser()
    {
        // getting data from model
        $user = $this->model->getUserData();

        // sending data to view
        include "userView.php";
    }
}

// ---------------- VIEW (userView.php) ----------------
// (Normally this file is separate, but written here for simplicity)

?>

<!-- View part -->
<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
</head>
<body>

<?php
// displaying data from controller
echo "<h2>User Information</h2>";
echo "Name: " . $user['name'] . "<br>";
echo "Email: " . $user['email'] . "<br>";
echo "Age: " . $user['age'] . "<br>";
?>

</body>
</html>

<?php

// ---------------- RUN APPLICATION ----------------

// creating controller object
$controller = new UserController();

// calling controller method
$controller->showUser();

?>