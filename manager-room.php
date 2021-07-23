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
                        <h2 class="text-white">Rooms</h2>
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
                        <div class="col-lg-12 mx-auto">
                            <div class="card card-register my-2">


                                <div class="card-body">

                <div class="col-lg-2">
                    <!-- <a href="?page_id=admin-create-room" class="text-white" ><button class="btn btn-success btn-sm text-right">Add New Room</button></a> -->
                    <select class="btn btn-circle btn-primary" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="?page_id=admin-room">Rooms</option>
                    <!-- <option value="?page_id=admin-listavailableroom">Available Rooms</option> -->
                    <!--<option value="?page_id=admin-listoccupiedroom">Occupied Rooms</option>-->
                    </select>  
                </div>

                                    <div class="container">

              

                                        <div class="row">


                                        <div class="col-lg-12 my-3">
                                          <div class="row">
                                          <div class="col-lg-7">
                                            <div class="row">
                                              <div class="col-lg-3">
                                                <!-- <button class="btn">Room: 250</button> -->
                                                <!-- <a href="?page_id=admin-create-room" class="text-white" ><button class="btn btn-success btn-sm text-right">Add New Room</button></a> -->
                                              </div>
                                              <div class="col-lg-4">
                                                <!-- <button class="btn">Available: 250</button> -->
                                              </div>
                                              <div class="col-lg-3">
                                                <!-- <button class="btn">Guest: 250</button> -->
                                              </div>
                                          </div>
                                          </div>

                                          <div class="col-lg-5">
                                            <div class="row">
                                            <!-- <div class="col-lg-3"> -->
                                            <!-- <a href="?page_id=admin-listavailableroom">
                                              <button  class="btn btn-circle btn-primary">Available</button></a>
                                            </div> -->
                                            <!-- <a href="?page_id=admin-create-room" class="text-white" ><button class="btn btn-success btn-sm text-right">Add New Room</button></a> -->
                                          
                                            <!-- <div class="col-lg-3">
                                            <a href="?page_id=admin-listoccupiedroom" >
                                              <button  class="btn btn-circle btn-primary">Occupied</button></a>
                                            </div> -->
                                          <!-- </div> -->
                                          </div>
                                        </div>
                                      </div>



                                    <!-- Search bar -->
                                    <div class="col-lg-3 my-2">
                                      <div class="row">
                                        <input type="search" id="search" class="form-control light-table-filter"  placeholder="Search" data-table="order-table">
                                      </div>
                                    </div>
                                    <!-- Search bar -->




                <?php 
               
               $getalluser = "SELECT * FROM room ORDER BY modifieddate DESC LIMIT $start_num,$limit_num";
               $result = $databaseconnection->query($getalluser);
               if($outputresult = mysqli_query($databaseconnection, $getalluser)){
                if(mysqli_num_rows($outputresult) > 0){
              ?>

                     <table class="table table-sm table-hover table-center table-bordered order-table">
                      <thead>
                        
                          <!-- <th scope="col">Image</th> -->
                          <th scope="col">Room Name</th>
                          <th scope="col">Room Price</th>
                          <th scope="col">Floor Number</th>
                          <!--<th scope="col">Availability</th> -->
                          <th scope="col">Room Status</th>
                         <!-- <th scope="col">Actions</th> -->
                        
                      </thead>

                      <tbody>
                      <?php 
						            while($row = mysqli_fetch_array($outputresult)){ 
                      ?>
                 
                        <tr>
                           <!-- <td ><img src="uploads/<?php echo $row['room_photo'] ?>" style="width:100px;"></td> -->
                            <td style="width:20%">
                              <?php echo  ucfirst($row['room_name']) ?> 
                            </td>
                            <td style="width:12%">
                            PHP <?php echo  number_format($row['room_price']) ?> 
                            </td>
                            <td style="width:10%">
                            <?php echo  $row['floor_number'] ?> 
                            </td>
                            
                          <!--  <td style="width:12%">
                            <?php echo  $row['room_status'] ?> 
                              -->
                            </td>
                            <td style="width:12%">
                            <?php echo  $row['room_islocked'] ? "<a href='admin-unlockRoom?room_id={$row['room_id']}' ><p class='btn btn-circle btn-danger'><i class='fa fa-lock'></i> Inactive &nbsp;&nbsp;</p></a>" : "<a href='admin-lockRoom?room_id={$row['room_id']}'><p class='btn btn-circle btn-success'><i class='fa fa-unlock'></i> Active &nbsp;&nbsp;</p></a>" ?> 
                            </td>


                            <!-- <td >  <button class="btn btn-circle btn-success">Available</button></td> -->
                           <!-- <td>
                            
                            <a type="button" name="view" id="<?php echo $row['room_id']; ?>" class="btn btn-warning view_data" data-target="#view_data_modal" data-toggle="modal"><i class="fa fa-eye"></i>&nbsp;View&nbsp;</a>
                            <a href="?page_id=admin-edit-room&room_id=<?php echo $row['room_id']; ?>&room=<?php echo $row['room_name']; ?>" class="btn btn-info"><i class="fa fa-edit"></i> &nbsp; Update &nbsp;&nbsp;</a>
                          
                          
                          </td>
                          -->

                        </tr>


                        <?php } }}?>
                      </tbody>
                    </table>

               

                    <div class="row mt-2">
               <div class="col text-center">
                     <div class="block-27">

                         <ul class="row text-center">
       <!-- Counter for page *Start* -->
            <?php 
                require('dbconnection.php');


                $sql = "SELECT COUNT(room_id) as total FROM room"; 
                $result = $databaseconnection->query($sql);
                $data = $result->fetch_assoc();

                $total_pages = ceil($data["total"] / $limit_num);


                if ($page_num != 1) {
                        echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                  <div class='room-pagination'><a href='?page_id=admin-room&page_num=".($page_num-1)."' class='ml-2'>PREV</a></div></li>";
                     }

                 for ($i=1; $i<=$total_pages; $i++) { 
            ?>

            <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
            <a href="?page_id=admin-room&page_num=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
            </div>

            <?php
            };

            if ($page_num != $total_pages) {
                  echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                <div class='room-pagination'><a href='?page_id=admin-room&page_num=".($page_num+1)."' class='ml-2'>NEXT</a></div></li>";
              }
                                                                 
            ?>
            <!--Counter for page *End*  -->
            </ul>
             </div>
            </div>
            </div>  
                
                 <div class="col-lg-2">
                    <!-- <a href="#" class="text-white" ><button class="btn btn-danger btn-sm text-right">Back</button></a> -->
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


    <!-- VIEW MODAL -->
         <!-- add class modal -->
 <!-- <div class="modal fade" id="view_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Room Details</h5>
            </div>
                <div class="modal-body">
                    <div class="">
                        <form method="POST" id="insert_form">
                            <div class="col-lg-12">
                              <center>
                                <img style="width: 10vw;height: 8vw;  margin-right:auto;"  src=""  id="room_photo">  										
                              </center>

                                
                                    <div class="row">
                                      <div class="col-md-6" text-align="center">
                                            <div class="form-group">
                                             <label>Room Name:</label><br>
                                             <input type="text" name="room_name" id="room_name" disabled>
                                             
                                            </div>
                                      </div>
                                      <div class="col-md-6">
                                            <div class="form-group">
                                             <label>Bed Size :</label><br>
                                             <input type="text" name="bed_size" id="bed_size" disabled>            
                                            </div>
                                      </div>
                                    </div>
                                   
                                    <div class="row">
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                             <label>Room Price :</label><br>
                                             <input type="text" name="room_price" id="room_price" disabled>            
                                            </div>
                                      </div>
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                             <label>Number of Beds :</label><br>
                                             <input type="text" name="number_beds" id="number_beds" disabled>         
                                            </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                             <label>Floor Number :</label><br>
                                             <input type="text" name="floor_number" id="floor_number" disabled>            
                                            </div>
                                      </div>
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                             <label>Room Capacity :</label><br>
                                             <input type="text" name="capacity" id="capacity" disabled>         
                                            </div>
                                      </div>
                                    </div>
                                    

                                    <center><h3>Services</h3></center>
                                    <div class="row">
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                             <label>Services 1 :</label><br>
                                             <input type="text" name="services1" id="services1" disabled>            
                                            </div>
                                      </div>
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                             <label>Services 2 :</label><br>
                                             <input type="text" name="services2" id="services2" disabled>         
                                            </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                             <label>Services 3 :</label><br>
                                             <input type="text" name="services3" id="services3" disabled>            
                                            </div>
                                      </div>
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                             <label>Services 4 :</label><br>
                                             <input type="text" name="services4" id="services4" disabled>         
                                            </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                             <label>Services 5 :</label><br>
                                             <input type="text" name="services5" id="services5" disabled>            
                                            </div>
                                      </div>
                                    </div>

                                    <center><h3>Details</h3></center>
                                    <div class="row">
                                      <div class="col-lg-12">
                                            
                                             <textarea name="details" id="details" rows="15" class="form-control mb-4" disabled></textarea>            
                                            
                                      </div>
                                    </div>                                   

                                  

                                    
                                    <input type="hidden" name="room_id" id="room_id">
                                    

                            </div>
                              <div class="col-lg-12">
                                  <div class="container">
                                      <div class="row">
                                              
                                      
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>            
                                  </div>
                            </div>
                            <hr>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
