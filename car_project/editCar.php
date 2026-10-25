<?php

include("admin.php");
include_once("config.php");

$id = $_GET['id'];

$sql = "SELECT * FROM cars WHERE id=:id";
$prep = $conn->prepare($sql);
$prep->bindParam(":id", $id);
$prep->execute();
$car = $prep->fetch();

if (!$car) {
    header("Location: dashboard.php");
    exit();
}

include("header.php");

?>

<div class="container mt-4" style="max-width: 500px;">

    <h1 class="h3 mb-3">Edit Car #<?= $car['id'] ?></h1>

    <form action="updateCar.php" method="post">
        <input type="hidden" name="id" value="<?= $car['id'] ?>">

        <input type="text" class="form-control mb-3" name="brand" placeholder="Brand"
               value="<?= htmlspecialchars($car['brand']) ?>" required>

        <input type="text" class="form-control mb-3" name="model" placeholder="Model"
               value="<?= htmlspecialchars($car['model']) ?>" required>

        <input type="number" class="form-control mb-3" name="year" placeholder="Year" min="1950" max="2100"
               value="<?= $car['year'] ?>" required>

        <input type="text" class="form-control mb-3" name="color" placeholder="Color"
               value="<?= htmlspecialchars($car['color']) ?>" required>

        <input type="number" step="0.01" class="form-control mb-3" name="price_per_day" placeholder="Price per day" min="0"
               value="<?= $car['price_per_day'] ?>" required>

        <textarea class="form-control mb-3" name="description" rows="4"
                  placeholder="Description"><?= htmlspecialchars($car['description']) ?></textarea>

        <button class="btn btn-primary" type="submit" name="submit">Update</button>
        <a class="btn btn-outline-secondary" href="dashboard.php">Cancel</a>
    </form>

</div>

<?php include("footer.php"); ?>
