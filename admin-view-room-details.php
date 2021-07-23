<?php include('admin-navbar.php'); ?>

      <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">View Room Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

  <section class="room-details-section spad py-5">

<?php 

$id =$_GET['room_id'];
$getalluser = "SELECT * FROM room WHERE room_id = $id";
$result = $databaseconnection->query($getalluser);
if($outputresult = mysqli_query($databaseconnection, $getalluser)){
if(mysqli_num_rows($outputresult) > 0){
?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div id="hero_register">
                            <div class="container">
                                <div class="row">
                               <div class="room-details-item">
                                <div class="row text-right">
                                    <!-- <div class="col-lg-9">
                                    <a href="?page_id=admin-edit-room" class="text-white" >  <button class="btn btn-info btn-sm">Edit Room</button></a>
                                    </div> -->
                                    <div class="col-lg-12">
                                    <a href="?page_id=admin-room" class="text-white" >  <button class="btn btn-danger btn-sm text-right">X</button></a>
                                    </div>
                                </div>
<?php 
 while($row = mysqli_fetch_array($outputresult)){ 
?>
                                     <div class="row py-3">
                                                       <img src="uploads/<?php echo $row['room_photo'] ?>" alt="">
                                                    </div>
                                                    <div class="rd-text">
                                                        
                                                        <div class="rd-title">
                                                            <!-- <div class="rdt-right">
                                                                <div class="rating">
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star-half_alt"></i>
                                                                </div>
                                                            </div> -->
                                                          
                                                            <h2><?php echo ucfirst($row['room_name']) ?></h2>
                                                           
                                                            <h3>PHP  <?php echo number_format($row['room_price'])?>.00</h3>
                                                          
                                                            
                                                            
                                                            
                                                        </div>
                                                        <div class="row">
                                                        
                                                            <div class="col-lg-12">
                                                                <table>
                                                                    <tbody>
                                                                    
                                                                        <tr>
                                                                            <td class="r-o">Number of Beds:</td>
                                                                            <td><?php echo ucfirst($row['number_beds']) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="r-o">Floor Number:</td>
                                                                            <td><?php echo ucfirst($row['floor_number']) ?></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td class="r-o">Capacity:</td>
                                                                            <td><?php echo ucfirst($row['capacity']) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="r-o">Size of Bed:</td>
                                                                            <td><?php echo ucfirst($row['bed_size']) ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <table>
                                                                    <thead>
                                                                        <th>Services:</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo ucfirst($row['services1']) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo ucfirst($row['services2']) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo ucfirst($row['services3']) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo ucfirst($row['services4']) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo ucfirst($row['services5']) ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <p class="f-para" style="text-align:justify;"><?php echo ucfirst($row['details']) ?></p>
                                                    </div>
                                                </div>
    
                                      
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-5" style="height:80%">
                        <div class="room-booking" style="border:1px solid black;border-radius: 5px;padding:20px;">
                            <h3>Customer Stay</h3>
                            <form action="#">
                                <div class="check-date">
                                    <label for="date-in">Check In:</label>
                                    <p>After 3:00PM</p>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Check Out:</label>
                                     <p>Before 12:00PM</p>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Date</label>
                                    <p>Mon, Dec 16, 2019 - Tues, Dec 17, 2019</p>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Adults</label>
                                    <p>1</p>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">Total:</div>
                                    <div class="col-lg-6">PHP 4000.00 X 2</div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12" style="padding:10px 0px;">
                            <div class="room-booking" style="border:1px solid black;border-radius: 5px;padding:20px;">
                                <h3>Addtional</h3>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-4 pt-2">Water Heater</div>
                                         <div class="col-lg-4 pt-2">PHP 500</div>
                                        <div class="col-lg-4 pt-2">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="col-lg-4 pt-2">Breakfast</div>
                                         <div class="col-lg-4 pt-2">PHP 300</div>
                                        <div class="col-lg-4 pt-2">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="col-lg-4 pt-2">Lunch</div>
                                         <div class="col-lg-4 pt-2">PHP 100</div>
                                        <div class="col-lg-4 pt-2">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="col-lg-4 pt-2">Air Conditioner</div>
                                         <div class="col-lg-4 pt-2">PHP 500</div>
                                        <div class="col-lg-4 pt-2">
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">Total:</div>
                                        <div class="col-lg-6">PHP 8923.83</div>
                                    </div>
                        </div> -->
                            <?php } }}?>              
</form>

</div></div></div></div></div>

</section>

