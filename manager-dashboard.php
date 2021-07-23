<?php
include('m-navbar.php');
?>

<!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Manager Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="rooms-section spad py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="img/room/room-1.jpg" alt="">
                        <div class="ri-text text-center">
                            <h4>Rooms</h4>
                            <p style="border:1px solid black">
                                <?php 
                                require 'dbconnection.php';
                                $query = "SELECT COUNT(*) as countallrooms FROM available_rooms  ";
                                $result=  mysqli_query($databaseconnection,$query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo $row['countallrooms'];
                                }
                                ?> 
                          </p> 
                          
                          <!-- <a href="?page_id=manager-a-r" class="primary-btn">More Details</a>  -->
                            <a href="?page_id=manager-listavailableroom" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="img/room/room-3.jpg" alt="">
                        <div class="ri-text text-center">

                            <h4>Staff</h4>
                           <p style="border:1px solid black">
                           <?php 
                                require 'dbconnection.php';
                                $query = "SELECT COUNT(*) as countallstaff FROM person WHERE person_type = 'staff'  ";
                                $result=  mysqli_query($databaseconnection,$query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo $row['countallstaff'];
                                }
                                ?>
                            </p>
                           
                            <a href="?page_id=m-listOfStaff" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="img/room/room-2.jpg" alt="">
                        <div class="ri-text text-center">
                            <h4>Guest</h4>
                            <p style="border:1px solid black">
                            <?php 
                                require 'dbconnection.php';
                                $query = "SELECT COUNT(*) as countallguest FROM person WHERE person_type = 'guest'  ";
                                $result=  mysqli_query($databaseconnection,$query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo $row['countallguest'];
                                }
                                ?>
                            </p>
                          
                            <a href="?page_id=m-listOfGuest" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                <center>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <div class="ri-text text-center">
                        <a href="?page_id=manager-data-chart" class="primary-btn">View Monthly Total Revenues</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                </div>
            </div>
            </center>
        </div>
    </section>
                    
                </div>
            </div>
        </div>
    </section>