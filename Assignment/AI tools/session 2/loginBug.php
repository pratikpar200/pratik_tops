<?php
function login($username, $password) {
    $storedUsername = "admin";
    $storedPassword = "1234";

    if ($username == $storedUsername && $password == $storedPassword) {
        return true;
    }
    return false;
}

// Test with correct credentials
var_dump(login("admin", "1234"));

// Test with wrong credentials
var_dump(login("admin", "wrongpass"));
?>