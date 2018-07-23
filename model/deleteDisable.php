<?php

//Voters registration

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['submitDeleteDisable'])){

        $value = explode("_",$_POST['deleteDisable']);

        $action = $value[0];

        $id = $value[1];

    if($action == "Delete"){//Delete

            database::delete("candidates", ["id =" => $id]);
    }

    if($action == "Disable"){//Disable

        database::update("candidates", ["disabled" => 1], ["id =" => $id]);

    }

    if($action == "Enable"){//Enable

        database::update("candidates", ["disabled" => 0], ["id =" => $id]);

    }
    }
}
?>