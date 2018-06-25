<?php
//Voters registration
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submitVote']) && isset($_POST['Votebutton']) && !empty($_POST['submitVote'])){
        $value = explode("_",$_POST['submitVote']);
        $id = $value[0];
        $candidate_id = $value[1];
        $election_id = $value[2];
        // echo $id."<br>".$candidate_id."<br>".$election_id;
        try {
            //Insert into elections table and get id
            //Fetch no votes
            include 'dbconnect.php';
            $data = $conn->prepare("INSERT INTO votes(user_id, candidate_id, election_id) 
            VALUES(:user_id, :candidate_id, :election_id);
            SELECT no_votes FROM candidates WHERE user_id = :candidate_id AND election_id = :election_id;");
          $data->bindParam(':user_id', $id);
          $data->bindParam(':candidate_id', $candidate_id);
          $data->bindParam(':election_id', $election_id);
          $data->execute();
          $data->nextRowset();
        $result1 = $data->fetch(PDO::FETCH_ASSOC);

        //insert no votes
        $no_votes = $result1["no_votes"]+1;
        $data = $conn->prepare("UPDATE candidates SET no_votes = :no_votes WHERE user_id = :candidate_id AND election_id = :election_id");
          $data->bindParam(':no_votes', $no_votes);
          $data->bindParam(':candidate_id', $candidate_id);
          $data->bindParam(':election_id', $election_id);
          $data->execute();
        }catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}
?>