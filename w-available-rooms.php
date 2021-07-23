<?php	include('navbar.php'); ?>
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
        <div class="col-lg-7">
        
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
                                        
                                        
                                        <form class="form-register" method="POST" action="w-booking" enctype="multipart/form-data">
                                      	
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
                                                 <div class="tn-right">                                                   
                                                        <div>
                                                         <input type="hidden" name="room_id" value="<?php echo $roomid;?>">
                                                         <input type="hidden" name="room_no" value="<?php echo $room_no;?>">
                                                        <button onclick="location.href='./?page_id=w-booking&room_id=<?php echo $roomid;?>'" type="button" class="btn-join btn-sm btn-primary text-uppercase">Book Now</button>
                                                        </div>
                                        		 </div>
                                         </div>

                                     </form>
                                    	 <div class="col-sm-5">
                                                 <div class="tn-right"> 
                                                 <br>                                                  
                                                        <label> Check Other Rooms ?</label>
                                                        <div>
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

                                         <div class="col-sm-10">
                                    	 	<div class = "form-group">
											<div>
                                            
                                            <h5 class="btm-info"> You can also join as a member and book rooms hassle free. <a href="./?page_id=register" >Register here</a>.</h5>

                                            </div>
											</div>
                                    	 </div>
                               



                                       </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


		
		
		
		
<?php  


?>