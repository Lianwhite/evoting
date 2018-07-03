<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$loggedin = (isset($_SESSION["id"]))? 1:0;

include 'votecount.php';

try {
    include 'dbconnect.php';
    $today = date('y-m-d', strtotime("today midnight"));
    if($loggedin == 1){
    //Vote validation
    $query1 = "SELECT elections.*, votes.user_id FROM elections INNER JOIN votes ON votes.election_id = elections.election_id 
    WHERE DATE(start_date) <= :today AND DATE(end_date) >= :today AND user_id = :user_id;";
    $data = $conn->prepare($query1);
    $data->bindParam(':today', $today);
    $data->bindParam(':user_id', $_SESSION["id"]);
    $data->execute();
    $resultvoted = $data->fetchAll();
    $voted = ($data->rowCount() > 0)?true:false;
}
    //Fetch candidates
    $query = "SELECT users.id, users.first_name, users.last_name, candidates.passport, candidates.position, candidates.party, candidates.election_id, candidates.no_votes FROM users 
    INNER JOIN candidates ON users.id = candidates.user_id
    INNER JOIN elections ON candidates.election_id = elections.election_id
    WHERE DATE(elections.start_date) <= :today AND DATE(elections.end_date) >= :today AND candidates.disabled = 0";
    $data = $conn->prepare($query);
  $data->bindParam(':today', $today);
  $data->execute();
  $result = $data->fetchAll();
}catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
$conn = null;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Olotu E-voting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" type="text/css" media="screen" href="./css/index.css" />
    <link rel="stylesheet" href="./resources/basscss.min.css">
    <link rel="stylesheet" href="./resources/bootstrap-4.1.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- java -->
    <script type="text/javascript" src="./resources/popper.js" charset="utf-8"></script>
    <script type="text/javascript" src="./resources/jquery-3.3.1.js" charset="utf-8"></script>
    <script type="text/javascript" src="./resources/bootstrap-4.1.0-dist/js/bootstrap.bundle.js"></script>
    <!-- <script type="text/javascript" src="./resources/bootstrap-4.1.0-dist/js/bootstrap.bundle.js.map"></script> -->
</head>

<body>
    <div class="container-fluid clearfix">
        <nav class="navbar mb-3 border-bottom">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./index.html" style="color: gray"> OlotuSquare E-Voting</a>
                </div>
                <ul class="nav navbar-nav navbar-nav">
                        <li class="col-right right-align">
                            
                            <?php 
                            echo (isset($_SESSION["partyLeader"]) && $_SESSION["partyLeader"] == 1)? "<a href='./candidatereg.php'><button class='btn btn-success' style='margin-right: 20px;'>Register Candidate</button></a>": "";
                            echo ($loggedin == 0)? "<a href='./login.php'><button class='btn btn-success'>Login</button></a>": "<a href='./logout.php'><button class='btn btn-success'>Logout</button></a>";
                            ?>
                                
                        </li>
                    </ul>
            </div>
        </nav>

        <!-- <section class="section-s1">

        </section> -->

        <section class="section-s2">
            <div class="center inline-flex">
            <?php
            
            function display($position){
                global $result, $loggedin, $voted, $resultvoted;
                $index = 0;
            echo '<div class="group1 center mb-2">';
            foreach($result as $output){
                if($output["position"] == $position){
                    echo ($index == 0)?'<legend class="text-uppercase admin-legend">'.$position.'</legend>':"";

                    echo '<div class="data-fixed-size-lead inline-block p-1 col-lg-1 col-0">'.$output["party"].'
                    <ul class="list-group">
                        <li class="list-group-item justify-content-center align-items-center">
                            <img src="'.$output["passport"].'" class="candidate-avatar" alt="avatar">
                        </li>
                        <li class="list-group-item justify-content-center align-items-center">'.$output["first_name"].' '.$output["last_name"].'
                            <span class="badge badge-primary badge-pill text-xl-center">'.$output["no_votes"].'</span>
                        </li>';
                        include 'vote.php';
                    echo '</ul></div>';
                    
                $index = 1;    
            }
            }
        }
            //Elections by category
            display("Presidential");
            display("Governorship");
            display("Senatorial");
            display("Chairmanship");
            echo '</div>';
            ?>

            </div>
        </section>
        <div class="footer row p-2 mt-3 rounded-0">
            <div class="max-width-1 mx-auto">
                &copy; FSQ 2018. All Rights Reserved.
            </div>

        </div>
    </div>
</body>

</html>