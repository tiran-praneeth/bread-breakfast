<?php
	session_start();

	session_unset(); // Destroy all sessions
	
	// unset($_SESSION["user_email"]); // Destroy user_email session
	// unset($_SESSION["user_type"]); // Destroy user_type session
	
	header("location: index.php");

?>