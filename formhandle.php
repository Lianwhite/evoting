<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$empty_first = $empty_last = $empty_email = $empty_pass = $passmismatch = $empty_origin = $empty_lga = $loginError = $empty_cred = "";
$empty_first = $noNetwork = $empty_dob = $empty_phone = $empty_voters_id = $empty_address = $empty_gender = $userExists = $empty_passport = "";

//Voters registration
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["votersreg"])){
    function is_connected()
{
    $connected = @fsockopen("www.example.com", 80); 
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}
if(!is_connected()){
    $noNetwork = "Registration not Successful! Please Check your internet connection";
    return;
}

$error = 0;
 if (!empty($_POST['first'])) {
    $first=trim($_POST["first"]);
 }else{
     $error = 1;
     $empty_first="* First Name required.";
 }
 if (!empty($_POST['last'])) {
    $last=trim($_POST["last"]);
 }else{
     $error = 1;
     $empty_last="* Last Name required.";
 }
 if (!empty($_POST['origin'])) {
    $origin = $_POST["origin"];
 }else{
     $error = 1;
     $empty_origin ="* State required.";
 }
 if (isset($_POST['lga']) && !empty($_POST['lga'])) {
    $lga = $_POST["lga"];
 }else{
     $error = 1;
     $empty_lga ="* LGA required.";
 }
 if (!empty($_POST['pass']) && !empty($_POST['passver'])) {
    $pass = password_hash(trim($_POST["pass"]).$_POST["dob"], PASSWORD_BCRYPT);
 }else{
     $error = 1;
     $empty_pass="* Please verify password.";
 }
 if($_POST["pass"] != $_POST["passver"]){
    $passmismatch = "* Password mismatch.";
    $error = 1;
}
 if (!empty($_POST['email'])) {
    $email = trim($_POST["email"]);
 }else{
     $error = 1;
     $empty_email = "* Email required.";
 }
 if (!empty($_POST['phone'])) {
    $phone = trim($_POST["phone"]);
 }else{
     $error = 1;
     $empty_phone = "* Phone number required.";
 }
 if (!empty($_POST['dob'])) {
    $dob = trim($_POST["dob"]);
 }else{
     $error = 1;
     $empty_dob = "* Date of Birth required.";
 }
 if (!empty($_POST['address'])) {
    $address = $_POST["address"];
 }else{
     $error = 1;
     $empty_address = "* Address required.";
 }
 if (isset($_POST['gender']) && !empty($_POST['gender'])) {
    $gender = $_POST["gender"];
 }else{
     $error = 1;
     $empty_gender = "* Gender required.";
 }
//  if (!empty($_FILES["profilepic"]["name"])) {
    
//  }else{
//      $error = 1;
//      $empty_pic = "* Profile Picture required.";
//  }
 if (!empty($_POST["voters_id"])) {
    $voters_id = $_POST["voters_id"];
 }else{
     $error = 1;
     $empty_voters_id = "* Voters ID required.";
 }

 //Check if User already exists
 if(isset($_POST["email"]) && isset($_POST["voters_id"]) && !empty($_POST["email"]) && !empty($_POST["voters_id"])){
 try {
    include 'dbconnect.php';
    $data = $conn->prepare("SELECT first_name FROM users WHERE email = :email OR voters_id = :voters_id");
  $data->bindParam(':email', $email);
  $data->bindParam(':voters_id', $voters_id);
  $data->execute();
  if($data->rowCount() > 0){
    $error = 1;
    $userExists = "* User already Exists!";
  }
  }catch(PDOException $e)
  {
  echo "Error: " . $e->getMessage();
  }
  $conn = null;
}
  //Final Action

 if($error == 0){
    include 'dbconnect.php';
    $date = date("y/m/d");
    $conf = md5(microtime().rand());
    try {
        $query = "INSERT INTO users (first_name, last_name, origin, lga, dob, phone, email, voters_id, password, gender, address, conf_key, reg_date)
        VALUES (:first_name, :last_name, :origin, :lga, :dob, :phone, :email, :voters_id, :password, :gender, :address, :conf_key, :reg_date)";
        // prepare sql and bind parameters
        $data = $conn->prepare($query);
            $data->bindParam(':first_name', $first);
            $data->bindParam(':last_name', $last);
            $data->bindParam(':origin', $origin);
            $data->bindParam(':password', $pass);
            $data->bindParam(':lga', $lga);
            $data->bindParam(':dob', $dob);
            $data->bindParam(':phone', $phone);
            $data->bindParam(':email', $email);
            $data->bindParam(':gender', $gender);
            $data->bindParam(':address', $address);
            $data->bindParam(':voters_id', $voters_id);
            $data->bindParam(':conf_key', $conf);
            $data->bindParam(':reg_date', $date);
        //execute query to insert into row
        $data->execute();
        //get user ID
        $last_id = $conn->lastInsertId();
        // echo "Saved Successfully";


        //Sendout Verification Email
$to = $email;

// Subject
$subject = 'Confirm Email eVoTiNg';

// Message
$message = '
<html>
<head>
  <title>eVoTiNg Confirmation email</title>
</head>
<body style="text-align: center;">
  <p style="font-size: 20px; font-weight: bold; color: rgb(79, 41, 114);">Thank you for registering with us.!</p>
  <p>Please <b><a href="localhost/Second_project/e_voting/confirmemail.php?code='.$email."-".$conf.'">CLICK HERE</a></b> to confirm your email.</p>
  <p><i>You recieved this email because you recently signed up at <a href="www.evoting.ng">www.evoting.ng</a>. If you do not know about this action, kindly ignore this email.</i></p>
</body>
</html>
';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: eVoTiNg <admin@evoting.com>' . "\r\n";

// Mail it

if (!mail($to, $subject, $message, $headers)) {
    print_r(error_get_last());
}else{
    echo "<script>alert('Registration Succesful! Check your Email for Account verification.');</script>";
}
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
 }

// goto a;
 
}


//Login
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["login"])){
    
    $error = 0;
    if (!empty($_POST['email'])) {
       $email = trim($_POST["email"]);
    }else{
        $error = 1;
        $empty_email = "* Email required.";
    }
    if (!empty($_POST['password'])) {
       $pass = $_POST["password"];
    }else{
        $error = 1;
        $empty_pass = "* Password required.";
    }

    if($error == 0){
        try {
            include 'dbconnect.php';
            $data = $conn->prepare("SELECT id, dob, password, status, first_name, last_name, partyLeader FROM users WHERE email = :email");
          $data->bindParam(':email', $email);
          $data->execute();
          $result = $data->fetch(PDO::FETCH_ASSOC);
        $conn = null;
          if($data->rowCount() > 0 && password_verify(trim($pass).$result["dob"], $result["password"])){  
              if($result['status'] == 1){
                session_start();
                $_SESSION["id"] = $result["id"];
                $_SESSION["first_name"] = $result["first_name"];
                $_SESSION["last_name"] = $result["last_name"];
                $_SESSION["partyLeader"] = $result["partyLeader"];

                header('Location: '."index.php");
                die();
              }   else{
                $loginError = "* Account not Verified! <br> Check your email for verification message.";
              } 
            
          }else{
            $loginError = "* Incorrect Login details.";
          }
          }catch(PDOException $e)
          {
          echo "Error: " . $e->getMessage();
          }
    }
}

