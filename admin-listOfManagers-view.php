<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "jaepce");

$person_id = $_POST['person_id'];

if (isset($_POST['person_id'])) 
{

	$sql="SELECT * FROM room WHERE person_id = $room_id AND person_type = 'manager'";

	// if ($sql == false) {
	// 	# code...
	// }

    $result= mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);

    echo json_encode($row);


}


?>