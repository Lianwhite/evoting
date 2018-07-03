<?php
//Voters registration
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['submitDeleteDisable'])){
        $value = explode("_",$_POST['deleteDisable']);
        $action = $value[0];
        $id = $value[1];
        // echo $id."<br>".$candidate_id."<br>".$election_id;
        if($action == "Delete"){
        try {
            //Delete candidate
            include 'dbconnect.php';
            $data = $conn->prepare("DELETE FROM candidates WHERE id = :id");
          $data->bindParam(':id', $id);
          $data->execute();
        }catch(PDOException $e)
        {
        // echo "Error: " . $e->getMessage();
        echo "Error: Something went wrong";
        }
        $conn = null;
    }
    if($action == "Disable"){
        try {
            //Delete candidate
            include 'dbconnect.php';
            $data = $conn->prepare("UPDATE candidates SET disabled = 1 WHERE id = :id");
          $data->bindParam(':id', $id);
          $data->execute();
        }catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    if($action == "Enable"){
        try {
            //Delete candidate
            include 'dbconnect.php';
            $data = $conn->prepare("UPDATE candidates SET disabled = 0 WHERE id = :id");
          $data->bindParam(':id', $id);
          $data->execute();
        }catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    }
}
?>