//Party Leaders Registration
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["email"]) && !empty($_POST["password"]) 
&& !empty($_FILES["passport"]["name"]) && !empty($_FILES["cred"]["name"])) {
        //Fetch Id
        include 'dbconnect.php';
        try {
            // prepare sql and bind parameters
            $data = $conn->prepare("SELECT id, dob, password FROM users WHERE email = :email");
            $data->bindParam(':email', $_POST["email"]);
            //execute query to insert into row
            $data->execute();
            $result = $data->fetch(PDO::FETCH_ASSOC );
            $id = $result['id'];
            }
        catch(PDOException $e)
            {
            echo "Error: " . $e->getMessage();
            }
if($data->rowCount() > 0){
    if(!password_verify(trim($_POST["password"]).$result["dob"], $result["password"])){
        echo "Wrong login details!";
        exit();
    }
    $target_dir = "uploads/";
$target_file = str_replace(" ", "_", $target_dir . $_FILES["passport"]["name"]);
$target_file1 = str_replace(" ", "_", $target_dir . $_FILES["cred"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["passport"]["tmp_name"]);
    $check1 = getimagesize($_FILES["cred"]["tmp_name"]);
    if($check !== false && $check1 !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}
if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
&& $imageFileType1 != "gif" ) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. \n Note: Only Images are accepted!";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file) 
    && move_uploaded_file($_FILES["cred"]["tmp_name"], $target_file1)) {
        try {
            // prepare sql and bind parameters
            $date = date("y/m/d");
            // $value = 1;
            // $sql_query = "
            // INSERT INTO partyLeaders(user_id, passport, credential, party, date)  
            // VALUES(:user_id, :passport, :credential, :party, :date ); 
            // UPDATE users SET partyLeader = :value WHERE id = :user_id; 
            // ";
            $sql_query = "INSERT INTO partyLeaders(user_id, passport, credential, party, date)  
            VALUES(:user_id, :passport, :credential, :party, :date )"; 
            $data = $conn->prepare($sql_query);
            $data->bindParam(':user_id', $id);
            $data->bindParam(':passport', $target_file);
            $data->bindParam(':credential', $target_file1);
            $data->bindParam(':party', $_POST["party"]);
            $data->bindParam(':date', $date);
            // $data->bindParam(':value', $value);
            //execute query to insert into row
            $data->execute();
            echo "Registration Successful. \nAwaiting Approval from admin.\nCheck back later.";
            }
        catch(PDOException $e)
            {
            echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        
    }
    
    
}else{
    echo "No account for User. \nPlease Register!";
}
$conn = null;
}




