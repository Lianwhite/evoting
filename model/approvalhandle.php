<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Voters registration

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  //Approval

    if(!empty($_POST['submitVote'])){

      $result = explode("_", $_POST["submitVote"]);

        if(count($result) > 1){//Approval for Candidates

          $conditions = ["user_id =" => $result[0], "position =" => $result[1], "party =" => $result[2]];

          database::update("candidates", ["approval" => 1], $conditions);

        }else{//Approval for partyLeaders

          database::update("partyLeaders", ["approval" => 1], ["no =" => $result[0]]);

          $userId = database::select("partyLeaders", "user_id", ["no =" => $result[0]]);

          database::update("users", ["partyLeader" => 1], ["id =" => $userId[0]["user_id"]]);

        }

      echo "Approved Successfully!";

    }

    //Decline

    if(!empty($_POST['decline'])){

      $result = explode("_", $_POST["decline"]);

          if(count($result) > 1){//Insert into candidates table

          $conditions = ["user_id =" => $result[0], "position =" => $result[1], "party =" => $result[2]];

          database::update("candidates", ["approval" => 2], $conditions);
          
          }else{//Insert into party leaders table

          database::update("partyLeaders", ["approval" => 2], ["no =" => $result[0]]);
            
          }
        echo "Declined Successfully!";
   
      }
    }