<?php

include("auth.php");
include_once("config.php");

$car_id = $_GET['car_id'];

$sql = "SELECT * FROM cars WHERE id=:id";
$prep = $conn->prepare($sql);
$prep->bindParam(":id", $car_id);
$prep->execute();
$car = $prep->fetch();

if (!$car) {
    header("Location: dashboard.php");
    exit();
}

include("header.php");

?>

<div class="container mt-4" style="max-width: 500px;">

    <h1 class="h3 mb-3">Rent: <?= htmlspecialchars($car['brand']) ?> <?= htmlspecialchars($car['model']) ?></h1>
    <p>Price per day: $<?= number_format($car['price_per_day'], 2) ?></p>

    <form action="createRental.php" method="post">
        <input type="hidden" name="car_id" value="<?= $car['id'] ?>">

        <label class="form-label">Number of days (1 - 30)</label>
        <input type="number" class="form-control mb-3" name="days" min="1" max="30" value="1" required>

        <label class="form-label">Start date</label>
        <input type="date" class="form-control mb-3" name="start_date" min="<?= date('Y-m-d') ?>" required>

        <button class="btn btn-success" type="submit" name="submit">Confirm rental</button>
        <a class="btn btn-outline-secondary" href="dashboard.php">Cancel</a>
    </form>

</div>

<?php include("footer.php"); ?>
