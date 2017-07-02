
    <?php
        session_start();
        include_once("config/db_config.php"); // include database config page
        include 'layouts/header.php' ;
        $error_msg = "";
    ?>

    <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (isset($_POST['add_lodging'])){

            // Image upload

            $fileInfo ="assets/img/lodgings/" . basename($_FILES["fileUpload"]["name"]);
            $pathInfo = pathinfo($fileInfo,PATHINFO_EXTENSION);

            if (file_exists($fileInfo)) {

                $error_msg = "<div class='form-group text-center alert alert-danger'>
                                <span>* File already Exists.!</span>
                             </div>";
            }

            else if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $fileInfo)) {

                // Add lodging

                $name        = $_POST['name'];
                $price       = $_POST['price'];
                $description = $_POST['description'];
                $location    = $_POST['location'];
                $image_url   = $fileInfo;
                $user_id     = $_SESSION["user_id"];

                $sql = "INSERT INTO lodging values(NULL, '$name', '$price', '$description', '$location', '$image_url', '$user_id', NULL)";
                $results = $connection->query($sql);

                if($results){

                    $error_msg = "<div class='form-group text-center alert alert-success'>
                                    <span>* Record Added.!</span>
                                 </div>";
                } else {

                    $error_msg = "<div class='form-group text-center alert alert-danger'>
                                    <span>* '".mysqli_error($mysqli)."'</span>
                                 </div>";
                }

            } else {

                $error_msg = "<div class='form-group text-center alert alert-danger'>
                                <span>* ERROR.!</span>
                             </div>";
            }

        }

    }

    ?>

	<!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Add New Lodging Details to Bread & Breakfast</h1>
        </div>
        <div class="row">
          <div class="span6 offset3">

            <?php echo $error_msg;?>

            <h4 class="widget-header"><i class="icon-home"></i> Add Lodging Details</h4>
            <div class="widget-body">
              <div class="center-align">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-signin-signup">

                    <div class="form-group">
                        <label for="name" class="label label-inverse">Lodging Name</label>
                        <input type="text" name="name" placeholder="Lodging Name" required="">
                    </div>

                    <div class="form-group">
                        <label for="name" class="label label-inverse">Lodging Price (pre day)</label>
                        <input type="number" name="price" placeholder="Lodging Price" required="" style="width: 70%; height: 30px;">
                    </div>

                    <div class="form-group">
                        <label for="name" class="label label-inverse">Lodging Description</label>
                        <textarea name="description" placeholder="Lodging Description" required="" style="width: 70%; margin-bottom: 15px; height: 100px;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name" class="label label-inverse">Select Location</label>
                        <select class="form-control" name="location" required style="width: 73%; height: 38px; margin-bottom: 15px;">
                            <option value="Ampara">Ampara</option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="Badulla">Badulla</option>
                            <option value="Batticaloa">Batticaloa</option>
                            <option value="Colombo" selected>Colombo</option>
                            <option value="Galle">Galle</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Hambantota">Hambantota</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Kegalle">Kegalle</option>
                            <option value="Kilinochchi">Kilinochchi</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Mannar">Mannar</option>
                            <option value="Matale">Matale</option>
                            <option value="Matara">Matara</option>
                            <option value="Moneragala">Moneragala</option>
                            <option value="Mullaitivu">Mullaitivu</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Polonnaruwa">Polonnaruwa</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Vavuniya">Vavuniya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name" class="label label-inverse">Lodging Image</label>
                        <input type="file" name="fileUpload" required >
                    </div>

                    <br><br>
                    <input type="submit" name="add_lodging" value="Add Lodging" class="btn btn-primary btn-large">

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End: MAIN CONTENT -->



    <?php
        include 'layouts/footer.php' ;
    ?>
