<?php
	include 'dbconnection.php';

	$coupon_code = $_POST['coupon'];
	$bill = $_POST['bill'];
	$transaction_id = $_POST['transaction_id'];
	
	if ($coupon_code == "") {
		echo "<script>alert('Please Enter a Promo Code!')</script>";
		?>
		<meta http-equiv="refresh" content="0;URL='./?page_id=c-view-room-details&transaction_id=<?php echo $transaction_id;?>'" />
		<?php
	}else{
	$query = mysqli_query($databaseconnection, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'") or die(mysqli_error());
	$count = mysqli_num_rows($query);
	$fetch = mysqli_fetch_array($query);
		if ($count > 0) {
			
		$discount = $fetch['discount'] / 100;
		$total = $discount * $bill;
		$discounts = $fetch['discount'];
		$newbill = $bill - $total;
		
		$sql="
		UPDATE 
		transaction 
		SET 
		bill  = '{$newbill}',
		promo = 1

		WHERE transaction_id='$transaction_id'";

		$result=mysqli_query($databaseconnection,$sql);
		echo "<script>alert('Promo Code Activated and Total Bill is Discounted by: $discounts%')</script>";
		?>
		<meta http-equiv="refresh" content="0;URL='./?page_id=c-view-room-details&transaction_id=<?php echo $transaction_id;?>'" />
		<?php }else{
			echo "<script>alert('Invalid Promo Code!')</script>";
		?>
		<meta http-equiv="refresh" content="0;URL='./?page_id=c-view-room-details&transaction_id=<?php echo $transaction_id;?>'" />
		<?php
		}}

?>


