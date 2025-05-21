<?php
$base_dir = __DIR__ . '/';
if(isset($_POST['submit']) && !empty($_FILES['image']['name'])){
    $upload_dir = $base_dir . 'uploads/';
    $maxFileSize = 3 * 1024 * 1024; // 3,000,000 bytes = 3MB
    $allowedTypes = ['image/jpeg', 'image/png', 'application/jpg'];
    $file = $_FILES['image'];

    if(!in_array($file['type'], $allowedTypes)){
        die ("File type is not allowed");
    }
    $fileName = basename($file['name']);
    $targetPath = $upload_dir . $fileName;

    if($file['size'] > $maxFileSize){
        die ("File size is too large");
    }
    if(!move_uploaded_file($file['tmp_name'], $targetPath)){
        die("File upload failed");
    }
    die("File uploaded successfully");
}
?>


<html lang="en">

<form method="post" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*">
    <input type="submit" name="submit">
</form>

</html>

