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

    $conditions = ["approval =" => 1, "position =" => $_POST["position"], "election_id is NULL" => ""];

    $result = database::select("candidates", "id", $conditions, "AND");

    if(!$result){

      echo "Error! No Pending Candidates For ".$_POST["position"]." Election";
      
      exit();
    }

    //Check if any active elections for such category

    $today = date('y-m-d', strtotime("today midnight"));

    $columns = "candidates.position";
    
    $conditions = ["DATE(elections.start_date) <=" => $today, 
                    "DATE(elections.end_date) >=" => $today,
                    "candidates.approval =" => 1,
                    "position =" => $_POST["position"]];

    $join = "INNER JOIN elections ON candidates.election_id = elections.election_id";

    $isActive = database::select("candidates",$columns, $conditions, "AND", $join);

    if(!empty($isActive)){

      echo "An election is active for current Position";
      
      exit;
    }
    
    //Insert into elections table and get id
    try {

    $values = ["start_date" => $_POST["start"], "end_date" => $_POST["end"]];

    $election_id = database::insert("elections", $values);

    // Update candidates table

    $conditions = ["approval =" => 1, "position =" => $_POST["position"], "election_id is NULL" => ""];

    database::update("candidates", ["election_id" => $election_id], $conditions);

    echo $_POST["position"]." election Added Successfully!";

    }catch(PDOException $e)
    {
      echo $e->getMessage();
    // echo "An Error Occurred: Please Check your date format and input correctly!";
    }
    
    }else{
        echo "Error:\nAll fields are required.";
    }
    }