<?php include('customer-navbar.php'); ?>
<?php

$confirmation     = $_SESSION['confirmation'];
$room_id          = $_SESSION['room_id'];     
$extra_bed        = $_SESSION['extra_bed'];   
$status           = $_SESSION['status'];      
$checkin          = $_SESSION['checkin'];     
$checkout         = $_SESSION['checkout'];
$bill             = $_SESSION['bill'];    
$avail_id         = $_SESSION['avail_id'];
$promo            = $_SESSION['promo'];
$coupon           = $_SESSION['coupon'];

$sql="SELECT * FROM available_rooms WHERE avail_id={$avail_id}";
$result=mysqli_query($databaseconnection,$sql);
$data=mysqli_fetch_assoc($result);

?>
<section class="mb-5">
	<div class="container mt-5" style="border: solid 1px;">
			<h2 class="my-4 text-center">CREDIT CARD PAYMENT</h2>
	<form action="customer-charge" method="post" id="payment-form" class="mb-4">
	  <div class="form-row">
	    <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
	    <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
	    <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
      <input type="hidden" name="room_no" value="<?php echo $data['room_number'];?>">
      <input type="hidden" name="avail_id" value="<?php echo $avail_id;?>">
      <input type="hidden" name="bill" value="<?php echo $bill;?>">
	    <input type="hidden" name="room_id" value="<?php echo $room_id;?>">
      <input type="hidden" name="extra_bed" value="<?php echo $extra_bed;?>">
      <input type="hidden" name="checkin" value="<?php echo $checkin;?>">
      <input type="hidden" name="checkout" value="<?php echo $checkout;?>">
      <input type="hidden" name="status" value="<?php echo $status;?>">
	    <input type="hidden" name="transaction_type" value="paid">
      <input type="hidden" name="payment_method" value="credit card">
	    <input type="hidden" name="confirmation" value="<?php echo $confirmation;?>">
      <input type="hidden" name="promo" value="<?php echo $promo;?>">
      <input type="hidden" name="coupon" value="<?php echo $coupon;?>">
	    <!-- <div id="card-element" class="form-control"> -->
	      <!-- A Stripe Element will be inserted here. -->
	    <!-- </div> -->


	    <!-- Testing 1 -->



					<!-- <label for="card-number">Credit Card Number</label> -->
                    <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text">C</span>
                        </div> -->
                        <span id="card-number" class="form-control" >
                            <!-- Stripe Card Element -->
                        </span>
                        <!-- <div class="input-group-append">
                            <span class="input-group-text">D</span>
                        </div> -->
                    </div>
                   <!--  <label for="card-cvc">CVC Number</label> -->
                    <div class="input-group mb-3">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text">E</span>
                        </div> -->
                        <span id="card-cvc" class="form-control">
                            <!-- Stripe CVC Element -->
                        </span>


                         <span id="card-exp" class="form-control ml-2">
                           <!--  Stripe Card Expiry Element -->
                        </span>


                        
                    </div>
                    <!-- <label for="card-exp">Expiration</label> -->



                  <!--   <div class="input-group mb-3">
                        <span id="card-exp" class="form-control"> -->

                           <!--  Stripe Card Expiry Element -->

                      <!--   </span> -->

                        <!-- <div class="input-group-append">
                            <span class="input-group-text">F</span>
                        </div> -->



          <!--           </div> -->














	    <!-- Testing 1 -->









	    <!-- Used to display Element errors. -->
	    <div id="card-errors" role="alert"></div>
	  </div>

	  <button class="mt-5" onclick="return confirm('Submit Form?')">Submit Payment</button>
	</form>
	
</section>