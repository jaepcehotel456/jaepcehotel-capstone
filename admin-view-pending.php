<?php 
 include('dbconnection.php');
session_start();



$transaction_id = $_POST['transaction_id'];

if (isset($_POST['transaction_id'])) 
{

	$sql="SELECT * FROM transaction INNER JOIN room ON transaction.room_id=room.room_id INNER JOIN available_rooms ON transaction.room_id=available_rooms.room_id  WHERE transaction.transaction_id = '$transaction_id' AND available_rooms.availability != 'Unavailable'";

	// if ($sql == false) {
	// 	# code...
	// }

    $result= mysqli_query($databaseconnection,$sql);

    $row = mysqli_fetch_array($result);

    echo json_encode($row);


}


?>