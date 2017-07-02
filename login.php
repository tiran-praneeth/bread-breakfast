<?php
  session_start(); // Start Session
  include_once("config/db_config.php"); // include database config page
  include('layouts/header.php'); // include header layout page
  $error_lmsg = "";
?>

<?php 

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_POST['login'])){
    
      $email = $_POST['email'];
      $password = $_POST['password'];
      $md5Password = md5($password);
      
      $sql = "SELECT * FROM user WHERE email='$email' && password='$md5Password'";

      $result = $connection->query($sql);

      if ($result->num_rows > 0) {
  
        if ($obj = $result->fetch_object()) {
    
          if ($obj->type == 'RENTER') {
            
            $_SESSION["user_email"] = $email;
            $_SESSION["user_type"] = $obj->type;
            $_SESSION["user_id"] = $obj->id;

            header('Location: index.php');
                      
          } else if ($obj->type == 'TOURIST') {
            
              $_SESSION["user_email"] = $email;
              $_SESSION["user_type"] = $obj->type;
              $_SESSION["user_id"] = $obj->id;
              
              header('Location: index.php');
        
          } else {

              $error_lmsg = "<div class='form-group text-center alert alert-danger'>
                                <span>* Something Went Wrong !</span>
                             </div>";
          }

        }

      } else {
          $error_lmsg = "<div class='form-group text-center alert alert-danger'>
                         <span>* Your username or password is invalid. Please try again !</span>
                         </div>";
      }
    }

  }

 ?>

<!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Signin to Bread & Breakfast</h1>
        </div>
        <div class="row">
          <div class="span6 offset3">

            <?php echo $error_lmsg;?>

            <h4 class="widget-header"><i class="icon-lock"></i> Signin to Bread & Breakfast</h4>
            <div class="widget-body">
              <div class="center-align">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-horizontal form-signin-signup">

                  <input type="email" name="email" placeholder="Email" required="" style="width: 70%; height: 30px;">
                  <input type="password" name="password" placeholder="Password" required="">
                  <div class="remember-me">
                    <div class="pull-left">
                      <label class="checkbox">
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                    <div class="pull-right">
                      <a href="#">Forgot password?</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <input type="submit" name="login" value="Signin" class="btn btn-primary btn-large">

                </form>

                <h4><i class="icon-question-sign"></i> Don't have an account?</h4>
                <a href="register.php" class="btn btn-large bottom-space">Signup</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End: MAIN CONTENT -->

<?php 
	include('layouts/footer.php'); // include footer layout page
?>