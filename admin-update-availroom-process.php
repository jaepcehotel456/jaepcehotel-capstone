<?php
 include('dbconnection.php');
session_start();



$avail_id = $_POST['avail_id'];

if (isset($_POST['avail_id'])) 
{
	$sql="SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id WHERE available_rooms.avail_id = '$avail_id'";

    $result= mysqli_query($databaseconnection,$sql);

    $row = mysqli_fetch_array($result);

    echo json_encode($row);
}



?>