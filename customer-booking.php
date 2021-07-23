<?php include('customer-navbar.php'); ?>

        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text text-left">
                            <h2 class="text-white">Customer Booking</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
        <style>
            .room-details-section #hero_register button.btn.btn-indigo {
                border: 1px solid black;
            }
        </style>
        <!-- Room Details Section Begin -->
        <section class="room-details-section spad py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <div id="hero_register">
                            <div class="container">
                                <div class="row"> 
<!--                                     <div class="card-body my-2" style="border:1px solid black">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Adults</label>
                                                <input type="text" value="1" class="form-control">
                                            </div>
                                         <div class="col-md-4">
                                                <label>Check In</label>
                                                <input type="date" class="form-control">
                                            </div>
                                          <div class="col-md-4">
                                                <label>Check Out</label>
                                                <input type="date" class="form-control">
                                            </div>
                                          <div class="col-md-2">
                                             <button>
                                                Search
                                            </button>
                                        </div>
                                     </div>
                                    </div> -->
                        
                                    <div class="steps-form col-lg-10">
                                        <div class="steps-row setup-panel">
                                            <div class="steps-step">
                                                <a href="#step-9" type="button" class="btn btn-indigo btn-circle" style="background-color: white; border: 1px solid #dfa974;">1</a>
                                                <p style="font-size:9px;text-align:center">Room</p>
                                            </div>
                                            <div class="steps-step">
                                                <a href="#step-10" style="background-color: white; border: 1px solid #dfa974;" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                <p style="font-size:9px;text-align:center">Payment Information</p>
                                            </div>
                                            <div class="steps-step">
                                                <a href="#step-11" style="background-color: white; border: 1px solid #dfa974;" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                <p style="font-size:9px;text-align:center">Completed</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <form role="form" action="#" method="post" enctype="multipart/form-data"> -->
                                        <!-- First Step -->
                                        <div class="row setup-content" id="step-9">

                                            <div class="col-md-10" style="padding:10px;border:1px solid black;margin:0px 5px;border-radius: 5px;">

    <?php 


    require('dbconnection.php');


    // **************************** WORKING CODE **************************
        $sql1="SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id WHERE available_rooms.availability = 'Available' GROUP BY available_rooms.room_id ORDER BY available_rooms.room_id DESC,  room.createddate  LIMIT  $start,$limit";

             $result = $databaseconnection->query($sql1);
            if ($result->num_rows > 0) {
            while ($data = mysqli_fetch_array($result)) { 


            $date=date_create($data['createddate']);
    ?>


                                                <div class="room-details-item">
                                                    <img src="uploads/<?php echo $data['room_photo']; ?>" width="1000" heigth="600">
                                                    <div class="rd-text">
                                                        <div class="rd-title">
                                                            <h3><?php echo ucfirst($data['room_name']); ?></h3> 
                                                        
                                                        </div>
                                                        <div class="rdt-right">
                                                                <div class="rating">
                                                                    <h4>Rating: </h4>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star"></i>
                                                                    <i class="icon_star-half_alt"></i>
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
                                                                            <td>Max person <?php echo $data['capacity']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="r-o">Bed:</td>
                                                                            <td><?php echo $data['bed_size']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="r-o">Price:</td>
                                                                            <td>₱ <?php echo $data['room_price']; ?></td>
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
                                                                            <td><?php echo $data['services1']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $data['services2']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $data['services3']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $data['services4']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $data['services5']; ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                    <div class="col-lg-12">
                                                        <p class="f-para" style="text-align: justify; text-indent: 75px;"><?php echo ucfirst($data['details']); ?></p>
                                                         </div>
                                                          <!--  <div class="col-lg-6">
                                                            <div class="row" style="border:1px solid black;padding:15px;margin:0px 10px;">
                                                                <h4>Member Rate</h4>
                                                                <hr>
                                                                <p>PHP 2000.00</p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
                                                                <button class="btn btn-danger btn-sm text-white text-center">Select</button>

                                                            </div>
                                                         </div> -->

                                                         <a href="./?page_id=reserve-room&room_id=<?php echo $data['room_id']; ?>&avail_id=<?php echo $data['avail_id']; ?>">
                                                         <button class="btn btn-info btn-sm text-white text-center ml-4" style="width: 250px; height: 50px;">Reserve / Book Room</button>
                                                     </a>
                                                         <!-- <button class="btn btn-info btn-sm text-white text-center ml-4">Book Room</button> -->
                                                      </div>
                                                    </div>
                                                        <div class="row mt-5">
                                                              <div class="col text-center">
                                                                <div class="block-27">
                                                                <center>
                                                                  <ul class="row text-center">
                                                                    <!-- <ul class="row text-center col-lg-4"> -->
                                                        <!-- Counter for page *Start* -->
                                                                <?php 
                                                                             require('dbconnection.php');
                                                                        $sql = "SELECT COUNT(DISTINCT(room_id)) as total FROM available_rooms WHERE availability = 'Available'"; 
                                                                        $result = $databaseconnection->query($sql);
                                                                        $data = $result->fetch_assoc();

                                                                        $total_pages = ceil($data["total"] / $limit);

                                                                       if ($page != 1) {
                                                                          echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                                                                    <div class='room-pagination'><a href='?page_id=customer-booking&page=".($page-1)."' class='ml-2'>PREV</a></div></li>";
                                                                       }

                                                                for ($i=1; $i<=$total_pages; $i++) { 
                                                                  ?>
                                                                    <li style="display:inline-block; display:inline;zoom:1;margin-right:10px;">
                                                                    <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
                                                                        <a href="?page_id=customer-booking&page=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
                                                                    </div>
                                                                    </li>
                                                                  <?php
                                                                  };

                                                                  if ($page != $total_pages) {
                                                                      echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                                                                    <div class='room-pagination'><a href='?page_id=customer-booking&page=".($page+1)."' class='ml-2'>NEXT</a></div></li>";
                                                                  }
                                                                    ?>
                                                        <!--Counter for page *End*  -->
                                                                  </ul>
                                                                </center>
                                                                </div>
                                                              </div>
                                                            </div>  
                                                </div>
        <?php 
        }}
        ?>
                                               <!--  <button class="btn btn-indigo btn-rounded nextBtn float-right" type="button">Next</button> -->
                                            </div>
                                        </div>


                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
<!--                     <div class="col-lg-5" style="height:80%">
                        <div class="room-booking" style="border:1px solid black;border-radius: 5px;padding:20px;">
                            <h3>Your Stay</h3>
                       
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
                                    <div class="col-lg-6">PHP 0.00</div>
                                </div>
                           
                        </div> -->
                        
                          
</section>