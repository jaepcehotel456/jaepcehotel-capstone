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
                        <h2 class="text-white">Occupied Rooms</h2>
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

                <div class="col-lg-2">
                    <select class="btn btn-circle btn-primary" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                      <option value="?page_id=admin-listoccupiedroom">Occupied Rooms</option>
                    <option value="?page_id=admin-room">Rooms</option>
                    <option value="?page_id=admin-listavailableroom">Available Rooms</option>
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

<!--                                             <div class="col-lg-4">
                                            <a href="?page_id=admin-listavailableroom">
                                              <button  class="btn btn-circle btn-danger">Manage Room</button></a>
                                            </div>
                                                
                                            <div class="col-lg-3">
                                            <a href="?page_id=admin-listavailableroom"><button  class="btn btn-circle btn-primary">Available</button></a>
                                            </div>
                                          
                                            <div class="col-lg-3">
                                            <a href="?page_id=admin-listoccupiedroom" ><button  class="btn btn-circle btn-primary">Occupied</button></a>
                                            </div> -->
                                          </div>
                                          </div>
                                        </div>
                                      </div>



                                    <!-- Search bar -->
                                    <div class="col-lg-3 my-2">
                                      <div class="row">
                                        <input type="search" id="search" class="form-control light-table-filter" onkeyup="myFunction()" placeholder="Search" data-table="order-table">
                                      </div>
                                    </div>
                                    <!-- Search bar -->




                <?php 
               
               // $getalluser = "SELECT * FROM room ORDER BY modifieddate DESC";
                // ********* TESTING
                $getalluser = "SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id WHERE available_rooms.availability = 'Unavailable' ORDER BY available_rooms.room_id DESC LIMIT $start_num,$limit_num";
                // ************ TESTING
               $result = $databaseconnection->query($getalluser);
               if($outputresult = mysqli_query($databaseconnection, $getalluser)){
                if(mysqli_num_rows($outputresult) > 0){
              ?>

                     <table class="table table-sm table-hover table-center table-bordered order-table">
                      <thead>
                       
                           <th scope="col">Image</th>
                          <th scope="col">Room Name</th>
                          <th scope="col">Room Price</th>
                          <th scope="col">Room Number</th>
                          <th scope="col">Availability</th>
                          <th scope="col">Actions</th>
                        
                      </thead>

                      <tbody>
                      <?php 
						            while($row = mysqli_fetch_array($outputresult)){ 
                      ?>
                 
                        <tr>
                            <td ><img src="uploads/<?php echo $row['room_photo'] ?>" style="width:100px;"></td>
                            <td style="width:20%">
                              <?php echo  ucfirst($row['room_name']) ?> 
                            </td>
                            <td style="width:12%">
                            PHP <?php echo  number_format($row['room_price']) ?> 
                            </td>
                            <td style="width:10%">
                            <?php echo  $row['room_number'] ?> 
                            </td>
                            
                            <td style="width:12%">
                            <?php echo  $row['availability'] ?> 
                            </td>


                            <!-- <td >  <button class="btn btn-circle btn-success">Available</button></td> -->
                            <td>
                           <!--  <a href="?page_id=admin-view-room-details&room_id=<?php echo $row['room_id']; ?>&room=<?php echo $row['room_name']; ?>" class="btn btn-warning"><i class="fa fa-eye"></i> &nbsp;View &nbsp;&nbsp;</a> -->
                            <!-- <a href="?page_id=admin-edit-room&room_id=<?php echo $row['room_id']; ?>&room=<?php echo $row['room_name']; ?>" class="btn btn-info"><i class="fa fa-edit"></i> &nbsp; Update &nbsp;&nbsp;</a> -->
                            <input type="button" name="update" value="View Occupant" id="<?php echo $row['room_number']; ?>" class="btn btn-info view_data" data-target="#update_data_modal" data-toggle="modal">
                          
                          </td>


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


                $sql = "SELECT COUNT(avail_id) as total FROM available_rooms WHERE availability = 'Unavailable'"; 
                $result = $databaseconnection->query($sql);
                $data = $result->fetch_assoc();

                $total_pages = ceil($data["total"] / $limit_num);


                if ($page_num != 1) {
                        echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                  <div class='room-pagination'><a href='?page_id=admin-listoccupiedroom&page_num=".($page_num-1)."' class='ml-2'>PREV</a></div></li>";
                     }

                 for ($i=1; $i<=$total_pages; $i++) { 
            ?>

            <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
            <a href="?page_id=admin-listoccupiedroom&page_num=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
            </div>

            <?php
            };

            if ($page_num != $total_pages) {
                  echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                <div class='room-pagination'><a href='?page_id=admin-listoccupiedroom&page_num=".($page_num+1)."' class='ml-2'>NEXT</a></div></li>";
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


<!-- TESTING DEVELOPMENT MODAL -->
         <!-- add class modal -->
<div class="modal fade" id="update_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Occupants</h5>
          </div>

      <div class="modal-body">
         <div class="container">
             <form method="POST" id="insert_form">
              <div class="col-lg-12">
                 
                      <div class="row">

                          <div class="col-sm-6">
                              <div class="form-group">
                                 <label>Occupant Name:</label>
                                     <input type="text" name="fname" id="fname" class="form-control" disabled>
                                  </div>
                          </div>


                              <div class="col-sm-2">
                                <div class="form-group">
                                   <label class="mt-3"> </label>
                                <input type="text" name="midname" id="midname" class="form-control" disabled>
                              </div>
                              </div>

                          <div class="col-sm-4">
                                <div class="form-group">
                                   <label class="mt-3"> </label>
                                <input type="text" name="lname" id="lname" class="form-control" disabled>
                              </div>
                              </div>


                         </div>

                         <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Room Number:</label>
                                     <input type="number" name="room_no" id="room_no" class="form-control" disabled>
                                  </div>
                          </div>
                     </div>
                     <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Check In:</label>
                                     <input type="date" name="checkin" id="checkin" data-link-format="yyyy-mm-dd" class="form-control" disabled>
                                     
                                  </div>
                          </div>
                     </div>
                     <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Check Out:</label>
                                     <input type="date" name="checkout" id="checkout" data-link-format="yyyy-mm-dd" class="form-control" disabled>
                                     
                                  </div>
                          </div>
                     </div>
                     <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Total Bill:</label>
                                     <input type="number" name="bill" id="bill" class="form-control" disabled>
                                     <input type="hidden" name="room_id" id="room_id">
                                  </div>
                          </div>
                     </div>
                </div>

                 <div class="col-lg-12">
                    <div class="container">
                        <div class="row">          
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>        
                    </div>
               </div>

                 </form>
            </div>
        </div>

</div>

</div>

</div>
<!-- end of section modal -->

<script>
  $(document).ready(function(){

    $(document).on('click', '.view_data', function(){
      var room_number = $(this).attr("id");

        $.ajax({
            url:"admin-view-occupied",
            method:"POST",
            data:{room_number:room_number},
            dataType:"json",
            success:function(data){
              $('#fname').val(data.fname);
              $('#midname').val(data.midname);
              $('#lname').val(data.lname);
              $('#room_no').val(data.room_no);
              $('#checkin').val(data.checkin);
              $('#checkout').val(data.checkout);
              $('#bill').val(data.bill);
              $('#room_id').val(data.room_id);
             
        

              // $('#insert').val("Update");
              $('#update_data_modal').modal('show');
            }
        });

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