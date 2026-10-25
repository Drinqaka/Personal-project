<?php

// Put this at the TOP of ea logged-in use.

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>
