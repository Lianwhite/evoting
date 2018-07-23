<?php
function display($position)
{
    global $result, $loggedin, $voted, $resultvoted;

    $index = 0;

    echo '<div class="group1 center mb-2">';

    foreach ($result as $output) {

        if ($output["position"] == $position) {

            echo ($index == 0)?'<legend class="text-uppercase admin-legend">'.$position.'</legend>':"";

            echo '<div class="data-fixed-size-lead inline-block p-1 col-lg-1 col-0">'.$output["party"].'
                <ul class="list-group">
                <li class="list-group-item justify-content-center align-items-center">
                <img src="view/uploads/'.$output["passport"].'" class="candidate-avatar" alt="avatar">
                </li>
                <li class="list-group-item justify-content-center align-items-center">'.$output["first_name"].' '.$output["last_name"].'
                <span class="badge badge-primary badge-pill text-xl-center">'.$output["no_votes"].'</span>
                </li>';

            include 'view/votebutton.view.php';
            
            echo '</ul></div>';

            $index = 1;
        }
    }
}
