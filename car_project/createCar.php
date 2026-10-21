<?php

include("admin.php");
include_once("config.php");

// CREATE a car
if (isset($_POST['submit'])) {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $price_per_day = $_POST['price_per_day'];
    $description = $_POST['description'];

    if (empty($brand) || empty($model) || empty($year) || empty($color) || $price_per_day === "") {
        echo "You need to fill all data";
        header("refresh:2; url=addCar.php");
    } else {
        $sql = "INSERT INTO cars(brand,model,year,color,price_per_day,description)
                VALUES (:brand,:model,:year,:color,:price_per_day,:description)";
        $prep = $conn->prepare($sql);
        $prep->bindParam(":brand", $brand);
        $prep->bindParam(":model", $model);
        $prep->bindParam(":year", $year);
        $prep->bindParam(":color", $color);
        $prep->bindParam(":price_per_day", $price_per_day);
        $prep->bindParam(":description", $description);
        $prep->execute();

        header("Location: dashboard.php");
    }
}

?>
