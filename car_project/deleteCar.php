<?php

include("admin.php");
include_once("config.php");

$id = $_GET['id'];

// DELETE a car (its rentals are deleted too because of ON DELETE CASCADE)
$sql = "DELETE FROM cars WHERE id=:id";
$prep = $conn->prepare($sql);
$prep->bindParam(":id", $id);
$prep->execute();

header("Location: dashboard.php");

?>
