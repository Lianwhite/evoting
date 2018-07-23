<?php  
    include 'header.php';
?>

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
                            <a href="./login">
                                <span>Log In</span>
                            </a>
                        </small>
                        <div class="s_container"><p id="register_success"></p></div>
                        <p class="error register_error"></p>

                    </div>
                </hgroup>
                <form method="post" id="registerform">
                    <div class="form-group ">
                        <p class="error empty_first_name"></p>
                        <label for="inputFirstName">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="inputFirstName" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                    <p class="error empty_last_name"></p>
                        <label for="inputLastName">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="inputLastName" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                    <p class="error empty_email"></p>
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="example@yahoo.com">
                    </div>
                    <p class="error empty_password"></p>
                        <p class="error passwordmismatch"></p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword1">Enter password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">confirm password</label>
                            <input type="password" name="confirm_password" class="form-control" id="inputPassword4" placeholder="Confirm Password">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <p class="error empty_state" style="height: 5px;"></p>
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control" name="state">
                                <option value="" selected>Select...</option>
                                <option value="Rivers">Rivers State</option>
                                <option value="Delta">Delta State</option>
                                <option value="Bayelsa">Bayelsa State</option>
                                <option value="Cross">Cross River</option>
                                <option value="Akwa Ibom">Akwa Ibom</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                        <p class="error empty_LGA" style="height: 5px;"></p>
                            <label for="inputLGA">LGA</label>
                            <select id="inputLGA" class="form-control" name="LGA">
                                <option value="" selected>Select...</option>
                                <option value="Phalga">phalga</option>
                                <option value="Warri south">warri south</option>
                                <option value="Yenagoa">Yenagoa</option>
                                <option value="Akpabuyo">Akpabuyo</option>
                                <option value="Uyo">Uyo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <p class="error empty_DOB"></p>
                        <label for="input dob">Date Of Birth</label>
                        <input name="DOB" type="text" class="form-control" id="inputEmail4" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group">
                    <p class="error empty_phone"></p>
                        <label for="input phone">Phone No</label>
                        <input name="phone" type="text" class="form-control" placeholder="+234">
                    </div>
                    <div class="form-group">
                    <p class="error empty_voters_id"></p>
                        <label for="inputId">Voters ID</label>
                        <input name="voters_id" type="text" class="form-control" id="inputId" placeholder="">
                    </div>
                    <div class="form-group">
                    <p class="error empty_address"></p>
                        <label for="input phone">Address</label>
                        <textarea name="address" type="text" class="form-control" placeholder="Address"></textarea>
                    </div>

                    <div class="form-group">
                    <p class="error empty_gender"></p>
                    <label for="input phone">Gender</label><br>
                    <div class="form-check-inline">
                    <label class="form-check-label">
                    <input type="radio" class="d-none" name="gender" value="" checked>
                    <input type="radio" class="form-check-input" name="gender" value="Male">Male
                    </label>
                    </div>
                    <div class="form-check-inline">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="Female">Female
                    </label>
                    </div>
                    </div>
            
                    <input type="submit" name="votersreg" value="Submit" class="login-btn expand btn">
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
                            <a href="register">
                                <span>Register</span>
                            </a>
                        </small>
                        <div class="s_container"><p id="party_leader_success"></p></div>
                        <p class="error party_leader_error"></p>
                    </div>
                </hgroup>
            
                <form method="post" enctype="multipart/form-data" id="leaderform">
                    <div class="form-group">
                    <p class="error empty_emailp"></p>
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="John.doe@somewhere.com">
                    </div>
                    <p class="error empty_passwordp"></p>
                    <div class="input-group mb-3">
                        <span class="input-group-prepend">
                            <i class="fa fa-lock input-group-text"></i>
                        </span>
                        <input id="password" type="password" class="form-control password-space" name="password" placeholder="Password">
                    </div>
                    <div class="form-group upload-btn">
                    <p class="error empty_passport"></p>
                        <div class="custom-file">
                            <input type="file" name="passport" class="custom-file-input">
                            <label id="passport" class="custom-file-label" for="inputGroupFile01">Upload passport photograph</label>
                        </div>
                    </div>
                    <div class="form-group upload-btn">
                    <p class="error empty_cred"></p>
                        <div class="custom-file">
                            <input type="file" name="cred" class="custom-file-input">
                            <label class="custom-file-label" for="inputGroupFile01">Upload credentials</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="error empty_party"></p>
                            <label for="inputParty">Party</label>
                            <select id="inputParty" class="form-control" name="party">
                                <option value="" selected>Select...</option>
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
    
    <script src="view/js/partyleaderreg.js"></script>
    <script src="view/js/register.js"></script>

    <?php
    include 'footer.php';
    ?>