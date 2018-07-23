<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION["user"]) && $_SESSION["user"] == 0) {

    echo "<script>alert('No User found!');</script>";

    unset($_SESSION['user']);
}

if (isset($_SESSION["Ind"]) && $_SESSION["Ind"] == 1) {

    echo "<script>alert('Invalid data!');</script>";

    unset($_SESSION['Ind']);
}

require 'view/register.view.php';
