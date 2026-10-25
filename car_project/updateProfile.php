<?php

include("auth.php");
include_once("config.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = $_SESSION['user_id'];

    $sql = "SELECT * FROM users WHERE email=:email AND id != :id";
    $check = $conn->prepare($sql);
    $check->bindParam(":email", $email);
    $check->bindParam(":id", $id);
    $check->execute();

    if ($check->rowCount() > 0) {
        echo "This email is already used by another user!";
        header("refresh:2; url=profile.php");
    } else {
        if (empty($password)) {
            $sql = "UPDATE users SET name=:name, surname=:surname, email=:email WHERE id=:id";
            $prep = $conn->prepare($sql);
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE users SET name=:name, surname=:surname, email=:email, password=:password WHERE id=:id";
            $prep = $conn->prepare($sql);
            $prep->bindParam(":password", $hashed_password);
        }

        $prep->bindParam(":name", $name);
        $prep->bindParam(":surname", $surname);
        $prep->bindParam(":email", $email);
        $prep->bindParam(":id", $id);
        $prep->execute();

        echo "Profile updated successfully!";
        header("refresh:2; url=dashboard.php");
    }
}

?>
