<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION["vr"]) && $_SESSION["vr"] == 1) {

    echo "<script>alert('Email Verification Successful');</script>";

    unset($_SESSION["vr"]);
}

require 'view/login.view.php';