<?php include('navbar.php'); 
      include('dbconnection.php');
      ?>
<?php $roomid = $_GET['room_id']; 

$id = 1; ?>

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
<section>


<form class="form-register" method="POST" action="search-availability-process" enctype="multipart/form-data">

                    
                     <div class="row my-0" style="background-color: #dfa974; border-left: 0; border-right: 0">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container">
                                        <h3 class="card-title">Input check-in and check-out</h3>
                                        <div class="row">
                                        <div class="container">
                

    <?php   

                $sql     = "SELECT * FROM room  WHERE $roomid = room_id ";
                $results = mysqli_query($databaseconnection,$sql); 
                $data    = mysqli_fetch_assoc($results);

                ?>
        <div class="col-lg-5">
        
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


                                        <?php $date = date('Y-m-d', strtotime('+1 day')); 
                                                      $date2 = date('Y-m-d', strtotime('+2 day'));
                                                ?>

                                      
                                         <div class="col-sm-5">
                                            <div class = "form-group">
												<label >Check In</label>
												
												
												<input type = "date" class = "form-control checkIn" data-link-format="yyyy-mm-dd" name = "checkin" required = "required" id="checkin"  min="<?php echo $date ?>" />
												
												
												 
												 
											</div>
                                    	 </div>
                                    	 <div class="col-sm-5">
                                    	 	<div class = "form-group">
												<label>Check Out</label>
												
												<input type = "date" class = "form-control checkOut" data-link-format="yyyy-mm-dd" name = "checkout" required = "required" id="checkout" min="<?php echo $date2 ?>" />
											</div>
                                    	 </div>
                               
                                
                                            <div class="col-sm-5">
                                                 <div class="tn-right">
                                                        <input type='hidden' name='room_id' id="room_id" value='<?php echo $roomid;?>'>

                                                        <button class="btn-join btn-lg btn-primary text-uppercase" >Check Now</button>
                                                  </div>
 

                                            </div>

                                       </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


              

              
                         
                </form>
        </div>
</section>
