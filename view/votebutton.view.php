<?php
if($loggedin == 1){
    if($voted){
        $votecheck = 0;
        foreach($resultvoted as $resultvotes){
            if($resultvotes["election_id"] == $output["election_id"]){
                $votecheck = 1;
            }
        }
        if($votecheck == 1){
            echo '<li class="list-group-item justify-content-center align-items-center">
            <!-- <button class="btn custom-radio"></button> -->
            <div class="btn-group-toggle">
                <label class="voted-btn btn expand">
                    <input type="radio" name="first5" id="option1"> Voted
                </label>
            </div>
            </li>';
        }else{
            goto a;
        }
    }else{
        a:
        echo '<li class="list-group-item justify-content-center align-items-center">
        <!-- <button class="btn custom-radio"></button> -->
        <div class="btn-group-toggle" data-toggle="modal" data-target="#'.$output["id"].'_'.$output["election_id"].'">
            <label class="vote-btn btn expand">
                <input type="radio" name="first5" id="option1"> Vote
            </label>
        </div>
        </li>
        <!-- Button trigger modal -->
        
        <!-- Modal -->
        <div class="modal fade" id="'.$output["id"].'_'.$output["election_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Vote</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Confirm vote for '.$output["first_name"].' '.$output["last_name"].' in '.$position.' election?
            <br><small><b>Note:</b> No changes after confirmation!</small>
        </div>
        <div class="modal-footer mx-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form method="post" action="">
            <input type="text" value="'.$_SESSION["id"].'_'.$output["id"].'_'.$output["election_id"].'" name="submitVote" style="display: none;" />
            <input type="submit" value="Submit" name="Votebutton" class="btn vote-btn" />
            </form>
        </div>
        </div>
        </div>
        </div>';
    }

}else{
    echo '';
}

?>