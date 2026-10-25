<?php

$user = "root";
$pass = "Drinqaka2022.";
$server = "localhost";
$dbname = "car_project";

try {

    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
