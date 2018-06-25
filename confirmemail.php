<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if(isset($_GET["code"])){
include 'dbconnect.php';
try {
    
    $code = explode("-", $_GET["code"]);
    $email = $code[0];
    $key = $code[1];

  $data = $conn->prepare("SELECT conf_key, reg_date FROM users WHERE email = :email");
  $data->bindParam(':email', $email);
  $data->execute();
  if($data->rowCount() > 0){
    $result = $data->fetch(PDO::FETCH_ASSOC);

 //Check expiration
 $startdate = $result["reg_date"];
 $expire = strtotime($startdate. ' + 2 weeks');
 $today = strtotime("today midnight");
 if($today >= $expire){
     echo "<script>alert('Confirmation link expired!');</script>";
     exit();
 }
 //Check expiration ends

    if($key == $result["conf_key"]){
        //update status
        $status = 1;
        try {
            $data = $conn->prepare("UPDATE `users` SET status = :status WHERE email = :email");
            $data->bindParam(':status', $status);
            $data->bindParam(':email', $email);
            $data->execute();
            header('Location: '."login.php?vr=1");
            die();

        }catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
    }else{
        header('Location: '."register.php?Ind=1");
            die();
    }
    exit();
    //   if($result["timeout"] != "none"){
    //     $checkoutstatus = "disabled checked"; 
    //   }
    //   $checkinstatus = "disabled checked";
  }else{
    header('Location: '."register.php?user=0");
    die();
  }
  }
  catch(PDOException $e)
      {
          echo "Error: " . $e->getMessage();
      }
  $conn = null;
}