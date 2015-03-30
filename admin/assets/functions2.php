<?php
require 'db_connection.php';

function selectListSQL2($q){
	
	$conn = dbConnect();
	$stmt = $conn->prepare($q);
	$stmt->execute();
	$rows = $stmt->fetchAll();
	
	return $rows;

	$conn = null;
	
}

?>