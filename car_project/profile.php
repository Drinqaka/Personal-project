<?php

include("auth.php");
include_once("config.php");

// Get the current data of the logged-in user
$sql = "SELECT * FROM users WHERE id=:id";
$prep = $conn->prepare($sql);
$prep->bindParam(":id", $_SESSION['user_id']);
$prep->execute();
$user = $prep->fetch();

include("header.php");

?>

<div class="container mt-4" style="max-width: 500px;">

    <h1 class="h3 mb-3">Edit Profile</h1>

    <form action="updateProfile.php" method="post">
        <input type="text" class="form-control mb-3" name="name" placeholder="Name"
               value="<?= htmlspecialchars($user['name']) ?>" required>

        <input type="text" class="form-control mb-3" name="surname" placeholder="Surname"
               value="<?= htmlspecialchars($user['surname']) ?>" required>

        <input type="email" class="form-control mb-3" name="email" placeholder="Email"
               value="<?= htmlspecialchars($user['email']) ?>" required>

        <input type="password" class="form-control mb-3" name="password"
               placeholder="New password (leave empty to keep the old one)">

        <button class="btn btn-primary" type="submit" name="submit">Save changes</button>
        <a class="btn btn-outline-secondary" href="dashboard.php">Cancel</a>
    </form>

</div>

<?php include("footer.php"); ?>
