<?php
 include('dbconnection.php');
session_start();



if (isset($_POST['transaction_id'])) {

	$status = $_POST['status'];
	$transaction_id = $_POST['transaction_id'];
	$transaction_type = 'paid';
	$payment_method = $_POST['payment_method'];
	$sql="UPDATE transaction

		  SET 
			
		  status		   = '{$_POST['status']}',	
		  transaction_type = '$transaction_type',
		  payment_method = '$payment_method'


		  WHERE
		  

		  transaction_id = '$transaction_id'";



	 $result=mysqli_query($databaseconnection,$sql);



	// header("location: ./?page_id=admin-online-bookings");
	 echo "<meta http-equiv='refresh' content='0;URL='./?page_id=admin-online-bookings''";
	 // <meta http-equiv="refresh" content="0;URL='./?page_id=admin-checkout-rooms'" /> 



	


}



?>
