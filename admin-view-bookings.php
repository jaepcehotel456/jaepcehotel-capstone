<?php 
 include('dbconnection.php');
session_start();



$transaction_id = $_POST['transaction_id'];

if (isset($_POST['transaction_id'])) 
{

	$sql="SELECT * FROM transaction INNER JOIN room ON transaction.room_id=room.room_id INNER JOIN available_rooms ON transaction.room_id=available_rooms.room_id  WHERE transaction.transaction_id = '$transaction_id' AND transaction.transaction_type != 'pending'";

	//$sql="SELECT * FROM transaction  WHERE transaction_id = '$transaction_id' ";


	// if ($sql == false) {
	// 	# code...
	// }

    $result= mysqli_query($databaseconnetion,$sql);

    $row = mysqli_fetch_array($result);

    echo json_encode($row);


}


?>