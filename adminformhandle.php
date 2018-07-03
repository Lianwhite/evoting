<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Voters registration
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['position']) && !empty($_POST['start']) && !empty($_POST['end'])){
      //Validate date
      $startResult = explode("/", $_POST["start"]);
      $endResult = explode("/", $_POST["end"]);
      $startstr = $startResult[2].'-'.$startResult[1]."-".$startResult[0];
      $endstr = $endResult[2].'-'.$endResult[1]."-".$endResult[0];
      if(strtotime($startstr) > strtotime($endstr) || strtotime("today midnight") > strtotime($endstr)){
        echo "Error! Expired or Invalid dates are not allowed.";
        exit();
      }

      //Check if pending election exists
      try {
        include 'dbconnect.php';
    // Update candidates table
    $data = $conn->prepare("SELECT id FROM candidates
     WHERE approval = 1 AND election_id is NULL AND position = :position");
      $data->bindParam(':position', $_POST["position"]);
      $data->execute();
      $result = $data->fetchAll();
    }catch(PDOException $e)
    {
    // echo "Error: " . $e->getMessage();
    }

    if(count($result) < 1){
      echo "Erro! No Pending Candidates For ".$_POST["position"]." Election";
      $conn = null;
      exit();
    }
    

    try {
        //Insert into elections table and get id
        $data = $conn->prepare("INSERT INTO elections(start_date, end_date) VALUES(:start, :end)");
      $data->bindParam(':start', $_POST["start"]);
      $data->bindParam(':end', $_POST["end"]);
      $data->execute();
      $election_id = $conn->lastInsertId();

    // Update candidates table
    $data = $conn->prepare("UPDATE candidates SET election_id = :election_id 
    WHERE approval = 1 AND election_id is NULL AND position = :position");
      $data->bindParam(':election_id', $election_id);
      $data->bindParam(':position', $_POST["position"]);
      $data->execute();
      echo $_POST["position"]." election Added Successfully!";
    }catch(PDOException $e)
    {
    // echo "Error: " . $e->getMessage();
    echo "An Error Occurred: Please Check your date format and input correctly!";
    }
    $conn = null;
    }else{
        echo "Error:\nAll fields are required.";
    }
    }