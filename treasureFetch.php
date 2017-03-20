<?php 
require "conn.php";
	$selectedId = $_GET['sectionId'];
	$mysql_qry = "SELECT COUNT(CASE WHEN Move = 1 THEN 1 ELSE NULL END) AS Warmer, 
					COUNT(CASE WHEN Move = 0 THEN 1 ELSE NULL END) AS Colder, 
					COUNT(CASE WHEN Move = 2 THEN 1 ELSE NULL END) AS Flag 
					FROM treasure 
					WHERE SecId='$selectedId';";

	$result = $conn->query($mysql_qry);

	if($result->num_rows > 0) {
		//echo "Successfully retrieved info";
	}
	else {
		//echo "No records";
	}
	
	//$N = mysql_num_rows($mysql_qry);
	while ($row = $result->fetch_assoc() )
	{
		$colder = $row['Colder'];
		$warmer = $row['Warmer'];
		$flag = $row['Flag'];
		
	}


	$max = max($colder, $warmer, $flag);

	if ($colder === $max){
		echo "blue";
	}
	elseif ($warmer === $max){
		echo "red";
	}
	elseif ($flag === $max){
		echo "green";
	}
	else{
		echo "Error aggregating";
	}
	
	
	

mysqli_close($conn); 
?>