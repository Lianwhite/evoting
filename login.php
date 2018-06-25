<?php
if(isset($_GET["vr"]) && $_GET["vr"] == 1){
    echo "<script>alert('Email Verification Successful');</script>";
}

include 'formhandle.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Voting Platform</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icons -->
    <link rel="stylesheet" href="./resources/icon_font-file/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- css/basscss/bootstrap -->
    <link rel="stylesheet" href="./css/login-reg.css">
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
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="./index.html" style="color: gray"> OlotuSquare E-Voting</a>
            </div>
        </div>
    </nav>
    <div class="container align-middle">
        <div class="login-box">

            <hgroup class="text-center">
                <h3 class="heading">Enter Login Details</h3>
                <div><small>Don't Have an Account? 
                    <a href="./register.php">
                    <span>Register</span>
                    </a></small>
                    <p class="error"><?php echo $loginError; ?></p>
                </div>
            </hgroup>
            
            <form method="post">
                <div class="form-group">
                <p class="error"><?php echo $empty_email; ?></p>
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <i class="fa fa-user input-group-text"></i>
                        </span>
                        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                <p class="error"><?php echo $empty_pass; ?></p>
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <i class="fa fa-lock input-group-text"></i>
                        </span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="col-sm-offset-0 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" name="login" class="login-btn expand btn">LOGIN</button>
            </form>
        </div>
    </div>
</body>

</html>