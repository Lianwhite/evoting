<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Voters registration
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  //Approval
    if(!empty($_POST['submitVote'])){
    try {
        $result = explode("_", $_POST["submitVote"]);
        include 'dbconnect.php';
        if(count($result) > 1){
          //Approval for Candidates
        $data = $conn->prepare("UPDATE candidates SET approval = 1 
        WHERE user_id = :user_id AND position = :position AND party = :party");
      $data->bindParam(':user_id', $result[0]);
      $data->bindParam(':position', $result[1]);
      $data->bindParam(':party', $result[2]);
      $data->execute();
        }else{
          //Approval for partyLeaders
        $data = $conn->prepare("UPDATE partyLeaders SET approval = 1 
        WHERE no = :no");
      $data->bindParam(':no', $result[0]);
      $data->execute();
        }
      echo "Approved Successfully!";
    }catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;
    }

    //Decline
    if(!empty($_POST['decline'])){
      try {
          $result = explode("_", $_POST["decline"]);

          include 'dbconnect.php';
          if(count($result) > 1){
            //Insert into candidates table
          $data = $conn->prepare("UPDATE candidates SET approval = 2 
          WHERE user_id = :user_id AND position = :position AND party = :party");
          $data->bindParam(':user_id', $result[0]);
          $data->bindParam(':position', $result[1]);
          $data->bindParam(':party', $result[2]);
          $data->execute();
          }else{
            //Insert into party leaders table
          $data = $conn->prepare("UPDATE partyLeaders SET approval = 2 
          WHERE no = :no");
          $data->bindParam(':no', $result[0]);
          $data->execute();
          }
        echo "Declined Successfully!";
      }catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
      $conn = null;
      }
    }