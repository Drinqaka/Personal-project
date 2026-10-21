<?php

include("auth.php");
include_once("config.php");

$id = $_GET['id'];

// DELETE a rental (only if it belongs to the logged-in user)
$sql = "DELETE FROM rentals WHERE id=:id AND user_id=:user_id";
$prep = $conn->prepare($sql);
$prep->bindParam(":id", $id);
$prep->bindParam(":user_id", $_SESSION['user_id']);
$prep->execute();

header("Location: myRentals.php");

?>
