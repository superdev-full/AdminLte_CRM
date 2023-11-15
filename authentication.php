<?php
session_start();

function isAuthenticated() {
    return isset($_SESSION['AdminLogin']);
}

if (!isAuthenticated()) {
    header('location: index.php');
    exit;
}

?>