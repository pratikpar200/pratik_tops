<?php
// logout.php
session_start();
session_destroy();
header("Location: login.php"); // Or back to landing page
exit();
?>
