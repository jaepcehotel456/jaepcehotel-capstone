<?php
 include('dbconnection.php');
session_start();


if (isset($_POST['transaction_id'])) {

	$transaction_id = $_POST['transaction_id'];
	$avail_id = $_POST['avail_id'];
	$room_number = $_POST['room_no'];
	$room_id = $_POST['room_id'];
	$transaction_type = $_POST['transaction_type'];
	$availability = $_POST['availability'];

	$sql="UPDATE transaction

		  SET 
			
		  
		  transaction_type = '{$_POST['transaction_type']}'


		  WHERE
		  

		  transaction_id = '$transaction_id'";



	 $result=mysqli_query($databaseconnection,$sql);


	 //$sql1="UPDATE available_rooms

		//  SET 
			
		//  availability		   = '{$_POST['availability']}'


		//  WHERE
		  

	//	  avail_id = '$avail_id'";



	// $result1=mysqli_query($conn,$sql1);


	// header("location: ./?page_id=admin-pending-reservation");
echo "<meta http-equiv='refresh' content='0' URL='./?page_id=admin-pending-reservation'";


	


}



?>
