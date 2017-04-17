<?php 
require "conn.php";

$sec_no = $_POST["sectionNo"];
$move = $_POST["Move"];
	

	$mysql_qry = "INSERT INTO treasure (InstId, SecId, Move) VALUES (NULL, $sec_no, move);";
	if($conn->query($mysql_qry) === TRUE) {
		echo " Insert success";
	}
	else {
		echo " insert not success";
	}
	


mysqli_close($conn); 
?>