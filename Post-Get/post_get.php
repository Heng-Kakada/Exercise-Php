<?php
if(isset($_GET['search'])){
    $search = $_GET['search'];
    echo $search;
}
?>

<form method="get">
    <input type="text" name="search">
    <input type="submit" value="Post">
</form>

