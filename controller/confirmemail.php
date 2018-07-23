<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_GET["code"])){

    session_start();
    
    $code = explode("-", $_GET["code"]);

    $email = $code[0];

    $key = $code[1];

    $result = database::select("users", "conf_key, reg_date", ["email =" => $email]);

  if(!empty($result)){

    $result = $result[0];

    //Check expiration
    $startdate = $result["reg_date"];

    $expire = strtotime($startdate. ' + 2 weeks');

    $today = strtotime("today midnight");

 if($today >= $expire){

    $_SESSION["expired"] = true;

    header('Location: '."register");

     exit();
 }
 //Check expiration ends

    if($key == $result["conf_key"]){
        //update status
        $status = 1;

        database::update("users", ["status =" => $status], ["email =" => $email]);

        $_SESSION["vr"] = 1;

        header('Location: '."login");

        die();

    }else{
        
        $_SESSION["Ind"] = 1;

        header('Location: '."register");

        die();
    }
    exit();

  }else{

    $_SESSION["user"] = 0;

    header('Location: '."register");
    
    die();
  }
  
}