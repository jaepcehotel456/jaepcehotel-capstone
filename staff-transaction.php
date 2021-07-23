<?php include('staff-navbar.php'); ?>


      <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Booking Transactions</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

   	<section class="section-register py-2">
   		<div class="container-fluid px-5">
   			<div class="row my-5" style="background-color:#dfa974">
   				<div class="col-md-12 mx-auto">
   					<div class="card card-register my-2">
   						<div class="card-body">
   							<!-- Pending Reservation button -->
   							<div class="col-md-2">
   								<!-- <a href="?page_id=staff-pending-reservation" class="text-white"><button class="btn btn-success btn-md text-right">Pending Reservations</button></a> -->
                  <select class="btn btn-success btn-md text-right" id="room" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                  <option value="?page_id=staff-transaction">Transaction</option>
                  <option value="?page_id=staff-pending-reservation">Pending Reservation</option>
                  <option value="?page_id=staff-online-bookings">Online Bookings</option>
                  <option value="?page_id=staff-checkout-rooms">Currently Check In's</option>
                  </select>  
   							</div>
   							<!-- Pending -->
                <center>
                  <h1 class="mt-5">Walk-In Customers</h1>
                </center>
   							<div class="container"> 
   								<div class="row">





   								</div>
                 <!--  <div class="container" style="border-style: groove;">

                    <div class="row">
                      <select class="align-center">
                        <option>dwadaw</option>
                        <option>123</option>
                        <option>4444</option>
                      </select>
                    </div>
                                       
                  </div> -->
                  <form enctype="multipart/form-data"  method="POST" action="staff-t-p">
                    <div class="container" style="border-style: groove;">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        
                        <input hidden>
                      </div>
                  
                      
                          <?php
                            
                            include('dbconnection.php');

                            $sql= "SELECT * FROM person WHERE person_type = 'guest'";
                            $result=mysqli_query($databaseconnection,$sql);
                            echo "<div class='col-md-2 mt-5'>";
                            echo "<label><b>Guest Name</b></label>";
                            echo "<center>";
                            echo "<select name='person_id' id='searchddl'>";
                            echo "<option> -- Search Guest Name -- </option>";
                            while ($row=mysqli_fetch_array($result)) {
                              echo "<option value='$row[person_id]'>$row[fname] $row[midname]. $row[lname]</option>";
                            }
                            echo "</select>";
                            echo "</center>";
                            echo "</div>";
                            mysqli_close($databaseconnection);
                          ?>
                       
                       <div class="form-group col-md-1">
                       </div>
                 
                      <div class="form-group col-md-3">
                      <br><br>
                            <?php
                            include('dbconnection.php');

                            $sql1="SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id WHERE available_rooms.availability = 'Available' GROUP BY available_rooms.room_id ORDER BY available_rooms.room_id DESC";

                            $result1=mysqli_query($databaseconnection,$sql1);
                            echo "<label><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Room Name </b></label>";
                            echo "<center>";
                            echo "<select name='avail_id' id='searchroom'>";
                            echo "<option> -- Search for Room Name -- </option>";
                            while ($row=mysqli_fetch_array($result1)) {
                              echo "<option value='$row[avail_id]'>$row[room_name]</option>";
                            }
                            
                            echo "</select>";
                            echo "</center>";
                            mysqli_close($databaseconnection);


                            ?>
                        
                      </div>
                    </div>


                    <div class="form-row mt-3">
                      <div class="form-group col-md-6">
                        <label for="Check-in">Check-in</label>
                        <input type = "date" class = "form-control" data-link-format="yyyy-mm-dd" name = "checkin" required = "required" />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="Check-out">Check-out</label>
                        <input type = "date" class = "form-control" data-link-format="yyyy-mm-dd" name = "checkout" required = "required" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="extra bed">Extra Bed</label>
                      <input type = "number" class = "form-control" min = "0" name = "extra_bed" required = "required" placeholder="Input Extra bed" />
                    </div>
                    <div class="form-group">
                          <select name="payment_method" id="paymentddl" required = "required"> 
                              <option selected disabled>Choose Payment</option>
                              <option value="cash">Cash</option>
                              <option value="credit card">Credit Card</option>
                          </select>
                    </div>
                    <input type='hidden' name='status' value='CheckIn'>
                    <!--<input type='hidden' name='availability' value='Occupied'> -->
                  
                    
                    
                    
                    
                    <button type="submit" name="nextbtn" class="btn btn-primary mb-2 mt-5" >Continue</button>
                    </div>
                  </form>
   							</div>
   						</div>
   					</div>
   				</div>
   			</div>
   			
   		</div>
   		
   	</section>

    <script type="text/javascript">
      $("#searchddl").chosen();
      $("#searchroom").chosen();
      $("#paymentddl").chosen();
    </script>