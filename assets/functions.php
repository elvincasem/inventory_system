<?php 
	session_start();

	if($_GET['action'] == "logout"){
		
		session_destroy();
		echo "loggedout";
	}
	
?>