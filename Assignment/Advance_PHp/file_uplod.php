<?php

// Question:
// Create a file upload form that allows users to upload files and handle the uploaded files safely on the server.

?>

<!-- ================= HTML FORM (upload.php) ================= -->
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
    Select File:
    <input type="file" name="myfile">
    <input type="submit" name="upload" value="Upload">
</form>

<?php

// checking if form is submitted
if (isset($_POST['upload'])) {

    // file details
    $fileName = $_FILES['myfile']['name'];
    $fileTmp = $_FILES['myfile']['tmp_name'];
    $fileSize = $_FILES['myfile']['size'];

    // allowed file types
    $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

    // get file extension
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // check file type
    if (!in_array($fileExt, $allowed)) {
        echo "Invalid file type";
        exit;
    }

    // check file size (max 2MB)
    if ($fileSize > 2 * 1024 * 1024) {
        echo "File size too large";
        exit;
    }

    // safe file name
    $newName = time() . "_" . $fileName;

    // upload folder
    $uploadPath = "uploads/" . $newName;

    // move file to folder
    if (move_uploaded_file($fileTmp, $uploadPath)) {
        echo "File uploaded successfully";
    } else {
        echo "Upload failed";
    }
}

?>

</body>
</html>