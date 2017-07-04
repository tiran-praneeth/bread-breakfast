<?php 
	session_start();                      // Start Session
	include_once("config/db_config.php"); // include database config page
	include('layouts/header.php');        // include header layout page

  $P_Search   = "";
  $pagination = "";
  $search     = "";
  $p_num      = "";
  $row_count  = 0;
  $row_counts = 0;
?>

<!-- Start: MAIN CONTENT -->
    <div class="content">

      <!-- Start: PRODUCT LIST -->
        <div class="container">
          <div class="page-header">
            <h2>Our products</h2>
          </div>

        <?php

          if (isset($_GET['P_Search'])) {

            $search   = $_GET['P_Search'];
            $P_Search = 'WHERE availability = "1" AND name LIKE "%'.$_GET['P_Search'].'%" OR price LIKE "%'.$_GET['P_Search'].'%" OR location LIKE "%'.$_GET['P_Search'].'%"';
          } else {
            $P_Search = 'WHERE availability = "1"';
          }

          if (isset($_GET['pagination'])) {

            $p_num      = $_GET['pagination'];
            $pagination = "LIMIT ".$_GET['pagination']." , 12";
          }

          $results      = $connection->query("SELECT * FROM lodging $P_Search ORDER BY id DESC $pagination");
          $all_results  = $connection->query("SELECT * FROM lodging $P_Search");
          $result_count = mysqli_num_rows($results);
			    $all_count    = mysqli_num_rows($all_results);

            if ($result_count>0) {

              $column_per_row = 4;
              $row_count = ceil($result_count/$column_per_row);

              $row_arry = array();

                for ($x=1; $x <= $row_count; $x++) {
                  $column = (($column_per_row*$x)-$column_per_row)+1;
                  $row_arry += array($x => $column);
                }

              $row_close = $row_arry;
              unset($row_close[1]);

              $xy = 1;
              while($obj = $results->fetch_object())
              {

                  if (in_array($xy, $row_arry)) {
                    echo '<div class="row-fluid">
                            <ul class="thumbnails">';
                  }

                    ?>

                    <li class="span3">
                    <form action="lodging_detail_view.php" method="post">
                      <div class="thumbnail">
                        <img src="<?php echo $obj->image_url;?>" alt="product name" style="height: 150px">
                        <div class="caption">
                          <h3 style="margin-bottom: 0px;"><?php echo $obj->name;?></h3>
                          <h5 style="margin-top: 0px;"><?php echo $obj->location;?></h5>
                          <h5>Price (pre day) - <?php echo $obj->price;?></h5>
                          <p style="height: 110px;">
                            <?php echo $obj->description;?>
                          </p>
                        </div>
                        <input type="hidden" name="P_ID" value="<?php echo $obj->id;?>">
                        <div class="widget-footer">
                          <p>
                            <button class="btn">Read more</button>
                          </p>
                        </div>
                      </div>
                    </form>
                    </li>

                  <?php

                    if (is_int($xy/$column_per_row)) {
                        echo '</ul></div>';
                    }

                    $xy++;
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

          <div class="pagination pagination-centered">
                <ul>
                  <li class="disabled">
                    <a>&laquo;</a>
                  </li>

                  <?php

                    $column_per_rows = 12;
                    $row_counts = ceil($all_count/$column_per_rows);

                    for ($i=0; $i < $row_counts; $i++) {

                      $pagination_no = $i+1;
                      $pagination_count = $i*12;
                  ?>

                  <li <?php if ($pagination_count == $p_num) { echo 'class="active"'; }?> >
                    <a href="view_lodging.php?pagination=<?php echo $pagination_count; ?>&P_Search=<?php echo $search;?>">
                      <?php echo $pagination_no; ?>
                    </a>
                  </li>

                  <?php } ?>

                  <li class="disabled">
                    <a>&raquo;</a>
                  </li>
                </ul>
          </div>

        </div>
      <!-- End: PRODUCT LIST -->
    </div>
    <!-- End: MAIN CONTENT -->

<?php
	include('layouts/footer.php'); // include footer layout page
?>
