<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();
    
    if (!isset($_SESSION["id"])) {

        echo "Not Logged in";
        exit;
    }

    $formValues = formhandle::validate($_POST);

    if ($formValues["isEmpty"]) {

        echo json_encode($formValues["result"]);
        exit;
    }
    $error = [];

    if ($_FILES["passport"]['error'] > UPLOAD_ERR_OK) {

        $error["empty_passport"] = "* Passport required";
    }
    if ($_FILES["cred"]['error'] > UPLOAD_ERR_OK) {

        $error["empty_cred"] = "* Credentials required";
    }
    if (!empty($error)) {

        echo json_encode($error);
        exit;
    }

    //Authenticate user

    $id = database::select("users", "id", array("email =" => $formValues["result"]["email"]));

    if (empty($id)) {

        echo "User not Registered.";
        exit;
    }

    $id = $id[0];

    //get party

    $party = database::select("partyLeaders", "party", array("user_id =" => $_SESSION["id"]));

    $party = $party[0];

    //Check any Pending or active approval

    $conditions = array("user_id =" => $id["id"], "position =" => $formValues["result"]["position"],
        "party =" => $party["party"], "(approval = 0 OR approval = 1)" => "");

    $pendingApproval = database::select("candidates", "id", $conditions);

    if (!empty($pendingApproval)) {

        echo "An Application for this position is pending or active!";

        exit;
    }

    //Check for multiple application

    $conditions = array("user_id =" => $id["id"],
        "election_id is NULL" => "");

    $pendingApproval = database::select("candidates", "id", $conditions);

    if (!empty($pendingApproval)) {

        echo "User already have a pending or active position!";

        exit;
    }

    //Check if users account is verified

    $conditions = array("id =" => $id["id"]);

    $pendingApproval = database::select("users", "status", $conditions);

    $pendingApproval = $pendingApproval[0];

    if(!$pendingApproval["status"]){

        echo "Users account not verified!";

        exit;
    }

    //Upload image

    $passport = formhandle::uploadImage($_FILES["passport"], "view/uploads/");

    if ($passport["error"]) {

        echo $passport["response"];

        exit;
    }

    $credentials = formhandle::uploadImage($_FILES["cred"], "view/uploads/");

    if ($credentials["error"]) {
        
        echo $credentials["response"];

        exit;
    }

    //insert into database

    $date = date("y/m/d");
        
    $value = array("user_id" => $id["id"], "passport" => $passport["response"],
                        "credential" => $credentials["response"], "position" => $formValues["result"]["position"],
                        "party" => $party["party"], "date" => $date);

    database::insert("candidates", $value);
        
    $success["success"] = "Submission Successful. \nAwaiting Approval from admin.";

    echo json_encode($success);
}
