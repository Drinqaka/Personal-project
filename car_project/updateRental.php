<?php

include("auth.php");
include_once("config.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $days = $_POST['days'];
    $start_date = $_POST['start_date'];

    if (empty($days) || empty($start_date) || $days < 1 || $days > 30) {
        echo "Please fill all data correctly";
        header("refresh:2; url=myRentals.php");
    } else {
        $sql = "UPDATE rentals SET days=:days, start_date=:start_date
                WHERE id=:id AND user_id=:user_id";
        $prep = $conn->prepare($sql);
        $prep->bindParam(":days", $days);
        $prep->bindParam(":start_date", $start_date);
        $prep->bindParam(":id", $id);
        $prep->bindParam(":user_id", $_SESSION['user_id']);
        $prep->execute();

        header("Location: myRentals.php");
    }
}

?>
