<?php include('dbconnection.php');



	

$confirmation     = $_GET['confirmation'];
$creatorId        = $_GET['creatorId'];
$room_id          = $_GET['room_id'];     
$extra_bed        = $_GET['extra_bed'];   
//$status           = $_GET['pending'];      
$checkin          = $_GET['checkin'];     
$checkout         = $_GET['checkout'];
$bill             = $_GET['bill'];    
//$avail_id         = $_SESSION['avail_id'];
$promo            = $_GET['promo'];
$coupon           = $_GET['coupon'];
$room_no          = $_GET['room_no'];
$days             = $_GET['days'];
$status             = "pending";
$dateCreated        = date('Y-m-d H:i:s');
$transaction_type   = "paid";
$payment_method     = "credit card";


$sql="SELECT * FROM person WHERE $creatorId = person_id";
$result=mysqli_query($databaseconnection,$sql);
$data=mysqli_fetch_assoc($result);

$creatorName        = $data['fname'];
$midname            = $data['midname'];
$lname              = $data['lname'];
$email              = $data['email']; 
$gender             = $data['gender']; 



 $sql="INSERT INTO transaction (person_id, 
	room_id, 
	gender, 
	fname, 
	midname, 
	lname, 
	email, 
	room_no, 
	transaction_type, 
	extra_bed, 
	status, 
	payment_method, 
	days, 
	checkin, 
	checkout, 
	bill, 
	transaction_date, 
	createdby, 
	confirmation, 
    promo,
    coupon)
	VALUES
	('$creatorId',
	 '$room_id',
	 '$gender',
	 '$creatorName',
	 '$midname',
	 '$lname',
	 '$email',
	 '$room_no',
	 '$transaction_type',
	 '$extra_bed',
	 '$status',
	 '$payment_method',
	 '$days',
	 '$checkin',
	 '$checkout',
	 '$bill',
	 '$dateCreated',
	 '$creatorName',
	 '$confirmation', 
     '$promo',
     '$coupon')";

	$result=mysqli_query($databaseconnection,$sql);

		if ($result) {
			 echo "<script>alert('Payment Successful! You may check your transaction history in history page. Please print the form and bring it upon checking in. Thank you! ')</script>";
			?>
			<meta http-equiv="refresh" content="0;URL='./?page_id=customer-booking-history" />
		
		<?php
		}else{
			echo "<script>alert('error')</script>";
			mysqli_error($databaseconnection);
		}









?>