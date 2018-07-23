<?php
include 'adminheader.php';
?>

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
            <h3 class="display-4 text-primary text-xs-center p-b-1 m-b-1 h1 m-5" style="font-family: 'Wendy One', sans-serif;">ADMIN</h3>
        </div>
    <!--Welcome-Admin/-->
        
    <!--ELection-Section-->   
    
        <div class="container grid">
            
            <div class="center inline-flex">
                <!--Election Fetch Starts-->
                <legend class="text-uppercase header">Active Elections</legend>
            <?php

            include 'displaycandidatesadmin.php';

        //Elections by category
        if (empty($result)) {
            echo '<p>No results</p>';
        } else {
            display("Presidential", 1);
            display("Governorship", 1);
            display("Senatorial", 1);
            display("Chairmanship", 1);
            echo '</div>';
        }
            ?>
            </div>
        </div>
    <!--Active ELection-Section/-->

    <!--Pending ELection-Section-->   
        <div class="container grid">
        <div class="center inline-flex">
        <legend class="text-uppercase header">Pending Elections</legend>

        <?php

        //Elections by category
        
        if (empty($result3)) {
            echo '<p>No results</p>';
        } else {
            display("Presidential", 0);
            display("Governorship", 0);
            display("Senatorial", 0);
            display("Chairmanship", 0);
            echo '</div>';
        }
        ?>
        </div>
        </div>
    <!--Pending ELection-Section/-->

    <!-- Footer -->
        <div class="footer row p-2 mt-3 rounded-0">
            <div class="max-width-1 mx-auto">
                &copy; FSQ 2018. All Rights Reserved.
            </div>
        </div>
    <!-- Footer -->
   
    <script src="view/js/admin.js"></script> 
</body>
</html>