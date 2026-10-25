<?php

include("auth.php");
include_once("config.php");


$sql = "SELECT * FROM cars ORDER BY id ASC";
$prep = $conn->prepare($sql);
$prep->execute();
$cars = $prep->fetchAll();

include("header.php");

?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Cars</h1>
        <?php if ($_SESSION['role'] == 'admin') { ?>
            <a class="btn btn-primary" href="addCar.php">+ Add Car</a>
        <?php } ?>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Color</th>
                <th>Price per day</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car) { ?>
                <tr>
                    <td><?= $car['id'] ?></td>
                    <td><?= htmlspecialchars($car['brand']) ?></td>
                    <td><?= htmlspecialchars($car['model']) ?></td>
                    <td><?= $car['year'] ?></td>
                    <td><?= htmlspecialchars($car['color']) ?></td>
                    <td>$<?= number_format($car['price_per_day'], 2) ?></td>
                    <td><?= htmlspecialchars($car['description']) ?></td>
                    <td>
                        <a class="btn btn-sm btn-success" href="rent.php?car_id=<?= $car['id'] ?>">Rent</a>

                        <?php if ($_SESSION['role'] == 'admin') { ?>
                            <a class="btn btn-sm btn-secondary" href="editCar.php?id=<?= $car['id'] ?>">Edit</a>
                            <a class="btn btn-sm btn-danger" href="deleteCar.php?id=<?= $car['id'] ?>"
                               onclick="return confirm('Delete this car? Its rentals will be deleted too.')">Delete</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>

            <?php if (count($cars) == 0) { ?>
                <tr>
                    <td colspan="8" class="text-center">There are no cars yet.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include("footer.php"); ?>
