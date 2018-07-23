<?php

class formhandle
{
    public static function validate($post)
    {
        $emptyArr = [];

        foreach ($post as $key => $value) {

            if (!isset($value) || empty($value)) {

                $name = ucwords(str_replace("_", " ", $key));
                
                $emptyArr["empty_{$key}"] = "* {$name} required.";
            }
        }
        if (isset($post["confirm_password"]) && $post["password"] != $post["confirm_password"]) {

            $emptyArr["passwordmismatch"] = "* Password mismatch.";
        }
        if (!empty($emptyArr)) {

            $result["isEmpty"] = true;

            $result["result"] = $emptyArr;

            return $result;
        }

        $valuesArr = [];

        foreach ($post as $key => $value) {

            $valuesArr["{$key}"] = htmlspecialchars(trim($value));
        }

        $result["isEmpty"] = false;

        $result["result"] = $valuesArr;

        return $result;
    }




    public static function userExist($email, $other = "", $type = "")
    {
        if (empty($other)) {

            $conditions = array("email =" => $email);

        } else {
            $conditions = array("email =" => $email, "voters_id =" => $other);
        }
        //Check if User already exists
        try {
            $result = database::select("users", "first_name", $conditions, "{$type}");

            if (!empty($result)) {

                $userExists = "* User already Exists!";

                return $userExists;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }



    public static function saveAndSendEmail($formValues)
    {
        $date = date("y/m/d");

        $conf = md5(microtime().rand());

        $password = password_hash(trim($formValues['password']).trim($formValues['DOB']), PASSWORD_BCRYPT);

        $values = array("first_name" => $formValues['first_name'], "last_name" => $formValues["last_name"],
                        "origin" => $formValues["state"], "lga" => $formValues["LGA"],
                        "dob" => $formValues["DOB"], "phone" => $formValues["phone"],
                        "email" => $formValues["email"], "voters_id" => $formValues["voters_id"],
                        "password" => $password, "gender" => $formValues["gender"],
                        "address" => $formValues["address"], "conf_key" => $conf, "reg_date" => $date);
        try {
            database::insert("users", $values);

            $SendEmail = new sendmail($formValues["email"], $conf);

            return $SendEmail->send();

        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }


    public static function uploadImage($file, $target_dir)
    {
        $target_file = str_replace(" ", "_", $target_dir . $file["name"]);

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file size
        
        if ($file["size"] > 2000000) {

            $error[] = true;

            $error[] = "Sorry, your file is too large.";

            return $error;
        }

        // Check if image file is an actual image or fake image

        $check = getimagesize($file["tmp_name"]);

        if ($check == false) {

            $error["error"] = true;

            $error["response"] = "Only Image files are allowed";

            return $error;
        }

        if (move_uploaded_file($file["tmp_name"], $target_file)) {

            $error["error"] = false;

            $error["response"] = str_replace(" ", "_", $file["name"]);

            return $error;

        } else {

            $error["error"] = true;

            $error["response"] = "Something went wrong. Please try again";

            return $error;
        }
    }
}
