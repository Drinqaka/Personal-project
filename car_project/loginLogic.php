<?php

session_start();
include_once("config.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "You need to fill all data";
        header("refresh:2; url=login.php");
    } else {
        $sql = "SELECT * FROM users WHERE username=:username";
        $prep = $conn->prepare($sql);
        $prep->bindParam(":username", $username);
        $prep->execute();

        if ($prep->rowCount() > 0) {
            $user = $prep->fetch();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: dashboard.php");
            } else {
                echo "Password incorrect";
                header("refresh:2; url=login.php");
            }
        } else {
            echo "No user found with this username";
            header("refresh:2; url=login.php");
        }
    }
}

?>
