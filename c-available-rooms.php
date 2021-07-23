<?php	include('customer-navbar.php'); 

?>
         <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text text-left">
                            <h2 class="text-white" >Check Availability</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
<?php
		
		$roomid   = $_GET['room_id'];
		$checkin  = $_SESSION['checkin'];
		$checkout = $_SESSION['checkout'];
		$total    = $_SESSION['total'];
        $room_no  = $_SESSION['room_no'];

		?>
                     <div class="row my-0" style="background-color: #dfa974;">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container">
                                    	<h3 class="card-title">Room is available in your selected dates</h3>
                                        <div class="row">
                                        <div class="container">

                                    	<?php   

                $sql     = "SELECT * FROM room  WHERE $roomid = room_id ";
                $results = mysqli_query($databaseconnection,$sql); 
                $data    = mysqli_fetch_assoc($results);

                ?>
        <div class="col-lg-4">
        
            <div class="room-item">
        
                <img src="uploads/<?php echo $data['room_photo'] ?>" height="300px" alt="">
            <div class="ri-text">
                <h4><?php echo ucfirst($data['room_name']) ?></h4>
                <h3><?php echo number_format($data['room_price'])?>.00<span>/Pernight</span></h3>
                <table>
                <tbody>
                <tr>
                <td class="r-o">Bed Size:</td>
                <td><?php echo ucfirst($data['bed_size']) ?></td>
                </tr>
                <tr>
                <td class="r-o">Capacity:</td>
                <td><?php echo ucfirst($data['capacity']) ?></td>
                </tr>
                <tr>
                <td class="r-o">No. Beds:</td>
                <td><?php echo ucfirst($data['number_beds']) ?></td>
                </tr>
                <tr>
                <td class="r-o">Floor No.</td>
                <td><?php echo ucfirst($data['floor_number']) ?></td>
                </tr>
                <tr>
                <td class="r-o">Services</td>
                <td><?php echo ucfirst($data['services1']) ?>, <?php echo ucfirst($data['services2']) ?>, <?php echo ucfirst($data['services3']) ?>, <?php echo ucfirst($data['services4']) ?>, <?php echo ucfirst($data['services5']) ?></td>
                </tr>
                </tbody>
                </table>
                
               <!--  <a href="#" class="primary-btn">More Details</a> -->
            </div>

        </div>

    </div>  
                                        
                                        
                                        <form class="form-register" method="POST" action="reserve-room-process" enctype="multipart/form-data">
                                      
                                         <div class="col-sm-2">
                                            <div class = "form-group">
												<label >Your Check In Date</label>
												<input type="hidden" name="checkin" value="<?php echo $checkin;?>">
												<p><?php   echo "$checkin";?> </p>
												 
											</div>
                                    	 </div>

                                    	 <div class="col-sm-2">
                                    	 	<div class = "form-group">
												<label>Your Check Out Date</label>

												<p><?php   echo "$checkout";?> </p>
												<input type="hidden" name="checkout" value="<?php echo $checkout;?>">
											</div>
                                    	 </div>

                                    	 <div class="col-sm-5">
                                    	 	<div class = "form-group">
												<label>Total Rooms Available</label>
												<p> <?php   echo "$total";?> </p>
												<input type="hidden" name="total" value="<?php echo $total;?>">
											</div>
                                    	 </div>

                                    	 

                                         <div class="col-sm-5">
                                            <br>
                                            <label> Want to book this room? </label>
                                            <div class = "form-group">
                                                <br>
                                                <label>Extra Bed</label>
                                                <input type = "number" class = "form-control"  name = "extra_bed"  id="extra_bed" min="0" />
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

                                         <div class="col-sm-5">
                                                <br>
                                                 <div class="d-block">
                                                         <button onclick="return confirm('Do you want to continue?  ')" class="btn-join btn-lg btn-primary text-uppercase" name="reservebtn" id="submitBtn" data-toggle="modal" data-target="#confirm-submit">Continue </button>
                                                          <input type='hidden' name='transaction_type' value='pending' id="transaction_type">
                                                          <input type="hidden" name="room_id" value="<?php echo $roomid;?>">
                                                          <input type="hidden" name="room_no" value="<?php echo $room_no;?>">
                                                          <input type="hidden" name="id" value="<?php echo $id;?>">

                                             
                                            </div>
                                         </div>

                                     </form>
                                    	 <div class="col-sm-5">
                                                 <div class="tn-right">         
                                                        <br><br>                                          
                                                        <label>Wanna Check Other Rooms ?</label>
                                                        <div>
                                                            <br>
                                                        <button onclick="location.href='./?page_id=room'" type="button" class="btn-join btn-sm btn-primary text-uppercase">Check Rooms</button>
                                                        </div>
                                        		 </div>
                                         </div>
                               
                                			
                                       <!--  <div class="col-sm-10">
                                                 <div class="tn-right">
                                                        <input type='hidden' name='room_id' id="room_id" value='<?php echo $roomid;?>'>

                                                        <button class="btn-join btn-sm btn-primary text-uppercase" >  BOOK NOW  </button>
                                                        
                                        		 </div>
                                         </div>
										-->

                                         
                               



                                       </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


		
		
		
		
<?php  


?>