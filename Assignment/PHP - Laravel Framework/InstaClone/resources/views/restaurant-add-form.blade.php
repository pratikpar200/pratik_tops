<!DOCTYPE html>
<html>
<head>
    <title>Add New Restaurant</title>
</head>
<body>
    <h2>Add New Restaurant</h2>
    <form action="/restaurant/store" method="POST">
        @csrf
        <label>Restaurant Name:</label><br>
        <input type="text" name="name"><br><br>

        <label>Cuisine:</label><br>
        <input type="text" name="cuisine"><br><br>

        <button type="submit">Add Restaurant</button>
    </form>
</body>
</html>