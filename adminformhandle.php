<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Voters registration
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['position']) && !empty($_POST['start']) && !empty($_POST['end'])){
    try {
        //Insert into elections table and get id
        include 'dbconnect.php';
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
    echo "Error: " . $e->getMessage();
    }
    $conn = null;
    }else{
        echo "Error:\nAll fields are required.";
    }
    }