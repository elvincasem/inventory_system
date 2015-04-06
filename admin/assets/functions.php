<?php 
	session_start();
	require 'db_connection.php';
	//database connection
//save employee
	if($_GET['action'] == "saveemployee"){
		
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
		$conn = null;
		//echo $empid;
		//session_destroy();
		//echo "saved";
	}
//delete employee
	if($_GET['action'] == "deleteemployee"){
		//require 'db_connection.php';
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

	
//save Item

//save item
	if($_GET['action'] == "saveitem"){
		//require 'db_connection.php';
		$conn = dbConnect();
		$description = $_GET['description'];
		$unit = $_GET['unit'];
		$unitcost = $_GET['unitcost'];
		
		$sqlinsert = "INSERT INTO items(description,unit,unitcost) VALUES('$description','$unit',$unitcost)";
		//$sqldelete = "DELETE FROM employee where eid='$eid'";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		$conn = null;
		//echo $empid;
		//session_destroy();
		//echo "saved";
	}
//delete item
	if($_GET['action'] == "deleteitem"){
		//require 'db_connection.php';
		$conn = dbConnect();
		$itemno = $_GET['itemno'];
		$sqldelete = "DELETE FROM items where itemNo='$itemno'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;
		//echo $eid;
		//session_destroy();
		//echo "loggedout";
	}
//delete pr
if($_GET['action'] == "deletepr"){
		//require 'db_connection.php';
		$conn = dbConnect();
		$prid = $_GET['transID'];
		$qu = "DELETE FROM pr_list where transID='$prid'";
		//echo $qu;
		$sqldelete = "DELETE FROM pr_list where transID='$prid'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;
		//echo $eid;
		//session_destroy();
		//echo "loggedout";
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
//show designation
	if($_GET['action'] == "showdesignation"){
		$conn = dbConnect();
		$employeeid = $_GET['eid'];
		//echo $employeeid;
		//$sql = "SELECT designation FROM employee WHERE eid='$employeeid' limit 1";
		$sth = $conn->prepare("SELECT designation FROM employee WHERE eid='$employeeid'");
		$sth->execute();
		//$result = mysql_query($sql);
		//$value = mysql_fetch_object($result);
		$value = $sth->fetchColumn();
		//print_r($sth);
		//session_destroy();
		echo "$value";
	}
//save pr
	if($_GET['action'] == "savepurchaserequest"){
		//require 'db_connection.php';
		$conn = dbConnect();
		$prnumber = $_GET['prno'];
		$department = $_GET['department'];
		$officeid = $_GET['offices'];
		$getoffice = $conn->prepare("SELECT office FROM offices where transid=$officeid");
		$getoffice->execute();
		$officename = $getoffice->fetchColumn();
		$requestdate = $_GET['requestdate'];
		$purpose = $_GET['purpose'];
		$requestedby = $_GET['requestedby'];
		$name = $conn->prepare("SELECT fname, mname, lname FROM employee where eid='$requestedby'");
		$name->execute();
		$result = $name->fetch(PDO::FETCH_ASSOC);
		$fname = $result['fname'];
		$mname = $result['mname'];
		$lname = $result['lname'];
		$result = $fname . ' ' .$mname. ' ' . $lname;
		$requesterbyname = $result;
		$designation = $_GET['designation'];
		$status = "PENDING";
		$sqlinsert = "INSERT INTO pr_list(prNo,department,section,prDate,purpose,requestedBy,designation,status) VALUES('$prnumber','$department','$officename','$requestdate','$purpose','$requesterbyname','$designation','$status')";
		
		//$sqldelete = "DELETE FROM employee where eid='$eid'";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		$conn = null;
		//echo $empid;
		//session_destroy();
		echo $sqlinsert;
	}

	if($_GET['action'] == "getlastpr"){
		
		$conn = dbConnect();
		$lastprid = $conn->prepare("SELECT prNo FROM pr_list ORDER BY transID DESC limit 1");
		$lastprid->execute();
		$result = $lastprid->fetch(PDO::FETCH_ASSOC);
		$lastpriddb = $result['prNo'];
		//echo "2";
		//print_r($lastpriddb);
		echo $lastpriddb;
	}
	
	if($_GET['action'] == "getitemdesc"){
		
		$itemid = $_GET['itemid'];
		$conn = dbConnect();
		$selecteditem = $conn->prepare("SELECT description,unit,unitCost FROM items WHERE itemNo=$itemid");
		$selecteditem->execute();
		$resultitem = $selecteditem->fetch(PDO::FETCH_ASSOC);
		//$lastpriddb = $resultitem['description'];
		//echo "2";
		print_r($resultitem);
		//echo $lastpriddb;
	}

	
function select_single(){
	$sql = "SELECT id FROM Users WHERE username='$name' limit 1";
	$result = mysql_query($sql);
	$value = mysql_fetch_object($result);
	
}

function selectListSQL($q){
	//require 'db_connection.php';
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
	//echo $rows;
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