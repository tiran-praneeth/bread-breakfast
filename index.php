<?php
    session_start();                      // Start Session
    include_once("config/db_config.php"); // include database config page
    include('layouts/header.php');        // include header layout page
?>

    <!-- Start: MAIN CONTENT -->
    <div class="content">
      <!-- Start: slider -->
      <div class="slider">
        <div class="container-fluid">
          <div id="heroSlider" class="carousel slide">
            <div class="carousel-inner">

              <div class="active item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <img src="assets/img/sample/placeholder-1280x550.png" class="thumbnail">
                  </div>                  
                </div>
              </div>

              <div class="item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <img src="assets/img/sample/placeholder-1280x550.png" class="thumbnail">
                  </div>                  
                </div>
              </div>

              <div class="item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <img src="assets/img/sample/placeholder-1280x550.png" class="thumbnail">
                  </div>                  
                </div>
              </div>

              <div class="item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <img src="assets/img/sample/placeholder-1280x550.png" class="thumbnail">
                  </div>                  
                </div>
              </div>

            </div>
            <a class="left carousel-control" href="#heroSlider" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#heroSlider" data-slide="next">›</a>
          </div>
        </div>
      </div>
      <!-- End: slider -->

      <!-- Start: PRODUCT LIST -->
        <div class="container">

          <div class="page-header">
            <h2>Latest Accommodation</h2>
          </div>

          <div class="row-fluid">
            <ul class="thumbnails">

            <?php

              $results = $connection->query("SELECT * FROM lodging ORDER BY id DESC LIMIT 0 , 3");
              
            if (mysqli_num_rows($results)>0) {

              //fetch results set as object and output HTML
                while ($obj = $results->fetch_object()) {
            ?>

          <li class="span4">
            <div class="thumbnail">
                <img src="<?php echo $obj->image_url;?>" alt="product name" style="height: 200px">
              <div class="caption">
                <h3 style="margin-bottom: 0px;"><?php echo $obj->name;?></h3>
                <h5 style="margin-top: 0px;"><?php echo $obj->location;?></h5>
                <h5>Price (pre day) - <?php echo $obj->price;?></h5>
                <p style="height: 100px;">
                    <?php echo $obj->description;?>
                </p>
              </div>
              <div class="widget-footer">
                <p>
                  <a href="#" class="btn btn-primary">Book now</a>&nbsp;
                  <a href="$" class="btn">Read more</a>
                </p>
              </div>
            </div>
          </li>

            <?php
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: center;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Oops!</strong> Products Not Found !.
                      </div>';
            }

            ?>

            </ul>
          </div>

          <!-- <div class="page-header">
            <h2>Our Services</h2>
          </div> -->

        </div>
      <!-- End: PRODUCT LIST -->

    </div>
    <!-- End: MAIN CONTENT -->

<?php
    include('layouts/footer.php'); // include footer layout page
?>
