<?php

$students = [
    ['name' => 'John', 'dob' => '1990-01-01'],
    ['name' => 'Jane', 'dob' => '1991-01-01'],
    ['name' => 'Jack', 'dob' => '1992-01-01'],
];

if(isset($_POST['search'])){
    $name = trim($_POST['name'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    if(empty($name) || empty($dob)){
        die('Field Required');
    }
    foreach ($students as $student) {
        if($student['name'] === $name && $student['dob'] === $dob){
            echo 'Found!';
            die();
        }
    }
    echo 'Not found';
    die();
}

?>

<html lang="en">
<form method="post">
    <label>Name: </label>
    <input type="text" name="name" />
    <label>DOB: </label>
    <input type="text" name="dob">
    <input type="submit" name="search">
</form>
</html>


