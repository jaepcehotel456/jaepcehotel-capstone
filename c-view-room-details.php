<?php include('customer-navbar.php'); ?>

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


<?php

  $transaction_id = $_REQUEST['transaction_id'];

  $conn = mysqli_connect("localhost", "root", "", "jaepce");
  
  $query = $conn->query("SELECT * FROM transaction INNER JOIN room ON transaction.room_id=room.room_id  WHERE transaction.transaction_id = '$transaction_id'");
  
  $view_dets = [];
  
    while ($row = $query->fetch_object()) { 
    
    $view_dets[] = $row;
     
  }

?>

<?php 
foreach($view_dets as $view_details){ 
    $checkin = date_create($view_details->checkin); 
    $checkout = date_create($view_details->checkout); 
   

    $transaction_type = $view_details->transaction_type;
    $bill             =   $view_details->bill;
    $promo             =   $view_details->promo;   
?>




  <section class="room-details-section spad py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div id="hero_register">
                            <div class="">
                                <div class="row">
                           <div class="room-details-item">
                                <div class="row text-right">
                                    <div class="col-lg-12">
                                    <a href="./?page_id=customer-dashboard" class="text-white" >  <button class="btn btn-danger btn-sm text-right">X</button></a>
                                    </div>
                                </div>
                                     <div class="row py-3">
                                                       <img src="uploads/<?php echo $view_details->room_photo;?>" alt="">
                                                    </div>
                                                    <div class="rd-text">
                                              <!--           <div class="row py-3">
                                                        <div class="col-lg-5">
                                                        <h3>Occupied By:</h3> 
                                                        </div>

                                                        <div class="col-lg-7">
                                                        <p>Vincent Paul Barruga</p>
                                                         </div>
                                                     </div> -->
                                                        <div class="rd-title">
                                                            <h3><?php echo $view_details->room_name;?></h3>
                                                            <div class="rdt-right">
                                                                <div class="rating">
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star-half_alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="r-o">Size:</td>
                                                                            <td>30 ft</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="r-o">Capacity:</td>
                                                                            <td>Max person <?php echo $view_details->capacity;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="r-o">Bed:</td>
                                                                            <td><?php echo $view_details->bed_size;?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <table>
                                                                    <thead>
                                                                        <th>Services:</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $view_details->services1;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $view_details->services2;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $view_details->services3;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $view_details->services4;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $view_details->services5;?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <p class="f-para"><?php echo ucfirst($view_details->details); ?></p>
                                                    </div>
                                                </div>
                                      
                                      
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5" style="height:80%">
                        <div class="room-booking" style="border:1px solid black;border-radius: 5px;padding:20px;">
                            <h3>Customer Stay</h3>                            
                            <!-- <form action="#"> -->
                                <div class="check-date">
                                    <label for="date-in">Check In:</label>
                                    <p>After 3:00PM</p>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Check Out:</label>
                                     <p>Before 12:00PM</p>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Date:</label>
                                    <p><?php echo date_format($checkin, 'F d, Y'); ?> - <?php echo date_format($checkout, 'F d, Y'); ?></p>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Additional Beds</label>
                                    <p><?php echo $view_details->extra_bed;?></p>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Transaction Status</label>
                                    <p><?php echo ucfirst($view_details->transaction_type);?></p>
                                </div>


                                <div class="check-date">
                                    <label for="date-out">Confirmation Code</label>
                                    <p class="font-weight-bold" style="border-style: groove;"><?php echo $view_details->confirmation;?></p>
                                </div>


                                <hr>
                                <div class="row">
                                    <div class="col-lg-2">Total:</div>
                                    <div class="col-lg-3">₱ <?php echo $view_details->bill;?></div>
                                </div>
                                    <?php 
                                    if ($transaction_type == "pending" && $promo == 0) {
                                    ?>
                                        <hr>
                                        <form action="get_discount" method="POST" enctype="multipart/form-data">
                                        <label class="text-warning">*Optional</label><br>
                                        <label>Coupon Code: </label>
                                        <div class="row">
                                        <input class="ml-3" type="text" name="coupon" id="coupon"/><input type="submit" class="btn btn-info ml-3" value="Activate Code">
                                        </div>
                                        <input type="hidden" name="bill" value="<?php echo $bill;?>">
                                        <input type="hidden" name="transaction_id" value="<?php echo $transaction_id;?>">
                                        </form>
                                    <?php
                                    }else{
                                    ?>

                                    <?php
                                    }
                                    ?>
                            


                                   <?php 
                                    if ($transaction_type != "pending") {
                                    ?>
                                        <a href="./?page_id=customer-print&confirmation=<?php echo $view_details->confirmation?>" class="btn btn-info" id="wew">
                                        Print Form
                                        </a>
                                    <?php
                                    }else{
                                    ?>

                                    <?php
                                    }
                                    ?>

                            <!-- <a href="" class="btn btn-danger">
                                    Cancel Reservation
                                    </a> -->


                            <!-- </form> -->
                        </div>
                     
                     
</div></section>
<?php } ?>