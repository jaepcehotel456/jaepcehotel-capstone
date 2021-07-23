<?php
 include('dbconnection.php');
session_start();



if (isset($_POST['avail_id'])) {

	$avail_id = $_POST['avail_id'];

	$room_number = $_POST['room_number'];

	$availability = $_POST['availability'];

	$sql="UPDATE available_rooms

		  SET 
		
		  room_number = '{$_POST['room_number']}',
		  availability = '$availability'


		  WHERE
		  

		  avail_id = '$avail_id'";



	 $result=mysqli_query($databaseconnection,$sql);

	//header("location: ./?page_id=listavailableroom");



	


}


?>
