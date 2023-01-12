<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';

try{
    $conn = new PDO("mysql:host=$servername;dbname=Bank", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "ERROR : " . $e->getMessage();
}
?>