//Candidates Registration
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["emailr"]) && !empty($_POST["position"]) 
&& !empty($_FILES["passportr"]["name"]) && !empty($_FILES["credr"]["name"])) {
     //Fetch Id and party
     session_start();
    //  echo $_SESSION["id"];
    //  exit();
     include 'dbconnect.php';
     try {
         // sql Multi query
         $sql_multi_query = "SELECT id FROM users WHERE email = :email;
         SELECT party FROM partyLeaders WHERE user_id = :id;";
         $data = $conn->prepare($sql_multi_query);
         $data->bindParam(':email', $_POST["emailr"]);
         $data->bindParam(':id', $_SESSION["id"]);
         //execute query to insert into row
         $data->execute();
         $result = $data->fetch(PDO::FETCH_ASSOC );
         $data->nextRowset();
         $result1 = $data->fetch(PDO::FETCH_ASSOC );
         $id = $result['id'];
        $party = $result1['party'];
         }
     catch(PDOException $e)
         {
         echo "Error: " . $e->getMessage();
         }
if($result){
 $target_dir = "uploads/";
$target_file = str_replace(" ", "_", $target_dir . $_FILES["passportr"]["name"]);
$target_file1 = str_replace(" ", "_", $target_dir . $_FILES["credr"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
 $check = getimagesize($_FILES["passportr"]["tmp_name"]);
 $check1 = getimagesize($_FILES["credr"]["tmp_name"]);
 if($check !== false && $check1 !== false) {
     $uploadOk = 1;
 } else {
     $uploadOk = 0;
 }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 $uploadOk = 0;
}
if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
&& $imageFileType1 != "gif" ) {
 $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 echo "Sorry, your file was not uploaded. \n Note: Only Images are accepted!";
// if everything is ok, try to upload file
} else {
 if (move_uploaded_file($_FILES["passportr"]["tmp_name"], $target_file) 
 && move_uploaded_file($_FILES["credr"]["tmp_name"], $target_file1)) {
     try {
         // prepare sql and bind parameters
         $date = date("y/m/d");
         // $value = 1;
         // $sql_query = "
         // INSERT INTO partyLeaders(user_id, passport, credential, party, date)  
         // VALUES(:user_id, :passport, :credential, :party, :date ); 
         // UPDATE users SET partyLeader = :value WHERE id = :user_id; 
         // ";
         $sql_query = "INSERT INTO candidates(user_id, passport, credential, position, party, date)  
         VALUES(:id, :passport, :credential, :position, :party, :date )"; 
         $data = $conn->prepare($sql_query);
         $data->bindParam(':id', $id);
         $data->bindParam(':passport', $target_file);
         $data->bindParam(':credential', $target_file1);
         $data->bindParam(':position', $_POST["position"]);
         $data->bindParam(':party', $party);
         $data->bindParam(':date', $date);
         // $data->bindParam(':value', $value);+
         //execute query to insert into row
         $data->execute();
         echo "Registration Successful. \nAwaiting Approval from admin.\nCheck back later.";
         }
     catch(PDOException $e)
         {
         echo "Error: " . $e->getMessage();
         }
     } else {
         echo "Sorry, there was an error uploading your file.";
     }
     
 }
 
 
}else{
 echo "Candidate is not an eVoTiNg User.";
}
$conn = null;
}
//     // a:
//     $_POST["leader"] = 1;
    
// //Insert for Party leaders
// if(isset($_POST["leader"]) && $_POST["leader"] == 1){
//     // $last_id = 4;
//     $passport = "ldkkmkksls.jpg";
//     $credential = "ijolklkmlk;.jpg";
//     $_POST["party"] = "PDP";
//     $leader_status = 1;

//     try {
//         $query = "INSERT INTO candidates (id, passport, credential, party, date, leader_status)
//         VALUES (:id, :passport, :credential, :party, :date, :leader_status)";
//         // prepare sql and bind parameters
//         $data = $conn->prepare($query);
//             $data->bindParam(':id', $last_id);
//             $data->bindParam(':passport', $passport);
//             $data->bindParam(':credential', $credential);
//             $data->bindParam(':party', $_POST["party"]);
//             $data->bindParam(':date', $date);
//             $data->bindParam(':leader_status', $leader_status);
//             //execute query to insert into row
//             $data->execute();
//             // echo "Saved Successfully";
//         }
//     catch(PDOException $e)
//         {
//         echo "Error: " . $e->getMessage();
//         }
// }
// a:
// return false;