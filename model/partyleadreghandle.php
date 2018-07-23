<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $formValues = formhandle::validate($_POST);

        if ($formValues["isEmpty"]) {

            echo json_encode($formValues["result"]);
            exit;
        }
        $error = [];
        if($_FILES["passport"]['error'] > UPLOAD_ERR_OK){

            $error["empty_passport"] = "* Passport required";
        }
        if($_FILES["passport"]['error'] > UPLOAD_ERR_OK){

            $error["empty_cred"] = "* Credentials required";
        }
        if(!empty($error)){
            
            echo json_encode($error);
            exit;
        }
        
        //Authenticate and fetch user id
        $condition = array("email =" => $formValues["result"]["email"]);

        $userDetails = database::select("users", "id, dob, password", $condition);

        if(empty($userDetails)){

            echo "No User found! Please register.";

            exit;
        }

        $userDetails = $userDetails[0];
        
        if(!password_verify($formValues["result"]["password"].$userDetails["dob"], $userDetails["password"])){

            echo "Wrong login details!";

            exit();
        }

        //Pending approval application

        $conditions = array("user_id =" => $userDetails["id"], "approval =" => 0);

        $userExistResult = database::select("partyLeaders", "no", $conditions);

        if(!empty($userExistResult)){

            echo "Your Application is pending approval!";
            exit;
        }
        
        //Already a partyLeader

        $conditions = array("user_id =" => $userDetails["id"], "approval =" => 1);

        $userExistResult = database::select("partyLeaders", "no", $conditions);

        if(!empty($userExistResult)){

            echo "User already a party leader!";
            exit;
        }
        
        //Upload image

        $passport = formhandle::uploadImage($_FILES["passport"], "view/uploads/");

        if($passport["error"]){

            echo $passport["response"];

            exit;
        }

        $credentials = formhandle::uploadImage($_FILES["cred"], "view/uploads/");

        if($credentials["error"]){

            echo $credentials["response"];

            exit;
        }

        //insert into database

        $date = date("y/m/d");
        
        $value = array("user_id" => $userDetails["id"], "passport" => $passport["response"],
                        "credential" => $credentials["response"],
                        "party" => $formValues["result"]["party"], "date" => $date);

        database::insert("partyLeaders", $value);
        
        $success["success"] = "Registration Successful. \nAwaiting Approval from admin.";

        echo json_encode($success);
    
}