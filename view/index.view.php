<?php
    include 'header.php';
?>

    <!--Slider-->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-70 mx-auto img-fluid h-70 carousels" src="view/img/background/vote3.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-70 mx-auto img-fluid h-70 carousels" src="view/img/background/vote6.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-70 mx-auto img-fluid h-70 carousels" src="view/img/background/vote4.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--Slider Ends-->

    <div class="container-fluid clearfix">
        
        <!-- <section class="section-s1">

        </section> -->

        <section class="section-s2">
            <div class="center inline-flex">
            <!--Election Fetch Starts-->
            <legend class="text-uppercase indexheader">Active Elections</legend>
            
            <?php

            if(empty($result)){

              echo "<p>No Active Election</p>";

            }else{
              
                include 'candidatedisplay.php';
            
                //Elections by category
                display("Presidential");

                display("Governorship");

                display("Senatorial");

                display("Chairmanship");
            
                echo '</div>';
            }
            ?>

            </div>
        </section>
        <div class="footer row p-2 mt-3 rounded-0">
            <div class="max-width-1 mx-auto">
                &copy; FSQ 2018. All Rights Reserved.
            </div>

        </div>
    </div>
</body>

</html>