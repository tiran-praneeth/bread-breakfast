<?php
	session_start(); 						// Start Session
	include_once("config/db_config.php"); 	// include database config page
	include('layouts/header.php'); 			// include header layout page
	
	$error_msg = "";
?>


<?php 
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
		if (isset($_POST['Register'])){
			
			$name 		= $_POST['name'];
			$email 		= $_POST['email'];
			$phone 		= $_POST['phone'];
			$gender 	= $_POST['gender'];
			$address 	= $_POST['address'];
			$state 		= $_POST['state'];
			$type 		= $_POST['type'];
			$password 		= $_POST['password'];
			$conf_password	= $_POST['password_confirmation'];
			$md5Password 	= md5($password);

			if ($password == $conf_password) {

				// Check weather email already registered or not
				$sql 	= "SELECT COUNT(*) AS count_num FROM user WHERE email = '$email'";
				$result = $connection->query($sql);
		        $obj 	= $result->fetch_object();
				
				try {
					
					if ($obj->count_num == "1") {

						$error_msg = "<div class='form-group text-center alert alert-danger'>
		                              <span>* The email address you have entered is already registered !</span>
		                              </div>";
					} else {
						
						$results = $connection->query("INSERT INTO user values (NULL , '$name' , '$email' , '$phone' , '$type' , '$gender' , '$address', '$md5Password', '$state' , NULL)" );
				
						if($results ){

							$error_msg = "<div class='form-group text-center alert alert-success'>
		                       	  		  <span>You have registered successfully!</span>
		                          		  </div>";

		                    $_SESSION["user_email"] = $email;
              				$_SESSION["user_type"] 	= $type;
              				$_SESSION["user_id"] = $connection->insert_id;

						}
					
						else{
							
							$error_msg = "<div class='form-group text-center alert alert-danger'>
		                              	  <span>Error - ".mysqli_error($connection)."</span>
		                              	  </div>";
						}
					}
				}
				
				catch (Exception $ex) {
					
		                $error_msg = "<div class='form-group text-center alert alert-danger'>
		                              <span>* Error :- ". $ex->getMessage() ."</span>
		                              </div>";
				}

			} else {

				$error_msg = "<div class='form-group text-center alert alert-danger'>
                   	  		  	<span>Passwords don't match!</span>
                      		  </div>";
			}

		}
	}
 ?>

 <style>
 	.label {
 		margin-bottom: 15px !important;
 	}
 </style>


<!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Signup to Bread & Breakfast</h1>
        </div>
        
        <div class="row">
          <div class="span6 offset3">

          <?php echo $error_msg;?>
          
            <h4 class="widget-header"><i class="icon-gift"></i> Be a part of Bread & Breakfast</h4>
            <div class="widget-body">
              <div class="center-align">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-horizontal form-signin-signup">
	                <div class="form-group">
		                <label for="name" class="label label-inverse">Enter Full Name</label>
		                <input type="text" id="name" name="name" placeholder="Full Name" required="">
		            </div>

		            <div class="form-group">
		                <label for="name" class="label label-inverse">Enter Email Address</label>
		                <input type="email" name="email" placeholder="Email" required="" style="width: 70%; height: 30px;">
		            </div>

		            <div class="form-group">
		                <label for="name" class="label label-inverse">Enter Mobile Number</label>
                  		<input type="number" name="phone" placeholder="Phone Number" required="" style="width: 70%; height: 30px;">
		            </div>

		            <div class="form-group">
		                <label for="name" class="label label-inverse">Select Gender</label>
		                <select class="form-control" name="gender" required style="width: 73%; height: 38px; margin-bottom: 15px;">
							<option value="MALE" selected>Male</option>
							<option value="FEMALE">Female</option>
						</select>
		            </div>

		            <div class="form-group">
		                <label for="name" class="label label-inverse">Enter Home Address</label>
		                <textarea name="address" placeholder="Home Address" required="" style="width: 70%; margin-bottom: 15px; height: 60px;"></textarea>
		            </div>

		            <div class="form-group">
		                <label for="name" class="label label-inverse">Select Your State / District</label>
		                <select class="form-control" name="state" required style="width: 73%; height: 38px; margin-bottom: 15px;">
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
		                <label for="name" class="label label-inverse">Select User Type</label>
		                <select class="form-control" name="type" required style="width: 73%; height: 38px; margin-bottom: 15px;">
							<option value="RENTER" selected>Renter</option>
							<option value="TOURIST">Tourist</option>
						</select>
		            </div>

		            <div class="form-group">
		                <label for="name" class="label label-inverse">Enter Password</label>
		                <input type="password" name="password" placeholder="Password" required="">
		            </div>

		            <div class="form-group">
		                <label for="name" class="label label-inverse">Enter Password Confirmation</label>
		                <input type="password" name="password_confirmation" placeholder="Password Confirmation" required="">
		            </div>
                  
					<div>
						<input type="submit" name="Register" value="Signup" class="btn btn-primary btn-large">
					</div>

                </form>
                <h4><i class="icon-question-sign"></i> Already have an account?</h4>
                <a href="login.php" class="btn btn-large bottom-space">Signin</a>
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