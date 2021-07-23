<?php
 include('dbconnection.php');
session_start();





	$status = 'CheckIn';
	$transaction_id = $_POST['transaction_id'];
	$transaction_type = 'paid';
	$payment_method = $_POST['payment_method'];
	$sql="UPDATE transaction

		  SET 
			
		  status		   = '$status',	
		  transaction_type = '$transaction_type',
		  payment_method = '$payment_method'


		  WHERE
		  

		  transaction_id = '$transaction_id'";



	 $result=mysqli_query($databaseconnection,$sql);



	 header("location: ./?page_id=staff-online-bookings");
	 echo "<meta http-equiv='refresh' content='0;URL='./?page_id=staff-online-bookings''";
	 // <meta http-equiv="refresh" content="0;URL='./?page_id=admin-checkout-rooms'" /> 



	





?>
