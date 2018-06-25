<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// goto a;
try {
    include 'dbconnect.php';
    $startdate = strtotime("2018/06/22");
    $end = strtotime("2018/06/25");
    $today = date('y-m-d', strtotime("today midnight"));
    // AND end_date <= :today
    // $data = $conn->prepare("SELECT * FROM candidates WHERE DATE(start_date) <= :today AND DATE(end_date) >= :today");
    $query = "SELECT users.first_name, users.last_name, candidates.passport, candidates.position, candidates.party FROM users 
    INNER JOIN candidates ON users.id = candidates.user_id
    INNER JOIN elections ON candidates.election_id = elections.election_id
    WHERE DATE(elections.start_date) <= :today AND DATE(elections.end_date) >= :today;
    SELECT users.id, users.first_name, users.last_name, users.dob, 
    candidates.passport, candidates.credential, candidates.position, candidates.party 
    FROM users INNER JOIN candidates ON users.id = candidates.user_id     WHERE election_id is NULL;";
    // SELECT users.first_name, users.last_name, candidates.passport, candidates.position, candidates.party 
    // FROM users INNER JOIN candidates ON users.id = candidates.user_id 
    // WHERE DATE(candidates.start_date) <= :today AND DATE(candidates.end_date) >= :today;
    // SELECT users.first_name, users.last_name, candidates.passport, candidates.position, candidates.party, candidates.credential 
    // FROM users INNER JOIN candidates ON users.id = candidates.user_id WHERE candidates.approval=0;
    // SELECT users.first_name, users.last_name, partyLeaders.passport, partyLeaders.party, partyLeaders.credential 
    // FROM users INNER JOIN partyLeaders ON users.id = partyLeaders.user_id WHERE partyLeaders.approval=0;
    $data = $conn->prepare($query);
  $data->bindParam(':today', $today);
  $data->execute();
  $result = $data->fetchAll();
//   var_dump($result);
//   exit();
  $data->nextRowset();
$result1 = $data->fetchAll();

$approvalCheck = (count($result1) > 0)?true:false;
// print_r($result1);
// exit();
// $data->nextRowset();
// $result2 = $data->fetchAll();

//   $result = $data->fetch(PDO::FETCH_ASSOC);
//   var_dump($result2);
//   exit();
}catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
$conn = null;

// a:
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icons -->
    <link rel="stylesheet" href="./resources/icon_font-file/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- css/basscss/bootstrap -->
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./resources/basscss.min.css">
    <link rel="stylesheet" href="./resources/bootstrap-4.1.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./resources/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="./resources/jquery-ui-1.12.1/jquery-ui.structure.css">
    <link rel="stylesheet" href="./resources/jquery-ui-1.12.1/jquery-ui.theme.css">
    <!-- js/jquery/ajax -->
    <script type="text/javascript" src="./resources/popper.js" charset="utf-8"></script>
    <script type="text/javascript" src="./resources/tooltip.js" charset="utf-8"></script>
    <script type="text/javascript" src="./resources/jquery-3.3.1.js" charset="utf-8"></script>
    <script type="text/javascript" src="./resources/jquery-ui-1.12.1/jquery-ui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./resources/bootstrap-4.1.0-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="./resources/bootstrap-4.1.0-dist/js/bootstrap.bundle.js"></script>
</head>
<body>
    <!--navbar-->
    <nav class="navbar border-bottom">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="./index.php" style="color: gray"> OlotuSquare E-Voting</a>
            </div>
            <ul class="nav navbar-nav navbar-nav right">
                <li class="col-right">
                <button class="btn btn-info btn-sm" id="notificationbtn" data-toggle="modal" data-target="#exampleModalLong">
                <img class="notification" src="./img/background/notification.png" /><span id="notifications"><?php echo count($result1); ?></span>
</button>
                    <a href="./login.php" class="btn btn-info btn-sm"> Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
    <?php
    include 'approval.php';
    ?>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <!-- <div class="collapse" id="collapseExample">
    <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div> -->

    <!--form-->
        <form class="form-inline m-5 right" method="post" id="startForm">
            <div class="form-group mx-sm-3 mb-2">
                <select name="position" class="custom-select">
                    <option selected disabled>Select Election</option>
                    <option value="Presidential">Presidential</option>
                    <option value="Governorship">Governorship</option>
                    <option value="Senatorial">Senatorial</option>
                    <option value="Chairmanship">Chairmanship</option>
                </select>
            </div>
            
            <div class="form-group mx-sm-3 mb-2">
            
                <label class="sr-only" for="inlineFormInputName">Name</label>
                <input name="start" type="text" class="form-control" id="inlineFormInputName" placeholder="Start date yy/mm/dd">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label class="sr-only" for="inlineFormInputName">Name</label>
                <input name="end" type="text" class="form-control" id="inlineFormInputName" placeholder="End date yy/mm/dd">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Add</button>
        </form>
    <!--form/-->

    <!--Welcome-Admin-->
        <div class"col-lg-12" id="admin">
            <h3 class="display-4 text-primary text-xs-center p-b-1 m-b-1 h1 m-5">ADMIN</h3>
        </div>
    <!--Welcome-Admin/-->
        
    <!--ELection-Section-->   
    

    
        <div class="container grid">
            
            <div class="center inline-flex">
                <!--Election Fetch Starts-->
                <legend class="text-uppercase" style="color: ##187492 !important;">Active Elections</legend>
            <?php
            
            function display($position){
                global $result;
                $index = 0;
            echo '<div class="group1 center mb-2">';
            foreach($result as $output){
                if($output["position"] == $position){
                    echo ($index == 0)?'<legend class="text-uppercase admin-legend">'.$position.'</legend>':"";

                    echo '<div class="data-fixed-size-lead inline-block  p-1 col-lg-1 col-0">'.$output["party"].'
                    <ul class="list-group">
                        <li class="list-group-item justify-content-center align-items-center">
                            <img src="'.$output["passport"].'" class="admin-avatar" alt="avatar">
                        </li>
                        <li class="list-group-item justify-content-center align-items-center">'.$output["first_name"].' '.$output["last_name"].'
                            <!-- <span class="badge badge-primary badge-pill m-1">104</span> -->
                        </li>
                        <li class="list-group-item justify-content-center align-items-center">
                            <!-- <button class="btn custom-radio"></button> -->
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="first5" id="option1" autocomplete="off" checked> Delete
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="first5" id="option1" autocomplete="off" checked> Disable
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>';
                    
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
        </div>
    <!--ELection-Section/-->

    <!-- Footer -->
        <div class="footer row p-2 mt-3 rounded-0">
            <div class="max-width-1 mx-auto">
                &copy; FSQ 2018. All Rights Reserved.
            </div>
        
        </div>
    <!-- Footer -->
   
    <script src="js/admin.js"></script>
</body>
</html>