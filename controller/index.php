<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// require __DIR__. '/../model/database.php';
require 'model/votecount.php';

$loggedin = (isset($_SESSION["id"]))? 1:0;

try {
    //Vote validation
    $today = date('Y-m-d', strtotime("today midnight"));
    
    if($loggedin == 1){

    $tableName = "elections";
    $columns = "elections.*, votes.user_id";

    $conditions = array("DATE(start_date) <=" => $today,
                        "DATE(end_date) >=" => $today,
                        "user_id =" => $_SESSION["id"]);

    $join = "INNER JOIN votes ON votes.election_id = elections.election_id";

    $resultvoted = database::select($tableName, $columns, $conditions, "AND", $join);

    $voted = (!empty($resultvoted))?true:false;
}

    //Fetch candidates
    $tableName = "users";

    $columns = "users.id, users.first_name, users.last_name, candidates.passport, 
    candidates.position, candidates.party, candidates.election_id, candidates.no_votes";

    $conditions = array("DATE(elections.start_date) <=" => $today,
                        "DATE(elections.end_date) >=" => $today,
                        "candidates.disabled =" => 0);
    
    $join = "INNER JOIN candidates ON users.id = candidates.user_id 
            INNER JOIN elections ON candidates.election_id = elections.election_id";

    $result = database::select($tableName, $columns, $conditions, "AND", $join);

}catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}

require 'view/index.view.php';