<?php

include_once("config.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($surname) || empty($username) || empty($email) || empty($password)) {
        echo "You need to fill all data";
        header("refresh:2; url=signup.php");
    } else {
        $sql = "SELECT * FROM users WHERE email=:email OR username=:username";
        $check = $conn->prepare($sql);
        $check->bindParam(":email", $email);
        $check->bindParam(":username", $username);
        $check->execute();

        if ($check->rowCount() > 0) {
            echo "This username or email already exists!";
            header("refresh:2; url=signup.php");
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO users(name,surname,username,email,password)
                    VALUES (:name,:surname,:username,:email,:password)";
            $insert = $conn->prepare($sql);
            $insert->bindParam(":name", $name);
            $insert->bindParam(":surname", $surname);
            $insert->bindParam(":username", $username);
            $insert->bindParam(":email", $email);
            $insert->bindParam(":password", $hashed_password);
            $insert->execute();

            echo "New user is created successfully!";
            header("refresh:2; url=login.php");
        }
    }
}

?>