-->
<script>

        $(document).ready(function(){

         function submitForm(action)
            {
                document.getElementById('insert_form').action = action;
                document.getElementById('insert_form').submit();
            }
        $(document).on('click', '.view_data', function(){
            var room_id = $(this).attr("id");
            $.ajax({
                url:"admin-room-view",
                method:"POST",
                data:{room_id:room_id},
                dataType:"json",
                success:function(data){
                    $('#room_id').val(data.room_id);
                    $('#room_name').val(data.room_name);
                    $('#room_price').val(data.room_price);
                    $('#number_beds').val(data.number_beds);
                    $('#floor_number').val(data.floor_number);
                    $('#capacity').val(data.capacity);
                    $('#bed_size').val(data.bed_size);
                    $('#services1').val(data.services1);
                    $('#services2').val(data.services2);
                    $('#services3').val(data.services3);
                    $('#services4').val(data.services4);
                    $('#services5').val(data.services5);
                 
                    $('#room_photo').attr("src",'uploads/'+data.room_photo)
                    $('#details').val(data.details);
                  
                    $('#view_data_modal').modal('show');

                }
            });
        });

        $('#insert_form').on("submit", function(event){  
  


});  


    });

    $(document).ready(function(){
          $(".light-table-filter").keypress(function (e) {
          var key = e.which;
           if(key == 13)  // the enter key code
          {    
            var value = $(this).val().toLowerCase();
            $(".order-table tbody tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });  
          }
          });
    });
</script>

