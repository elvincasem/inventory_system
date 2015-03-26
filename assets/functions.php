<?php 
	session_start();
	
	//database connection
	require_once 'db_connection.php';
	$conn = dbConnect();
	
//logout user
	if($_GET['action'] == "logout"){
		
		session_destroy();
		echo "loggedout";
	}

//save user
	if($_GET['action'] == "saveuser"){
		
		session_destroy();
		echo "loggedout";
	}

//update user
	if($_GET['action'] == "updateuser"){
		$_GET['userID'];
		//session_destroy();
		echo "loggedout";
	}

//delete user
	if($_GET['action'] == "deleteuser"){
		
		$_GET['userID'];
		//session_destroy();
		echo "loggedout";
	}
	
	
function select_single(){
	$sql = "SELECT id FROM Users WHERE username='$name' limit 1";
	$result = mysql_query($sql);
	$value = mysql_fetch_object($result);
	
}



/* fetch whole row

$sth = $dbh->prepare("SELECT name, colour FROM fruit");
$sth->execute();

/* Fetch the first column from the next row in the result set 
print("Fetch the first column from the next row in the result set:\n");
$result = $sth->fetchColumn();
print("name = $result\n");

print("Fetch the second column from the next row in the result set:\n");
$result = $sth->fetchColumn(1);
print("colour = $result\n");

*/
	
	
?>