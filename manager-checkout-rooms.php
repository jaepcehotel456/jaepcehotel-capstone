<?php 
require 'managersession.php';
error_reporting(0);
$transaction_id = $_REQUEST['transaction_id'];

$room_no = $_REQUEST['room_id'];


require 'dbconnection.php';

$sql = "UPDATE transaction 
		SET status = 'CheckOut', transaction_type = 'paid'
		WHERE transaction_id = $transaction_id";

		$result=mysqli_query($databaseconnection,$sql);

$sql1 = "UPDATE available_rooms 
		 SET availability = 'Available'
		 WHERE room_number = $room_no";

		 $result1=mysqli_query($databaseconnection,$sql1);


		if ($result1) {
		    ?>
		    <meta http-equiv="refresh" content="0;URL='./?page_id=m-checkout-rooms'" /> 
		    
		    <?php
				} else {
		    echo "<script>alert('Error On Updating')</script>";

		}



?>
