<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $formValues = formhandle::validate($_POST);

    if ($formValues["isEmpty"]) {

        echo json_encode($formValues["result"]);
        
        exit;
    }

    //Authenticate user

    $columns = "id, dob, password, status, first_name, last_name, partyLeader, admin";

    $conditions = array("email =" => $formValues["result"]["email"]);

    $userDetails = database::select("users", $columns, $conditions);

    if (empty($userDetails)) {

        echo "No user found.";

        exit;
    }

    $userDetails = $userDetails[0];

    if(!(password_verify($formValues["result"]["password"].$userDetails["dob"], $userDetails["password"]))){

        echo "Incorrect Login details.";

        exit;
    }

    if($userDetails['status'] != 1){

        echo "* Account not Verified! <br> Check your email for verification message.";

        exit;
    }

    $_SESSION["id"] = $userDetails["id"];

    $_SESSION["first_name"] = $userDetails["first_name"];

    $_SESSION["last_name"] = $userDetails["last_name"];
    
    $_SESSION["partyLeader"] = $userDetails["partyLeader"];

    $_SESSION["admin"] = $userDetails["admin"];

    $success["success"] = "ok";

    echo json_encode($success);

}