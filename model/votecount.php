<?php
//Vote count
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['submitVote']) && isset($_POST['Votebutton']) && !empty($_POST['submitVote'])){
        
        $value = explode("_",$_POST['submitVote']);
        $id = $value[0];
        $candidate_id = $value[1];
        $election_id = $value[2];
        
        try {
            //Insert into elections table
            $values = array("user_id" => $id,
                            "candidate_id" => $candidate_id,
                            "election_id" => $election_id);

            database::insert("votes", $values);

            //get no of votes and update
            $conditions = array("user_id =" => $candidate_id,
                                "election_id =" => $election_id);
            $result1 = database::select("candidates", "no_votes", $conditions);

            $result1 = $result1[0];

            $no_votes = $result1["no_votes"]+1;

            //Update no of votes in database
            $set = array("no_votes" => $no_votes);

            $conditions = array("user_id =" => $candidate_id,
                                "election_id =" => $election_id);

            database::update("candidates", $set, $conditions);

        }catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
    }
}
?>