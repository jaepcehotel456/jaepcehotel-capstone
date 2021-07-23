<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "jaepce");

$room_id = $_POST['room_id'];

if (isset($_POST['room_id'])) 
{

	$sql="SELECT * FROM room WHERE room_id = $room_id";

	// if ($sql == false) {
	// 	# code...
	// }

    $result= mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);

    echo json_encode($row);


}


?>