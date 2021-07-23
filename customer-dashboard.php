<?php include('customer-navbar.php'); ?>

<!-- fetch current data in database -->
<?php
$conn = mysqli_connect("localhost", "root", "", "jaepce");

$id = $_SESSION['person_id'];

$sql="SELECT * FROM person WHERE person_id = '$id'";
$result= mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
?>
<!-- fetch current data in database -->
      <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">My Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

 <!-- Register Page Content -->
        <section class="section-register py-2">
            <div class="container-fluid px-5">
                   <div class="row my-5" style="background-color:#dfa974">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-2">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <table class="c-db-table-info">
                                                    <thead>
                                                        <tr><h3 class="customer-name"><?php echo $data['gender']; ?> <?php echo ucfirst($data['fname']); ?> <?php echo ucfirst($data['midname']); ?>. <?php echo ucfirst($data['lname']); ?> </h3></tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="fa fa-check"></td>
                                                            <td>Member since <?php echo $data['createddate']; ?></td>

                                                        </tr>

                                                        <tr>
                                                            <td class="fa fa-check"></td>
                                                            <td><?php echo $data['email']; ?></td>
                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $data['address']; ?>, <?php echo $data['city']; ?>, <?php echo $data['country']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fa fa-check"></td>
                                                                            <td><?php echo $data['contactnumber']; ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                <hr>
                                                <p>MY STAY HISTORY</p>


            <?php

                require('dbconnection.php');
                $id = $_SESSION['person_id'];

                $sql = "SELECT SUM(days) as totaldays, COUNT(person_id) as total FROM transaction WHERE person_id = '$id' AND transaction_type = 'paid'";
                $results = $databaseconnection->query($sql);
                $datas = $results->fetch_assoc();

            ?>
                                                <div class="row c-db-table-info-2">
                                                    <div class="col-lg-3" style="border-right:1px solid black">
                                                      <span style="font-size:48px;width:90px"><?php echo $datas['total'];?>
                                                      <p style="width:90px;">Total Bookings</p>
                                                    </div>
                                                     <div class="col-lg-3" >
                                                      <span style="font-size:48px;width:90px"><?php echo $datas['totaldays'];?>
                                                      <p style="width:90px;">Total Stays</p>
                                                    </div>
                                                      <!-- <div class="col-lg-3">
                                                      <span style="font-size:48px;width:90px">0
                                                      <p style="width:90px;">Total Days</p>
                                                    </div> -->
                                                </div>
                                                <div class="row c-db-table-info-3 my-3" >
                                                   <div class="col-lg-3">
                                                     <a href="./?page_id=customer-booking-history" class="c-db-btn">Booking History</a>
                                                   </div>
                                                     <div class="col-lg-3">
                                                      <a href="./?page_id=customer-pending" class="c-db-btn">Pending Reservation</a>
                                                   </div>
                                                </div>


                                            </div>
                                           
                                           <div class="col-sm-4 c-db-info-4">
                                            <div class="row">
                                               <img src="uploads/<?php echo $data['person_photo'] ?>" width="200" height="200 ">
                                              <!--  style="width:50%;height:200px;" -->
                                             </div>
                                               <div class="row my-1">
                                                    <a href="?page_id=customer-update-profile" class="c-db-btn">Update Profile</a>
                                               </div>
                                            </div>
                                          
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
              </section>
        <!-- Register Page Content End -->
