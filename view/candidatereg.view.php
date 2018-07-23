<?php  
    include 'header.php';
?>
    <div class="container align-middle">
        <div class="login-box">

            <hgroup class="text-center">
                <h3 class="heading">Candidate Registration</h3>
                <div><small><b>Note:</b> Candidate must be an eVoTiNg user.</small>
                <div class="s_container"><p id="candidate_success"></p></div>
                    <p class="error candidate_reg_error"></p>
                </div>
            </hgroup>
            
            <form method="post" enctype="multipart/form-data" id="positionform">
                    <div class="form-group">
                    <p class="error empty_email"></p>
                        <label for="exampleInputEmail1">Candidates Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="John.doe@somewhere.com">
                    </div>
                    <div class="form-group upload-btn">
                    <p class="error empty_passport"></p>
                        <div class="custom-file">
                            <input type="file" name="passport" class="custom-file-input" id="inputGroupFile01">
                            <label id="passport" class="custom-file-label" for="inputGroupFile01">Upload passport photograph</label>
                        </div>
                    </div>
                    <div class="form-group upload-btn">
                    <p class="error empty_cred"></p>
                        <div class="custom-file">
                            <input type="file" name="cred" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Upload credentials</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="error empty_position"></p>
                            <label for="inputPosition">Position</label>
                            <select id="inputPosition" class="form-control" name="position">
                                <option selected value="">Select...</option>
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

    <script src="view/js/candidatereg.js"></script>
    
    <?php
    include 'footer.php';
    ?>