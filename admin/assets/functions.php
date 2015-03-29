<?php 
	session_start();
	
	//database connection
//save employee
	if($_GET['action'] == "saveemployee"){
		require 'db_connection.php';
		$conn = dbConnect();
		$empid = $_GET['empid'];
		$lname = $_GET['lname'];
		$mname = $_GET['mname'];
		$fname = $_GET['fname'];
		$designation = $_GET['designation'];
		$sqlinsert = "INSERT INTO employee(empNo,lname,fname,mname,designation) VALUES('$empid','$lname','$fname','$mname','$designation')";
		//$sqldelete = "DELETE FROM employee where eid='$eid'";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		//$conn = null;
		//echo $empid;
		//session_destroy();
		//echo "saved";
	}
//delete employee
	if($_GET['action'] == "deleteemployee"){
		require 'db_connection.php';
		$conn = dbConnect();
		$eid = $_GET['eid'];
		$sqldelete = "DELETE FROM employee where eid='$eid'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;
		//echo $eid;
		//session_destroy();
		//echo "loggedout";
	}
//logout user
	if($_GET['action'] == "logout"){
		
		session_unset();
		session_destroy();
		echo "loggedout";
	}

//save user
	if($_GET['action'] == "saveuser"){
		
		//session_destroy();
		echo "loggedout";
	}

//update user
	if($_GET['action'] == "updateuser"){
		//$_GET['userID'];
		//session_destroy();
		echo "loggedout";
	}

//delete user
	if($_GET['action'] == "deleteuser"){
		
		//$_GET['userID'];
		//session_destroy();
		echo "loggedout";
	}
//delete employee
	

	
function select_single(){
	$sql = "SELECT id FROM Users WHERE username='$name' limit 1";
	$result = mysql_query($sql);
	$value = mysql_fetch_object($result);
	
}

function selectListSQL($q){
	require 'db_connection.php';
	$conn = dbConnect();
	//alert($q);
	//$conn->query($sql)
	$stmt = $conn->prepare($q);
	//echo "test";
	$stmt->execute();
	//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	$rows = $stmt->fetchAll();
	//$result = mysql_query($q);
	//print_r($rows);
	//return $rows;
	/*echo $q;
	$sth = $dbh->prepare($q);
	
	$result = $sth->fetchAll();
	
	return $result;*/
	//$sql = "SELECT id, firstname, lastname FROM MyGuests";
	//$result = $conn->query($q);
	//print_r($rows);
	return $rows;
	$conn = null;
	
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