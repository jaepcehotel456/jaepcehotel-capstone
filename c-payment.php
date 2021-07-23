<?php include('customer-navbar.php'); 
include('dbconnection.php'); ?>
<?php


$confirmation     = $_SESSION['confirmation'];
$room_id          = $_SESSION['room_id'];     
$extra_bed        = $_SESSION['extra_bed'];   
//$status           = $_SESSION['status'];      
$checkin          = $_SESSION['checkin'];     
$checkout         = $_SESSION['checkout'];
$bill             = $_SESSION['bill'];    
//$avail_id         = $_SESSION['avail_id'];
$promo            = $_SESSION['promo'];
$coupon           = $_SESSION['coupon'];
$room_no          = $_SESSION['room_no'];
$days             = $_SESSION['days'];
$creatorId        = $_SESSION['creatorId'];
    




//$sql="SELECT * FROM available_rooms WHERE avail_id={$avail_id}";
//$result=mysqli_query($databaseconnection,$sql);
//$data=mysqli_fetch_assoc($result);





?>
<section class="mb-5">
	<div class="container mt-5" style="border: solid 1px;">
			<h2 class="my-4 text-center">ONLINE PAYMENT</h2>

      <?php

        $id = $_SESSION['person_id'];
        $sql1="SELECT * FROM person WHERE person_id = '$id'";
        $result1= mysqli_query($databaseconnection,$sql1);
        $data1=mysqli_fetch_assoc($result1);


        $creatorName        = $data1['fname'];
        $midname            = $data1['midname'];
        $lname              = $data1['lname'];
        $email              = $data1['email']; 
        $gender             = $data1['gender']; 

      ?>

      <?php   

                $sql     = "SELECT * FROM room  WHERE $room_id = room_id ";
                $results = mysqli_query($databaseconnection,$sql); 
                $data    = mysqli_fetch_assoc($results);

                $value = $data['room_price'];
                $room_type = $data['room_name'];
?>



      <div class="d-flex justify-content-center">
        
            
            <div class="ri-text">
                

                
               <!--  <a href="#" class="primary-btn">More Details</a> -->
            </div>

        </div>
<form action="c-payment-process" method="post" id="payment-form" class="mb-4">
    

      <!-- <div class="d-flex justify-content-center" id="paypal-payment-button"> </div> -->
      <br>
      <br>
      <div class="col-sm-2"> </div>

      <div class="col-sm-5">
      <div class = "form-group">

      <img src="uploads/<?php echo $data['room_photo'] ?>" height="300px" alt="" class="border border-secondary">
      </div>
      </div>




      <div class="col-sm-2">
      <div class = "form-group">
      <label >Check-in Date:</label>
      <input type="hidden" name="checkin" value="<?php echo $checkin;?>">
      <p><?php   echo "$checkin";?> </p> 
      </div>
      </div>

      <div class="col-sm-2">
      <div class = "form-group">
      <label>Check-out Date:</label>
      <p><?php   echo "$checkout";?> </p>
      <input type="hidden" name="checkout" value="<?php echo $checkout;?>">
      </div>
      </div>

      <div class="col-sm-2">
      <div class = "form-group">
      <label>Room Price:</label>
      <p> <?php   echo "$value";?> </p>
      <input type="hidden" name="value" value="<?php echo $value;?>">
      </div>
      </div>

      <div class="col-sm-2">
      <div class = "form-group">
      <label>Total Night/s:</label>
      <p> <?php   echo "$days";?> </p>
      <input type="hidden" name="days" value="<?php echo $days;?>">
      </div>
      </div>

      <?php

      if ($promo != "") {

        $query1 = mysqli_query($databaseconnection, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon' && `status` = 'Valid'") or die(mysqli_error());
        $count1 = mysqli_num_rows($query1);
        $fetch1 = mysqli_fetch_array($query1);
        
        if ($count1 > 0) {
            
        $discount = $fetch1['discount'] / 100;
        
        $discounts = $fetch1['discount'];
        

      ?>

      <div class="col-sm-5">
      <div class = "form-group">
      <label>Promo:</label>
      <p><?php   echo "$discounts";?> %</p>
      <input type="hidden" name="discounts" value="<?php echo $discounts;?>">
      </div>
      </div>

      <?php
    }
  }

      ?>

      

      
      <div class="col-sm-2">
      <div class = "form-group">
        <br><br>
      <label>Total bill:</label>
      <p> P <?php   echo "$bill";?> .00 </p>
      <input type="hidden" name="bill" value="<?php echo $bill;?>">
      </div>
      </div>


	   




                     
      <!--<input type="hidden" name="room_no" value="<?php echo $room_no;?>">
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
     <input type="hidden" name="days" value="<?php echo $days;?>">    -->



    
    





	    <!-- Used to display Element errors. -->
	    <br>
      <div class="col-sm-15">
      <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>

	  </div>



	  <!-- <button class="mt-5" onclick="return confirm('Submit Form?')">Submit Payment</button> -->
	</form>


	
</section>



<script src="https://www.paypal.com/sdk/js?client-id=ATgeWa2hx15X82AYktLW_y3AITEEa3NeCPTpTUYOM3UZwNEPkdzhYM652E-AZDh4C5NFPw5IcdrF6E8z&currency=PHP" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'pay',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"JAEPCE Hotels <?php echo "$room_type" ?> with <?php echo "$days" ?> day/s stay","amount":{"currency_code":"PHP","value":<?php echo "$bill";?>},application_context: {
          shipping_preference:'NO_SHIPPING',
        }}]
          }); 
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction successfull thank you for your payment: ' + details.payer.name.given_name + '!');
              
            window.location.href = "./?page_id=c-payment-process&room_id=<?php echo $room_id; ?>&confirmation=<?php echo $confirmation; ?>&extra_bed=<?php echo $extra_bed; ?>&checkin=<?php echo $checkin; ?>&checkout=<?php echo $checkout; ?>&bill=<?php echo $bill; ?>&promo=<?php echo $promo; ?>&coupon=<?php echo $coupon; ?>&room_no=<?php echo $room_no; ?>&days=<?php echo $days; ?>&creatorId=<?php echo $creatorId; ?>";
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>










<!--<script src="https://www.paypal.com/sdk/js?client-id=ATgeWa2hx15X82AYktLW_y3AITEEa3NeCPTpTUYOM3UZwNEPkdzhYM652E-AZDh4C5NFPw5IcdrF6E8z"></script>
<script>paypal.Buttons({
        style:{
          color:'blue',
          shape:'pill'
        },

//        createOrder:function(data, action){
//          return actions.order.create({
//            purchase_unit:[{
//              amount:{
//                value: '<?php echo $bill ?>'
//              }
//            }]
//          });
//        },
//
//        onApprove:function(data, actions){
//         return actions.order.capture().then(function(details){
//            console.log(details)
//            window.location.replace(url:"")
//          })
            
//        }



}).render('#paypal-payment-button');</script>


-->