<?php
// 13) LAB EXERCISE: Redirect users to another page using the header() function.

// CRITICAL FIX: To use header(), absolutely NO HTML or text output should precede it.
// Removed the plain text that was causing "Headers already sent" error by placing it in PHP comments.

// Redirect to another page (Ensure page2.php exists)
header("Location: page2.php");

// Always call exit() or die() after a header redirect
// to stop the execution of the rest of the script.
exit();
?>
