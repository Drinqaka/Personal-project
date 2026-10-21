<?php

// Put this at the TOP of every page that needs a logged-in user.

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>
