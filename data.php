<?php
header('Content-Type: application/json');


// $conn = mysqli_connect("localhost","root","","jaepce");
require_once('dbconnection.php');


$sqlQuery = "SELECT year(checkout) AS year, month(checkout) as month,sum(bill) AS total_bills FROM transaction WHERE status = 'CheckOut' AND year(checkout) = YEAR(CURDATE()) GROUP BY month";

$result = mysqli_query($databaseconnection,$sqlQuery);

$data = array();
foreach ($result as $row) {
	
	$data[] = $row;
	
}

mysqli_close($databaseconnection);

echo json_encode($data);
?>