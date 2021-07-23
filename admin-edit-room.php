<?php
include('admin-navbar.php'); 
?>

<?php
$idtoedit =$_GET['room_id'];
require 'dbconnection.php';     
$queryforeditroom = mysqli_query($databaseconnection,"SELECT * FROM room WHERE room_id =$idtoedit");
$fetch = mysqli_fetch_assoc($queryforeditroom);
?>

      <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Update Room</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->


<section class="room-details-section spad py-5">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="hero_register">
                    <div class="container">
                        <div class="row">


                            <div class="room-details-item">
                            
                                <div class="row text-right">
                                    <div class="col-lg-12">
                                    <a href="?page_id=admin-room" class="text-white" ><button class="btn btn-danger btn-sm text-right">X</button></a>
                                    </div>
                                </div>


                                <form class="user" method="post" action="admin-edit-room-process" enctype="multipart/form-data">
                                <input hidden input="text" name="room_id" value="<?php echo $fetch['room_id']; ?>">


                                            <div class="rd-text">
                                                <div class="row py-3">
                                                <div class="col-lg-12">
                                                    <img src="uploads/<?php echo $fetch['room_photo'] ?>" alt=""  height="200px">
                                                <input type="file"  name="image_link" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="rd-title">
                                                        <input type="text" class="form-control" placeholder="Input Room Name" name="room_name" id="room_name" value="<?php echo $fetch['room_name']; ?>">
                                                        
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
                                                    <!-- <div class="col-lg-12">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <label class="r-o">Room Status</label>
                                                                <br>
                                                                <select class="col-lg-12" name="room_status" id="room_status" required >
                                                                    <option enable="None"></option>
                                                                    <option value="1">Available</option>
                                                                    <option value="2">Occupied</option>
                                                                    <option value="3">Reserved</option>
                                                                </select>
                                                                <br><br>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </div> -->
                                                    
                                                    <div class="col-lg-12">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <input type="number" class="form-control mt-2" placeholder="Input Room Price" name="room_price" id="room_price" value="<?php echo $fetch['room_price']; ?>" max="99999999" min="0" required>
                                                                </tr>
                                                                <tr>
                                                                    <input type="text" class="form-control mt-2" placeholder="Input No of Beds" name="number_beds" id="number_beds" value="<?php echo $fetch['number_beds']; ?>">
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <input type="text" class="form-control mt-2" placeholder="Input Floor Number" name="floor_number" id="floor_number"  value="<?php echo $fetch['floor_number']; ?>">
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <input type="text" class="form-control mt-2" placeholder="Input Room Capacity" name="capacity" id="capacity" value="<?php echo $fetch['capacity']; ?>">
                                                                </tr>
                                                                <tr>
                                                                    <input type="text" class="form-control mt-2" placeholder="Input Bed Size" name="bed_size" id="bed_size" value="<?php echo $fetch['bed_size']; ?>">
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br>
                                                    <div class="col-lg-12">
                                                        <table>
                                                            <thead>
                                                                <h3>Services:</h3>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                <input type="text" class="form-control mt-2" placeholder="Input Services 1" name="services1" id="services1" value="<?php echo $fetch['services1']; ?>">
                                                                </tr>
                                                                <tr>
                                                                <input type="text" class="form-control mt-2" placeholder="Input Services 2" name="services2" id="services2" value="<?php echo $fetch['services2']; ?>">
                                                                </tr>
                                                                <tr>
                                                                <input type="text" class="form-control mt-2" placeholder="Input Services 3" name="services3" id="services3" value="<?php echo $fetch['services3']; ?>">
                                                                </tr>
                                                                <tr>
                                                                <input type="text" class="form-control mt-2" placeholder="Input Services 4" name="services4" id="services4" value="<?php echo $fetch['services4']; ?>">
                                                                </tr>
                                                                <tr>
                                                                <input type="text" class="form-control mt-2" placeholder="Input Services 5" name="services5" id="services5" value="<?php echo $fetch['services5']; ?>">
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <textarea name="details" id="details" class="form-control" placeholder="Input Details" rows="4" cols="55"><?php echo $fetch['details']; ?></textarea>
                                                <br>
                                            </div>
                                            <button name="submit" type="submit">Update Room</button>
                            </form>
                            </div>
                                
                                
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

