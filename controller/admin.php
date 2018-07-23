<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$isAdmin = (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1)? true:false;

if(!$isAdmin){
    header("Location: ./");
    die();
}

include 'model/deleteDisable.php';

    //fetch candidates

    $today = date('y-m-d', strtotime("today midnight"));

    $columns = "candidates.id, users.first_name, users.last_name, candidates.passport, candidates.position, candidates.party, candidates.disabled";
    
    $conditions = ["DATE(elections.start_date) <=" => $today, 
                    "DATE(elections.end_date) >=" => $today,
                    "candidates.approval =" => 1];

    $join = "INNER JOIN candidates ON users.id = candidates.user_id
            INNER JOIN elections ON candidates.election_id = elections.election_id";

    $result = database::select("users",$columns, $conditions, "AND", $join);

    //fetch candidates approval notification

    $columns = "users.id, users.first_name, users.last_name, users.dob, 
                candidates.passport, candidates.credential, candidates.position, candidates.party ";
    
    $conditions = ["approval =" => 0];

    $join = "INNER JOIN candidates ON users.id = candidates.user_id";

    $result1 = database::select("users",$columns, $conditions, "AND", $join);

    //fetch partyLeaders approval notification

    $columns = "users.id, users.first_name, users.last_name, partyLeaders.no, 
                partyLeaders.passport, partyLeaders.credential, partyLeaders.party";
    
    $conditions = ["approval =" => 0];

    $join = "INNER JOIN partyLeaders ON users.id = partyLeaders.user_id";

    $result2 = database::select("users",$columns, $conditions, "AND", $join);

    //fetch pending elections

    $columns = "candidates.id, users.first_name, users.last_name, candidates.passport, 
                candidates.position, candidates.party, candidates.disabled";
    
    $conditions = ["candidates.approval =" => 1, "candidates.election_id is NULL" => ""];

    $join = "INNER JOIN candidates ON users.id = candidates.user_id";

    $result3 = database::select("users",$columns, $conditions, "AND", $join);

    //prepare approval notifications

    if ($result1) {

        if (count($result1) == count($result1, COUNT_RECURSIVE)) {//is not multidimensional
    
            $candidates[0] = $result1;
    
            $candidatesapprovalCount = 1;
    
        } else {//is multidimensional
    
            $candidates = $result1;
    
            $candidatesapprovalCount = count($result1);
        }
    }
    if ($result2) {
    
        if (count($result2) == count($result2, COUNT_RECURSIVE)) {//is not multidimensional
    
            $partyLeaders[0] = $result2;
    
            $partyleadersapprovalCount = 1;
    
        } else {//is multidimensional
    
            $partyLeaders = $result2;
    
            $partyleadersapprovalCount = count($result2);
        }
        
    }
    
    @$totalApproval = $partyleadersapprovalCount + $candidatesapprovalCount;

require 'view/admin.view.php';
?>