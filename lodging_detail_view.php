<?php
    session_start();                      // Start Session
    include_once("config/db_config.php"); // include database config page
    include('layouts/header.php');        // include header layout page
?>

<!-- Start: Main content -->
    <div class="content">     
      <div class="container">
        <!-- Start: Service description -->

        <?php

        if (isset($_POST['Book'])) {

          $lodging_id = $_POST['P_ID'];
          $user_id    = $_SESSION["user_id"];

            $book_result = $connection->query("INSERT INTO booking values (NULL, '$lodging_id', '$user_id', NULL, 1)");
            $book_results = $connection->query("UPDATE lodging SET availability = 0 WHERE id =".$lodging_id);
        
            if($book_result){

              echo '<div class="alert alert-success alert-dismissible" role="alert" style="text-align: center;">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  You have Booked lodging successfully!.
                            </div>';
            }
            else{

              echo "Error - ".mysqli_error($connection);
            }
        }

        if (isset($_POST['review'])) {

        	$lodging_id = $_POST['P_ID'];
        	$user_id    = $_SESSION["user_id"];
        	$review     = $_POST['comment'];

            $result = $connection->query("INSERT INTO review values (NULL, '$lodging_id', '$user_id', '$review', NULL, NULL, 1)" );
				
      			if($result){

      				echo '<div class="alert alert-success alert-dismissible" role="alert" style="text-align: center;">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  You have reviewed successfully!.
                            </div>';
      			}
      			else{

      				echo "Error - ".mysqli_error($connection);
      			}
        }


        $results = $connection->query("SELECT * FROM lodging where id =".$_POST['P_ID']);
          
        if (mysqli_num_rows($results)>0) {

          //fetch results set as object and output HTML
            while ($obj = $results->fetch_object()) {
        ?>
        <article class="article"> 
          <div class="row bottom-space">
            <div class="span12">
              <div class="page-header">
                <h1><?php echo $obj->name;?> <small><?php echo $obj->location;?></small></h1>
              </div>
            </div>
            <div class="span12 center-align">
              <img src="<?php echo $obj->image_url;?>" class="thumbnail product-snap" style="height: 300px">            
            </div>
          </div>
          <div class="row bottom-space">
            <div class="span10 offset1">
              <h4>Price (pre day) - <?php echo $obj->price;?></h4>
              <br>
              <p>Description - </p>
              <p>
                <?php echo $obj->long_description;?>
              </p>                                             
            </div>      
          </div>
          <div class="row">
            <div class="span8 offset4">
              <hr>
              
              <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'TOURIST'): ?>  

                <div class="span3">
                <form action="lodging_detail_view.php" method="post">
                  <input type="hidden" name="P_ID" value="<?php echo $_POST['P_ID'];?>">
                  <button class="btn btn-large btn-block btn-primary" value="Book" name="Book">Book Lodging</button>
                </form>
                </div>

                <!-- <div class="span3">
                  <div id="paypal-button-container"></div>
                </div> -->

              <?php endif ?>

            </div>
          </div>
          <br>
          <div class="well">

          <?php

	        $results = $connection->query("SELECT * FROM review where lodging_id =".$_POST['P_ID']);
	          
	        if (mysqli_num_rows($results)>0) {

	          //fetch results set as object and output HTML
	            while ($obj = $results->fetch_object()) {
	        ?>

			<div class="row">
			    <div class="span12">
			        Anonymous
			        <p><?php echo $obj->review;?></p>
			    </div>
			</div>

			<hr>

			<?php
					}
               }
            ?>

            <?php if (isset($_SESSION['user_email'])): ?>  

              <form action="lodging_detail_view.php" method="post">
                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5" style="width: 70%;"></textarea>

                <input type="hidden" name="P_ID" value="<?php echo $_POST['P_ID'];?>">

                <div class="text-right">
                  <button class="btn btn-success" value="review" name="review">Leave a Review</button>
              </div>
            </form>

            <?php endif ?>

        </div>

        </article>
        <?php
               }

            } else {
                echo '<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: center;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Oops!</strong> Products Not Found !.
                      </div>';
            }

            ?>
        <!-- End: Service description -->
      </div>
    </div>
    </div>
    <!-- End: Main content -->

<?php 
	include('layouts/footer.php'); // include footer layout page
?>