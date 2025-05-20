<?php

//$conn = new PDO("mysql:host=127.0.0.1", "root", "piko1234");
//$sql = "create database mydatabase";
//$conn->exec($sql);

$conn = new mysqli("127.0.0.1", "root", "piko1234");
$sql = "create database mydatabase1";
$conn->query($sql);