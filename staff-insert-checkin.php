<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "jaepce");

if (isset($_POST['transaction_id'])) {

	$status = $_POST['status'];
	$transaction_id = $_POST['transaction_id'];


	$sql="UPDATE transaction

		  SET 
			
		  status		   = '{$_POST['status']}'	


		  WHERE
		  

		  transaction_id = '$transaction_id'";



	 $result=mysqli_query($conn,$sql);



	// header("location: ./?page_id=admin-online-bookings");
	 echo "<meta http-equiv='refresh' content='0;URL='./?page_id=staff-online-bookings''";



	


}



?>
