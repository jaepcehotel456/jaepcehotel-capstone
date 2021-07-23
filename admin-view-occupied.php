<?php
include('dbconnection.php');
session_start();



$room_no = $_POST['room_number'];

if (isset($_POST['room_number'])) 
{
	$sql="SELECT * FROM transaction WHERE room_no = '$room_no'";

    $result= mysqli_query($databaseconnection,$sql);

    $row = mysqli_fetch_array($result);

    echo json_encode($row);
}



?>