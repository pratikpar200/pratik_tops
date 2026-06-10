<?php

// Question:
// Write a script to create a session and store user data, and then retrieve it on a different page.
// Also, demonstrate how to set and retrieve a cookie.


// ======================= PAGE 1 (session_cookie_set.php) =======================

// start session
session_start();

// store data in session
$_SESSION['username'] = "Rahul";
$_SESSION['email'] = "rahul@example.com";

// set cookie (valid for 1 day)
setcookie("user", "Rahul", time() + (86400), "/");

echo "Session and Cookie set successfully";

?>