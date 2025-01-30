<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:/views/login.php');
    exit();
}

$user = $_SESSION['']

?>