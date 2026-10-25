<?php

include("auth.php");
include_once("config.php");

$sql = "SELECT rentals.*, cars.brand, cars.model, cars.price_per_day
        FROM rentals
        JOIN cars ON rentals.car_id = cars.id
        WHERE rentals.user_id = :user_id
        ORDER BY rentals.start_date ASC";
$prep = $conn->prepare($sql);
$prep->bindParam(":user_id", $_SESSION['user_id']);
$prep->execute();
$rentals = $prep->fetchAll();

include("header.php");

?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">My Rentals</h1>
        <a class="btn btn-primary" href="dashboard.php">Rent a car</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Car</th>
                <th>Start date</th>
                <th>Days</th>
                <th>Total</th>
                <th>Rented on</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rentals as $rental) { ?>
                <tr>
                    <td><?= $rental['id'] ?></td>
                    <td><?= htmlspecialchars($rental['brand']) ?> <?= htmlspecialchars($rental['model']) ?></td>
                    <td><?= $rental['start_date'] ?></td>
                    <td><?= $rental['days'] ?></td>
                    <td>$<?= number_format($rental['days'] * $rental['price_per_day'], 2) ?></td>
                    <td><?= $rental['created_at'] ?></td>
                    <td>
                        <a class="btn btn-sm btn-secondary" href="editRental.php?id=<?= $rental['id'] ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="deleteRental.php?id=<?= $rental['id'] ?>"
                           onclick="return confirm('Cancel this rental?')">Cancel</a>
                    </td>
                </tr>
            <?php } ?>

            <?php if (count($rentals) == 0) { ?>
                <tr>
                    <td colspan="7" class="text-center">You have no rentals yet.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include("footer.php"); ?>
