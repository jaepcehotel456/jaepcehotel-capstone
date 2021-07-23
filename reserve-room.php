<?php include('customer-navbar.php'); ?>
			<?php
				$conn = mysqli_connect("localhost", "root", "", "jaepce");

                $avail_id = $_REQUEST['avail_id'];

				$id = $_REQUEST['room_id'];

				$sql="SELECT * FROM room WHERE room_id = '$id'";
				$result= mysqli_query($conn,$sql);
				$data1=mysqli_fetch_assoc($result);
				?>
<!--  -->
			<?php

				$conn = mysqli_connect("localhost", "root", "", "jaepce");

				$id = $_SESSION['person_id'];

				$sql="SELECT * FROM person WHERE person_id = '$id'";
				$result= mysqli_query($conn,$sql);
				$data=mysqli_fetch_assoc($result);
			?>


         <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text text-left">
                            <h2 class="text-white" >Customer Booking</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
 <section>

<form class="form-register" method="POST" action="reserve-room-process" enctype="multipart/form-data">

                    <input type='hidden' name='room_id' id="room_id" value='<?php echo $data1['room_id'];?>'>
                     <div class="row my-0" style="background-color: #dfa974;">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container">
                                        <h3 class="card-title">Fill up the form *</h3>
                                        <div class="row">
                                        <input type='hidden' name='status' value='Pending' id="status">
                                      
                                         <div class="col-sm-5">
                                            <div class = "form-group">
												<label >Check In</label>
												<?php $date = date('Y-m-d') ?>
												<form action="reserve-room.php" method="GET">
												<input type = "date" class = "form-control checkIn" data-link-format="yyyy-mm-dd" name = "checkin" required = "required" id="checkin"  min="<?php echo $date ?>" />
												
												 </form>
												 
												 
											</div>
                                    	 </div>
                                    	 <div class="col-sm-5">
                                    	 	<div class = "form-group">
												<label>Check Out</label>
												
												<input type = "date" class = "form-control checkOut" data-link-format="yyyy-mm-dd" name = "checkout" required = "required" id="checkout"  />
											</div>
                                    	 </div>
                                    	 
								
                                    	 <div class="col-sm-5">
                                    	 	<div class = "form-group">
												<label>Extra Bed</label>
												<input type = "number" class = "form-control" min = "0" name = "extra_bed" required = "required" id="extra_bed" />
											</div>
                                    	 </div>
                                         
                                         <div class="col-sm-5">
                                    	 	<div class = "form-group">
                                        			<label class="text-warning">*Optional*</label>
                                        			<label>Coupon Code: </label>
                                        		
                                        			<input class="form-control" type="text" name="coupon" id="coupon" />
                                        			
                                        		
											</div>
                                    	 </div>
                               
                                             
                                       
                                         <div class="col-sm-5">
                                            <div class = "form-group">
                                                <label style="opacity: 0.5;">Reserve or Online Payment<span style="color: red;">*</span></label>
                                                <select name="pay_con" class="form-control" required>
                                                    <option value="1">Reserve Only</option>
                                                    <option value="2">Online Payment</option>
                                                </select>
                                            </div>
                                         </div>
                                         
                                            <div class="col-sm-10">
                                                 <div class="d-block">
                                                         <button onclick="return confirm('Do you want to continue?')" class="btn-join btn-lg btn-primary text-uppercase" name="reservebtn" id="submitBtn" data-toggle="modal" data-target="#confirm-submit">Continue</button>
                                                          <input type='hidden' name='transaction_type' value='pending' id="transaction_type">
                                                          <input type="hidden" name="avail_id" value="<?php echo $avail_id; ?>">
                                                     </div>
 

                                            </div>

                                           <!--  <div class="col-sm-5">
													<div class="form-group">
                                                         <button class="btn-join btn-lg btn-primary text-uppercase" name="onlinebtn">Online Payment</button>
                                                         <p style="color: red;">Optional*</p>
                                                     </div>
                                            </div> -->
                                       </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


              
<!-- 
                      <div class="row my-5" style="background-color:black">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container"> 
                                              <div class="d-block">
                                                         <button class="btn-join btn-lg btn-primary text-uppercase" name="updatebtn">Update Profile</button>
                                                     </div>

                                       </div> 
                                    </div>
                                </div>
                            </div>
                         </div> -->
              
                         
                     </form>
                 </div>
          </section>


<!-- modal confirmation before submitting -->

<!-- 
<script>
   


         $('#submitBtn').click(function() {
         $('#room_id').text($('#room_id').val());
         $('#status').text($('#status').val());
         $('#checkin').text($('#checkin').val());
         $('#checkout').text($('#checkout').val());
         $('#extra_bed').text($('#extra_bed').val());
         $('#transaction_type').text($('#transaction_type').val());
        });

        $('#submit').click(function(){
            alert('submitting');
            $('#formfield').submit();
        });



  
</script> -->