<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Project</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php if (isset($_SESSION['user_id'])) { ?>
<nav class="navbar navbar-expand bg-light border-bottom px-3">
    <a class="navbar-brand" href="dashboard.php">Car Project</a>
    <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Cars</a></li>
        <li class="nav-item"><a class="nav-link" href="myRentals.php">My Rentals</a></li>
        <?php if ($_SESSION['role'] == 'admin') { ?>
            <li class="nav-item"><a class="nav-link" href="addCar.php">Add Car</a></li>
        <?php } ?>
        <li class="nav-item"><a class="nav-link" href="profile.php">Edit Profile</a></li>
    </ul>
    <span class="navbar-text me-3">
        Hello, <?= htmlspecialchars($_SESSION['username']) ?>
        <?php if ($_SESSION['role'] == 'admin') { ?><span class="badge bg-dark">admin</span><?php } ?>
    </span>
    <a class="btn btn-outline-danger btn-sm" href="signout.php">Sign out</a>
</nav>
<?php } ?>
