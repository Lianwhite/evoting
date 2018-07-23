<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Voting Platform</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icons -->
    <link rel="stylesheet" href="view/resources/icon_font-file/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- css/basscss/bootstrap -->
    <link rel="stylesheet" href="view/css/login-reg.css">
    <link rel="stylesheet" type="text/css" media="screen" href="view/css/index.css" />
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
<nav class="navbar mb-3 border-bottom">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./" style="color: gray"> OlotuSquare E-Voting</a>
                </div>
                <ul class="nav navbar-nav navbar-nav">
                        <li class="col-right right-align">
                            
                            <?php 
                            $loggedin = (isset($_SESSION["id"]))? 1:0;
                            $isAdmin = (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1)? true:false;

                            echo ($isAdmin)? "<a href='./admin'><button class='btn btn-success' style='margin-right: 20px;'>Admin Panel</button></a>": "";
                            echo (isset($_SESSION["partyLeader"]) && $_SESSION["partyLeader"] == 1)? "<a href='./candidates-reg'><button class='btn btn-success' style='margin-right: 20px;'>Register Candidate</button></a>": "";
                            echo ($loggedin == 0)? "<a href='./login'><button class='btn btn-success'>Login</button></a>": "<a href='./logout'><button class='btn btn-success'>Logout</button></a>";
                            ?>
                                
                        </li>
                    </ul>
            </div>
        </nav>

    <div class="loading"> <img src="view/img/background/loading_icon.gif" /> </div>
    