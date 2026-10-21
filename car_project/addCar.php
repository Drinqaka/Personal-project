<?php

include("admin.php");
include("header.php");

?>

<div class="container mt-4" style="max-width: 500px;">

    <h1 class="h3 mb-3">Add Car</h1>

    <form action="createCar.php" method="post">
        <input type="text" class="form-control mb-3" name="brand" placeholder="Brand (e.g. BMW)" required>

        <input type="text" class="form-control mb-3" name="model" placeholder="Model (e.g. 320d)" required>

        <input type="number" class="form-control mb-3" name="year" placeholder="Year" min="1950" max="2100" required>

        <input type="text" class="form-control mb-3" name="color" placeholder="Color" required>

        <input type="number" step="0.01" class="form-control mb-3" name="price_per_day" placeholder="Price per day" min="0" required>

        <textarea class="form-control mb-3" name="description" rows="4" placeholder="Description"></textarea>

        <button class="btn btn-primary" type="submit" name="submit">Save</button>
        <a class="btn btn-outline-secondary" href="dashboard.php">Cancel</a>
    </form>

</div>

<?php include("footer.php"); ?>
