
<?php

date_default_timezone_set("Asia/Colombo");

	$server		= "localhost";
	$user 		= "root";
	$password 	= "";
	$db 		= "bnb_db";
	
	$con 		= mysqli_connect($server, $user, $password, $db);
	$connection = new mysqli($server,$user,$password,$db);

// Check connection

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

/*
else {
	echo "<h2>Successful Connection!</h2>";
}
*/

?>