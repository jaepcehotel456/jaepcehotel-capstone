<?php 

include('admin-navbar.php'); 
?>
<?php

$avail_id                   = $_SESSION['avail_id'];
$person_id                  = $_SESSION['person_id1'];
$payment_method             = $_SESSION['payment_method'];
$checkin                    = $_SESSION['checkin'];
$checkout                   = $_SESSION['checkout'];
$checkin1                   = $_SESSION['checkin1'];
$checkout1                  = $_SESSION['checkout1'];
$extra_bed                  = $_SESSION['extra_bed'];
$creatorName                = $_SESSION['creatorName'];
$dateCreated                = $_SESSION['dateCreated'];
$availability               = $_SESSION['availability'];
$status                     = $_SESSION['status'];
$confirmation               = $_SESSION['confirmation'];
$transaction_type           = $_SESSION['transaction_type'];
$gender                     = $_SESSION['gender1'];
$fname                      = $_SESSION['fname1'];
$midname                    = $_SESSION['midname1'];
$lname                      = $_SESSION['lname1'];
$email1                     = $_SESSION['email1'];
$bill                       = $_SESSION['bill'];
$room_no                    = $_SESSION['room_no'];
$room_id                    = $_SESSION['room_id'];
$days                       = $_SESSION['days'];


?>

<section class="mb-5">
	<div class="container mt-5" style="border: solid 1px;">
			<h2 class="my-4 text-center">CREDIT CARD PAYMENT</h2>
	<form action="admin-charge" method="post" id="payment-form" class="mb-4">
	  <div class="form-row">
	    <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
	    <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
	    <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
	    <input type="hidden" name="bill" value="<?php echo $bill ?>">
	    <input type="hidden" name="transaction_type" value="<?php echo $transaction_type?>">
        <input type="hidden" name="payment_method" value="<?php echo $payment_method?>">
	    <input type="hidden" name="confirmation" value="<?php echo $confirmation?>">
        <input type="hidden" name="avail_id" value="<?php echo $avail_id?>">
        <input type="hidden" name="person_id" value="<?php echo $person_id?>">
        <input type="hidden" name="checkin" value="<?php echo $checkin?>">
        <input type="hidden" name="checkout" value="<?php echo $checkout?>">
        <input type="hidden" name="extra_bed" value="<?php echo $extra_bed?>">
        <input type="hidden" name="creatorName" value="<?php echo $creatorName?>">
        <input type="hidden" name="dateCreated" value="<?php echo $dateCreated?>">
        <input type="hidden" name="availability" value="<?php echo $availability?>">
        <input type="hidden" name="status" value="<?php echo $status?>">
        <input type="hidden" name="gender" value="<?php echo $gender?>">
        <input type="hidden" name="fname" value="<?php echo $fname?>">
        <input type="hidden" name="midname" value="<?php echo $midname?>">
        <input type="hidden" name="lname" value="<?php echo $lname?>">
        <input type="hidden" name="email1" value="<?php echo $email1?>">
        <input type="hidden" name="room_no" value="<?php echo $room_no?>">
        <input type="hidden" name="room_id" value="<?php echo $room_id?>">
        <input type="hidden" name="days" value="<?php echo $days?>">
        
	    <!-- <div id="card-element" class="form-control"> -->
	      <!-- A Stripe Element will be inserted here. -->
	    <!-- </div> -->


	



				
                    <div class="input-group mb-3">
                       
                        <span id="card-number" class="form-control" >
                            <!-- Stripe Card Element -->
                        </span>
                    </div>
                   
                    <div class="input-group mb-3">
                        
                        <span id="card-cvc" class="form-control">
                            <!-- Stripe CVC Element -->
                        </span>


                         <span id="card-exp" class="form-control ml-2">
                           <!--  Stripe Card Expiry Element -->
                        </span>


                        
                    </div>
                  


	    <!-- Used to display Element errors. -->
	    <div id="card-errors" role="alert"></div>
	  </div>

	  <button class="mt-5">Submit Payment</button>
	</form>
	
</section>