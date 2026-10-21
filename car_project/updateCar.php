<?php

include("admin.php");
include_once("config.php");

// UPDATE a car
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $price_per_day = $_POST['price_per_day'];
    $description = $_POST['description'];

    $sql = "UPDATE cars SET brand=:brand, model=:model, year=:year,
            color=:color, price_per_day=:price_per_day, description=:description
            WHERE id=:id";
    $prep = $conn->prepare($sql);
    $prep->bindParam(":brand", $brand);
    $prep->bindParam(":model", $model);
    $prep->bindParam(":year", $year);
    $prep->bindParam(":color", $color);
    $prep->bindParam(":price_per_day", $price_per_day);
    $prep->bindParam(":description", $description);
    $prep->bindParam(":id", $id);
    $prep->execute();

    header("Location: dashboard.php");
}

?>
