<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {   

    if (!checkconnection::isConnected()) {

        echo  "Registration not Successful! Please Check your internet connection";
        exit;
    }

        $formValues = formhandle::validate($_POST);

        if ($formValues["isEmpty"]) {

            $formValues["result"]["register_error"] = "* Error Occurred!";

            echo json_encode($formValues["result"]);
            
            exit;
            
        }
        
        //Check if user already exists

        $conditions = array("email =" => $formValues["result"]["email"], 
                    "voters_id =" => $formValues["result"]["voters_id"]);

        $isUserExist = database::select("users", "email", $conditions, "OR");

            if (!empty($isUserExist)) {

                echo "User already exists!";

                exit;
            }

            $isSuccess = formhandle::saveAndSendEmail($formValues["result"]);

            if($isSuccess){

                $success["success"] = "Registration Succesful! Check your Email for Account verification.";

                echo json_encode($success);
                
            }else{
                echo "error Occured!";
            }
            
}