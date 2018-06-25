<?php
session_start();
if(isset($_SESSION["id"])){
    session_unset();
session_destroy();
header('Location: '.$_SERVER['HTTP_REFERER']);
exit();
}else{
    header('Location: '."./index.php");
}