<?php

$base_dir = __DIR__ . '/';
if(isset($_POST['submit'])){
    $upload_dir = $base_dir . 'uploads/';
    $allowedType = ['image/jpg', 'image/jpeg', 'image/png'];
    $files = $_FILES['photo'];
    $countFiles = count($files['name']);

    for($i = 0; $i < $countFiles; $i++){
         $fileName = basename($files['name'][$i]);
         $targetPath = $upload_dir . $fileName;
         if(in_array($files['type'][$i], $allowedType)){
             if(move_uploaded_file($files['tmp_name'][$i], $targetPath)){
                 echo "File uploaded successfully", "<br>";
             }
             else{
                 echo "File upload failed", "<br>";
             }
             continue;
         }
         echo "$fileName File type not allowed", "<br>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <h5>File Upload</h5>
    <form method="post" enctype="multipart/form-data">
        <input type="file" multiple name="photo[]">
        <input type="submit" name="submit" value="Upload">
    </form>
</html>