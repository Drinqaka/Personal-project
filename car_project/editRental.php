<?php

include("auth.php");
include_once("config.php");

$id = $_GET['id'];

$sql = "SELECT rentals.*, cars.brand, cars.model
        FROM rentals
        JOIN cars ON rentals.car_id = cars.id
        WHERE rentals.id = :id AND rentals.user_id = :user_id";
$prep = $conn->prepare($sql);
$prep->bindParam(":id", $id);
$prep->bindParam(":user_id", $_SESSION['user_id']);
$prep->execute();
$rental = $prep->fetch();

if (!$rental) {
    header("Location: myRentals.php");
    exit();
}

include("header.php");

?>

<div class="container mt-4" style="max-width: 500px;">

    <h1 class="h3 mb-3">Edit Rental: <?= htmlspecialchars($rental['brand']) ?> <?= htmlspecialchars($rental['model']) ?></h1>

    <form action="updateRental.php" method="post">
        <input type="hidden" name="id" value="<?= $rental['id'] ?>">

        <label class="form-label">Number of days (1 - 30)</label>
        <input type="number" class="form-control mb-3" name="days" min="1" max="30"
               value="<?= $rental['days'] ?>" required>

        <label class="form-label">Start date</label>
        <input type="date" class="form-control mb-3" name="start_date" min="<?= date('Y-m-d') ?>"
               value="<?= $rental['start_date'] ?>" required>

        <button class="btn btn-primary" type="submit" name="submit">Update</button>
        <a class="btn btn-outline-secondary" href="myRentals.php">Cancel</a>
    </form>

</div>

<?php include("footer.php"); ?>
