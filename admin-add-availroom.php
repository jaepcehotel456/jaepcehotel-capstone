
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
                                    
                                   <h2>Create New Available Room</h2>
                                    <br>
                                    <br>
                                    
                                    </div>
                                </div>

                                    <form class="room"  enctype="multipart/form-data"  method="POST" action="admin-add-availroom-process">
                                                        
                                                    <div class="rd-text">
                                                    
                                                        
                                                        <!-- <div class="rd-title">
                                                              <input type="text" class="form-control" placeholder="Input Room Name" id="room_name" name="room_name" required>
                                                            
                                                        </div>
                                                        <div class="rd-title">
                                                              <input type="text" class="form-control" placeholder="Input Room Name" id="room_name" name="room_name" required>
                                                            
                                                        </div> -->

                                                        <div class="col-lg-6">
                                                            <div class="form-label-group">
                                                             
                                                                Room Name:
                                                                <br>

                                                                <select name="room_id" required>
                                                                     <option selected="true" disabled="disabled">Please select room name...</option>
                                                                    <?php

                                                                        $conn = mysqli_connect("localhost", "root", "", "jaepce");


                                                                        $sql="SELECT * FROM room";

                                                                        $result= mysqli_query($conn,$sql);
                                                                        while ($data = $result->fetch_assoc()) {

                                                                    ?>
                                                                    <option value="<?php echo $data['room_id']; ?>"><?php echo $data['room_name']; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br><br><br><br>
                                                        <div class="col-lg-6">
                                                            <div class="form-label-group">
                                                             
                                                                Room Number:<br>
                                                                <br>
                                                                <input type="number" name="room_number">
                                                            </div>
                                                        </div>
                                                        <br>
                                                      
                                                       
                                                    </div>
                                                    <br><br><br>
                                                    <button type="submit" name="submit" class="btn btn-success btn-sm text-right">Create Room</button>

                                                    <!-- <div>
                                                    <a href="?page_id=admin-listavailableroom" class="text-white" > <button class="btn btn-danger btn-sm text-right">Cancel</button></a>
                                                    </div> -->

                                                
                                      
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                        </div>
                    </div>
                </section>

