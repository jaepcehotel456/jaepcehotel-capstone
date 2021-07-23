
<?php
include('admin-navbar.php');
?>


      <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Create Room</h2>
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
                                    <a href="?page_id=admin-room" class="text-white" >  <button class="btn btn-danger btn-sm text-right">X</button></a>
                                    </div>
                                </div>

                                    <form class="room"  enctype="multipart/form-data"  method="POST" action="admin-create-room-process">
                                                    <div class="rd-text">
                                                        <div class="row py-3">
                                                        <div class="col-lg-12">
                                                            <img src="img/default-image1.JPG" alt="" width="250">
                                                        <input type="file" class="form-control" id="name" name="image_link" required>
                                                         </div>
                                                     </div>
                                                        <div class="rd-title">
                                                              <input type="text" class="form-control" placeholder="Input Room Name" id="room_name" name="room_name" required>
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
                                                            <div class="col-lg-12">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <input type="number" class="form-control mt-2" placeholder="Input Room Price" id="room_price" name="room_price" min="0" max="99999999" required>
                                                                        </tr>
                                                                        <tr>
                                                                           <input type="text" class="form-control mt-2" placeholder="Input No of Beds" id="number_beds" name="number_beds" required>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <input type="text" class="form-control mt-2" placeholder="Input Floor Number" id="floor_number" name="floor_number" required>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <input type="text" class="form-control mt-2" placeholder="Input Bed Capacity" id="capacity" name="capacity" required>
                                                                        </tr>
                                                                        <tr>
                                                                            <input type="text" class="form-control mt-2" placeholder="Input Bed Size" id="bed_size" name="bed_size" required>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <table>
                                                                    <h4>Services:</h4>
                                                                    <tbody>
                                                                        <tr>
                                                                           <input type="text" class="form-control mt-2" placeholder="Input Services 1" id="services1" name="services1" required>
                                                                        </tr>
                                                                        <tr>
                                                                            <input type="text" class="form-control mt-2" placeholder="Input Services 2" id="services2" name="services2" required>
                                                                        </tr>
                                                                        <tr>
                                                                            <input type="text" class="form-control mt-2" placeholder="Input Services 3" id="services3" name="services3" required>
                                                                        </tr>
                                                                        <tr>
                                                                            <input type="text" class="form-control mt-2" placeholder="Input Services 4" id="services4" name="services4" required>
                                                                        </tr>
                                                                        <tr>
                                                                            <input type="text" class="form-control mt-2" placeholder="Input Services 5" id="services5" name="services5" required>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                            <textarea  placeholder="Input Details" id="details" name="details" required rows="4" cols="55"></textarea>
                                                       
                                                    </div>
                                                    <button onclick="return confirm('Do you want to continue?  ')" type="submit" name="submit" class="btn btn-success btn-sm text-right">Create Room</button>
                                                </div>
                                      
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                        </div>
                    </div>
                </section>

