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
                <h3 class="heading">Candidate Registration</h3>
                <div><small><b>Note:</b> Candidate must be an eVoTiNg user.</small>
                    <p class="error"><?php echo $loginError; ?></p>
                </div>
            </hgroup>
            
            <form method="post" enctype="multipart/form-data" id="positionform">
                    <div class="form-group">
                    <p class="error"></p>
                        <label for="exampleInputEmail1">Candidates Email address</label>
                        <input type="email" name="emailr" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="John.doe@somewhere.com">
                    </div>
                    <div class="form-group upload-btn">
                    <p class="error"></p>
                        <div class="custom-file">
                            <input type="file" name="passportr" class="custom-file-input" id="inputGroupFile01">
                            <label id="passport" class="custom-file-label" for="inputGroupFile01">Upload passport photograph</label>
                        </div>
                    </div>
                    <div class="form-group upload-btn">
                    <p class="error"></p>
                        <div class="custom-file">
                            <input type="file" name="credr" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Upload credentials</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="error"></p>
                            <label for="inputPosition">Position</label>
                            <select id="inputPosition" class="form-control" name="position">
                                <option selected disabled>Select...</option>
                                <option value="Presidential">Presidential</option>
                                <option value="Governorship">Governorship</option>
                                <option value="Senatorial">Senatorial</option>
                                <option value="Chairman">Chairmanship</option>
                            </select>
                        </div>
            
                    <button type="submit" class="login-btn expand btn" id="leader" name="leader">CONFIRM</button>
                </form>
        </div>
    </div>

    <script src="js/candid.js"></script>
</body>

</html>