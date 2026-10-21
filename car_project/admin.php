<?php

// Put this at the TOP of pages only an admin can use.
// It checks the login first, then checks the role.

include("auth.php");

if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit();
}

?>
