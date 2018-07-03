
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_GET["user"]) && $_GET["user"] == 0){
    echo "<script>alert('No User found!');</script>"; 
}
if(isset($_GET["Ind"]) && $_GET["Ind"] == 1){
    echo "<script>alert('Invalid data!');</script>"; 
}

include 'formhandle.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
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

<body style="background-color: white">

    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="./index.html" style="color: gray"> OlotuSquare E-Voting</a>
            </div>
        </div>
    </nav>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="voter-tab" data-toggle="tab" href="#voter" role="tab" aria-controls="voter" aria-selected="true">For Voters</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="candidate-tab" data-toggle="tab" href="#candidate" role="tab" aria-controls="candidate" aria-selected="false">For Party Leaders</a>
            </li>
        </ul>


    <div class="container tab-content" id="myTabContent" style="max-width: 800px; margin: auto;">
        <!--  -->
        <div class="tab-pane fade show active" id="voter" role="tabpanel" aria-labelledby="voter-tab">
            <div class="login-box reg-box">
                <hgroup class="text-center">
                    <h3 class="heading" href="./index.html" style="color:black">Voters Registration</h3>
                    <div>
                        <small>Already Have an Account?
                            <a href="./login.php">
                                <span>Log In</span>
                            </a>
                        </small>
                        <p class="error"><?php echo $userExists; ?></p>
                        <p class="error"><?php echo $noNetwork; ?></p>
                    </div>
                </hgroup>
                <form method="post">
                    <div class="form-group ">
                        <p class="error"><?php echo $empty_first; ?></p>
                        <label for="inputFirstName">First Name</label>
                        <input type="text" name="first" class="form-control" id="inputFirstName" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                    <p class="error"><?php echo $empty_last; ?></p>
                        <label for="inputLastName">Last Name</label>
                        <input type="text" name="last" class="form-control" id="inputLastName" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                    <p class="error"><?php echo $empty_email; ?></p>
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="example@yahoo.com">
                    </div>
                    <p class="error"><?php echo $empty_pass; ?></p>
                        <p class="error"><?php echo $passmismatch; ?></p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Enter password</label>
                            <input type="password" name="pass" class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">confirm password</label>
                            <input type="password" name="passver" class="form-control" id="inputPassword4" placeholder="Confirm Password">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <p class="error" style="height: 5px;"><?php echo $empty_origin; ?></p>
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control" name="origin">
                                <option selected disabled>Select...</option>
                                <option value="Rivers">Rivers State</option>
                                <option value="Delta">Delta State</option>
                                <option value="Bayelsa">Bayelsa State</option>
                                <option value="Cross">Cross River</option>
                                <option value="Akwa Ibom">Akwa Ibom</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                        <p class="error" style="height: 5px;"><?php echo $empty_lga; ?></p>
                            <label for="inputLGA">LGA</label>
                            <select id="inputLGA" class="form-control" name="lga">
                                <option selected disabled>Select...</option>
                                <option value="Phalga">phalga</option>
                                <option value="Warri south">warri south</option>
                                <option value="Yenagoa">Yenagoa</option>
                                <option value="Akpabuyo">Akpabuyo</option>
                                <option value="Uyo">Uyo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <p class="error"><?php echo $empty_dob; ?></p>
                        <label for="input dob">Date Of Birth</label>
                        <input name="dob" type="text" class="form-control" id="inputEmail4" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group">
                    <p class="error"><?php echo $empty_phone; ?></p>
                        <label for="input phone">Phone No</label>
                        <input name="phone" type="text" class="form-control" id="inputCity" placeholder="+234">
                    </div>
                    <div class="form-group">
                    <p class="error"><?php echo $empty_voters_id; ?></p>
                        <label for="inputId">Voters ID</label>
                        <input name="voters_id" type="text" class="form-control" id="inputId" placeholder="">
                    </div>
                    <div class="form-group">
                    <p class="error"><?php echo $empty_address ; ?></p>
                        <label for="input phone">Address</label>
                        <textarea name="address" type="text" class="form-control" id="inputCity" placeholder="Address"></textarea>
                    </div>

                    <div class="form-group">
                    <p class="error"><?php echo $empty_gender; ?></p>
                    <label for="input phone">Gender</label><br>
                    <div class="form-check-inline">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="Male">Male
                    </label>
                    </div>
                    <div class="form-check-inline">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="Female">Female
                    </label>
                    </div>
                    </div>
            
                    <button type="submit" name="votersreg" class="login-btn expand btn">Register</button>
                </form>
            </div>
        </div>

        <!--  -->
        <div class="tab-pane fade" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
            <div class="login-box">
                <hgroup class="text-center">
                    <h3 class="heading">Register</h3>
                    <div>
                        <small>Don't have an Account?
                            <a href="register.php">
                                <span>Register</span>
                            </a>
                        </small>
                    </div>
                </hgroup>
            
                <form method="post" enctype="multipart/form-data" id="leaderform">
                    <div class="form-group">
                    <p class="error"></p>
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="John.doe@somewhere.com">
                    </div>
                    <p class="error"></p>
                    <div class="input-group mb-3">
                        <span class="input-group-prepend">
                            <i class="fa fa-lock input-group-text"></i>
                        </span>
                        <input id="password" type="password" class="form-control password-space" name="password" placeholder="Password">
                    </div>
                    <div class="form-group upload-btn">
                    <p class="error"></p>
                        <div class="custom-file">
                            <input type="file" name="passport" class="custom-file-input" id="inputGroupFile01">
                            <label id="passport" class="custom-file-label" for="inputGroupFile01">Upload passport photograph</label>
                        </div>
                    </div>
                    <div class="form-group upload-btn">
                    <p class="error"></p>
                        <div class="custom-file">
                            <input type="file" name="cred" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Upload credentials</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="error"></p>
                            <label for="inputParty">Party</label>
                            <select id="inputParty" class="form-control" name="party">
                                <option selected disabled>Select...</option>
                                <option value="PDP">PDP</option>
                                <option value="APC">APC</option>
                                <option value="ADP">ADP</option>
                                <option value="ANPP">ANPP</option>
                                <option value="UNPP">UNPP</option>
                            </select>
                        </div>
            
                    <button type="submit" class="login-btn expand btn" id="leader" name="leader">CONFIRM</button>
                </form>
            </div>
        </div>
    </div>
    

    <script src="js/register.js"></script>
</body>

</html>