<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icons -->
    <link rel="stylesheet" href="view/resources/icon_font-file/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- css/basscss/bootstrap -->
    <link rel="stylesheet" href="view/css/index.css">
    <link rel="stylesheet" href="view/resources/basscss.min.css">
    <link rel="stylesheet" href="view/resources/bootstrap-4.1.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="view/resources/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="view/resources/jquery-ui-1.12.1/jquery-ui.structure.css">
    <link rel="stylesheet" href="view/resources/jquery-ui-1.12.1/jquery-ui.theme.css">
    <!-- js/jquery/ajax -->
    <script type="text/javascript" src="view/resources/popper.js" charset="utf-8"></script>
    <script type="text/javascript" src="view/resources/tooltip.js" charset="utf-8"></script>
    <script type="text/javascript" src="view/resources/jquery-3.3.1.js" charset="utf-8"></script>
    <script type="text/javascript" src="view/resources/jquery-ui-1.12.1/jquery-ui.js" charset="utf-8"></script>
    <script type="text/javascript" src="view/resources/bootstrap-4.1.0-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="view/resources/bootstrap-4.1.0-dist/js/bootstrap.bundle.js"></script>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Galada|Wendy+One" rel="stylesheet">
</head>
<body>
    
    <!--navbar-->
    <nav class="navbar border-bottom">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="./" style="color: gray"> OlotuSquare E-Voting</a>
            </div>
            <ul class="nav navbar-nav navbar-nav right">
                <li class="col-right">
                <button class="btn btn-info btn-sm" id="notificationbtn" data-toggle="modal" data-target="#exampleModalLong">
                <img class="notification" src="view/img/background/notification.png" /><span id="notifications"><?= $totalApproval; ?></span>
</button>
                    <a href="logout" class="btn btn-info btn-sm"> Log Out</a>
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
          
    <?php include 'approval.php'; ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>