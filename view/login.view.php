<?php
    include 'header.php';
?>

    <div class="container align-middle">
        <div class="login-box">

            <hgroup class="text-center">
                <h3 class="heading">Enter Login Details</h3>
                <div><small>Don't Have an Account? 
                    <a href="./register">
                    <span>Register</span>
                    </a></small>
                    <p class="error loginError"></p>
                </div>
            </hgroup>
            
            <form method="post" id="loginform">
                <div class="form-group">
                <p class="error empty_email"></p>
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <i class="fa fa-user input-group-text"></i>
                        </span>
                        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                <p class="error empty_password"></p>
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

<script src="view/js/login.js"></script>

<?php
include 'footer.php';
?>