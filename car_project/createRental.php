<?php

include("auth.php");
include_once("config.php");

// CREATE a rental
if (isset($_POST['submit'])) {
    $car_id = $_POST['car_id'];
    $days = $_POST['days'];
    $start_date = $_POST['start_date'];
    $user_id = $_SESSION['user_id'];

    if (empty($car_id) || empty($days) || empty($start_date) || $days < 1 || $days > 30) {
        echo "Please fill all data correctly";
        header("refresh:2; url=dashboard.php");
    } else {
        $sql = "INSERT INTO rentals(user_id,car_id,days,start_date)
                VALUES (:user_id,:car_id,:days,:start_date)";
        $prep = $conn->prepare($sql);
        $prep->bindParam(":user_id", $user_id);
        $prep->bindParam(":car_id", $car_id);
        $prep->bindParam(":days", $days);
        $prep->bindParam(":start_date", $start_date);
        $prep->execute();

        header("Location: myRentals.php");
    }
}

?>
