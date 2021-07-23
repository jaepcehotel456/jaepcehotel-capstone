<?php include('navbar.php'); ?>

<?php
		session_start();
		$roomid   = $_GET['room_id'];
		$checkin  = $_SESSION['checkin'];
		$checkout = $_SESSION['checkout'];
		$total    = $_SESSION['total'];
        $room_no  = $_SESSION['room_no'];
        
		?>

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


        <?php   

                $sql     = "SELECT * FROM room  WHERE $roomid = room_id ";
                $results = mysqli_query($databaseconnection,$sql); 
                $data    = mysqli_fetch_assoc($results);

                ?>




                <form class="form-register" method="POST" action="w-booking-process" enctype="multipart/form-data">
                    <div class="row my-0" style="background-color: #dfa974;">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container">
                                        <h3 class="card-title">Your Information</h3>
                                        <div class="row">
                                      
   <div class="col-sm-5">
        
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
    										<div class="col-sm-5">
    										
                                            <div class="col-sm-5">
                                                <div class="form-label-group">
                                                    <p>Title*</p>
                                                    <select name="gender" required>
                                                        <option disabled="Please select...">Please select...</option>
                                                        <option value="Mr.">Mr.</option>
                                                        <option value="Ms.">Ms.</option>
                                                        <option value="Mrs.">Mrs.</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <p>Firstname*</p>
                                                <div>
                                                    <input type="text" id="inputFirstname" class="form-control" placeholder="Firstname" name='fname' required autofocus>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                            	<br>
                                                <p>Middle Initial*</p>
                                                <div>
                                                    <input type="text" id="inputMiddlename" class="form-control" placeholder="Middlename" name='midname' maxlength="1">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                            	<br>
                                                <p>Lastname*</p>
                                                <div>
                                                    <input type="text" id="inputLastname" class="form-control" placeholder="Lastname" name='lname' required>
                                                    
                                                </div>
                                            </div>
                                        
                                        
                                            <div class="col-sm-10">
                                            	<br>
                                                <p>Email Address*</p>
                                                <div >
                                                    <input type="text" id="inputEmail" class="form-control" placeholder="Email" name='email' required>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                            	<br>
                                                <p>Birthdate*</p>
                                                <div>
                                                    <input type="date" class="form-control" name="birthdate" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <br>
                                                <p>Contact Number*</p>
                                                <div >
                                                    <input type="tel" id="inputPhoneNumber"  class="form-control" placeholder="Contact Number" name="contact"  required>
                                                </div>
                                            </div>


                                            <div class="col-sm-5">
                                            	<br>
                                                <p>Check in Date</p>
                                                <div >
                                                    <p><?php echo $checkin ?></p>
                                                    <input type="hidden" name="checkin" value="<?php echo $checkin;?>">
                                                    
                                                </div>
                                            </div>

                                            <div class="col-sm-5">
                                            	<br>
                                                <p>Check out Date</p>
                                                <div >
                                                    <p><?php echo $checkout ?></p>
                                                    <input type="hidden" name="checkout" value="<?php echo $checkout;?>">
                                                    
                                                </div>
                                            </div>

                                            <div class="col-sm-5">                                            
                                            <div class = "form-group">
                                                <br>
                                                <label>Extra Bed</label>
                                                <input type = "number" class = "form-control"  name = "extra_bed"  id="extra_bed"  min="0" max="3"/>
                                               
                                            </div>
                                         </div>

                                         <div class="col-sm-8">
                                            <div class = "form-group">
                                            <label>Coupon Code: </label> <label class="text-warning">*Optional*</label>
                                             <input class="form-control" type="text" name="coupon" id="coupon" />
                                                    
                                                
                                            </div>
                                         </div>


                                            <div class="col-sm-10">
                                                 <div class="tn-right">                                                   
                                                        <br>
                                                        <div>
                                                        <input type="hidden" name="room_id" value="<?php echo $roomid;?>">
                                                        
                                                        <input type="hidden" name="room_no" value="<?php echo $room_no;?>">
                                                        <input type="hidden" name="coupon" value="<?php echo $coupon;?>">

                                                        <!--<button onclick="return confirm('Do you want to continue?  ')" class="btn-join btn-lg btn-primary text-uppercase" name="reservebtn" id="submitBtn" data-toggle="modal" data-target="#confirm-submit">Continue </button> -->
                                                        <button type="submit" name="submit" class="btn-join btn-sm btn-primary text-uppercase">Submit Now</button>
                                                        </div>
                                        		 </div>
                                         </div>
                                           
                                   </div>
                               </div>
                           </div>
                                
                            </div>
                        </div>
					</form>
