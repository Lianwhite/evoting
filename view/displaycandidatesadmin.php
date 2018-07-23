<?php
function display($position, $active){

    global $result, $result3;

    $resultQ = ($active == 1)?$result:$result3;
    
    $index = 0;

echo '<div class="group1 center mb-2">';

foreach($resultQ as $output){

    if($output["position"] == $position){

        echo ($index == 0)?'<legend class="text-uppercase admin-legend">'.$position.'</legend>':"";

        echo '<div class="data-fixed-size-lead inline-block  p-1 col-lg-1 col-0"';
        echo ($output["disabled"] == 1)?' style="background-color: #d40e0e14;"':'';
        echo '>'.$output["party"].'
        <ul class="list-group">
            <li class="list-group-item justify-content-center align-items-center" style="position: relative;">
            
                <img src="view/uploads/'.$output["passport"].'" class="admin-avatar" alt="avatar">
            </li>
            <li class="list-group-item justify-content-center align-items-center">'.$output["first_name"].' '.$output["last_name"].'
                <!-- <span class="badge badge-primary badge-pill m-1">104</span> -->
            </li>
            <li class="list-group-item justify-content-center align-items-center">
                <!-- <button class="btn custom-radio"></button> -->

                <div class="btn-group-toggle">
                    <label class="btn btn-primary" data-toggle="modal" data-target="#Delete_'.$output["id"].'">
                        <input type="radio" name="first5" value="Delete" class="delete" autocomplete="off" checked> Delete
                    </label>
                    <label class="btn btn-secondary" data-toggle="modal" ';
                    echo ($output["disabled"] == 1)?'style="background-color: #8a0c23;" data-target="#Enable_':'data-target="#Disable_';
                    echo $output["id"].'">
                        <input type="radio" name="first5" value="Disable" class="disable" autocomplete="off">';
                        echo ($output["disabled"] == 1)?' Enable':' Disable';
                        echo '</label>
                </div>
            </li>
        </ul>
    </div>';
    $disabledCheck = ($output["disabled"] == 1)?'Enable':'Disable';

    modal($output["id"], $output["first_name"], $output["last_name"], $position, "Delete");

    modal($output["id"], $output["first_name"], $output["last_name"], $position, $disabledCheck);
        
    $index = 1;    
}
}
}

function modal($id, $first, $last, $position, $action){
    
echo '<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="'.$action.'_'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    '.$action.' '.$first.' '.$last;
    echo ($action == "Enable")?' in ':' from ';
    echo $position.' election?
    <br><small><b>Note:</b> No changes after confirmation!</small>
</div>
<div class="modal-footer mx-auto">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <form method="post" action="">
    <input type="text" value="'.$action.'_'.$id.'" name="deleteDisable" style="display: none;" />
    <input type="submit" value="Submit" name="submitDeleteDisable" class="btn btn-primary" />
    </form>
</div>
</div>
</div>
</div>';
}
?>