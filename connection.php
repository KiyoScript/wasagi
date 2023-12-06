<?php

$localhost = "localhost";
$root = "root";
$password = "";
$db_name = "wasagi";

try {
    $conn = new PDO("mysql:host=$localhost;dbname=$db_name",$root, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_log("Connection successful");
}catch(PDOException $e){
    echo "Connection failed : ". $e->getMessage();
    error_log("Connection failed: " . $e->getMessage());
}
