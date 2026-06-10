<?php

// Question:
// Create a script that reads from a text file and displays its content on a web page.

// file name
$filename = "data.txt";

// check if file exists
if (file_exists($filename)) {

    // open file in read mode
    $file = fopen($filename, "r");

    // read full file content
    $content = fread($file, filesize($filename));

    // close file
    fclose($file);

    // display content on web page
    echo "File Content:<br><br>";
    echo nl2br($content); // converts new lines into HTML line breaks

} else {
    echo "File not found";
}

?>