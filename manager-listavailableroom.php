<?php
include('m-navbar.php');
include('dbconnection.php');
?>


      <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Available Rooms</h2>
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
                    <option value="?page_id=admin-listavailableroom">Available Rooms</option>
                    
                   <!-- <option value="?page_id=admin-listoccupiedroom">Occupied Rooms</option> -->
                    </select>  
                    <!-- <a href="?page_id=admin-add-availroom" class="text-white" ><button class="btn btn-success btn-sm text-right">Add Available Room</button></a> -->

        <!--  MODAL BUTTON TESTING  -->
                    <!-- <input type="button" name="add" value="Add Available Room" id="room_id" class="btn btn-success btn-sm text-right update_data" data-target="#add_room_modal" data-toggle="modal"> -->
         <!--  MODAL BUTTON TESTING  -->

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

                                          <div class="col-lg-7">
                                            <div class="row">
                                              <!-- <a href="?page_id=admin-add-availroom" class="text-white" ><button class="btn btn-success btn-sm text-right">Add Available Room</button></a> -->
                                            <!-- <div class="col-lg-3">
                                            <a href="?page_id=admin-room">
                                              <button  class="btn btn-circle btn-danger">Manage Room</button></a>
                                            </div>
                                            <div class="col-lg-3">
                                            <a href="?page_id=admin-listavailableroom">
                                              <button  class="btn btn-circle btn-primary">Available</button></a>
                                            </div>
                                          
                                            <div class="col-lg-3">
                                            <a href="?page_id=admin-listoccupiedroom" >
                                              <button  class="btn btn-circle btn-primary">Occupied</button></a>
                                            </div> -->
                                            <div class="col-lg-3">
                                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_coupon">Generate Coupon</button> -->
                                            </div>
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
              //  $getalluser = "SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id WHERE available_rooms.availability = 'Available' ORDER BY available_rooms.room_id DESC LIMIT $start_num,$limit_num";
               $getalluser = "SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id  ORDER BY available_rooms.room_id DESC LIMIT $start_num,$limit_num";
               $result = $databaseconnection->query($getalluser);
               if($outputresult = mysqli_query($databaseconnection, $getalluser)){
                if(mysqli_num_rows($outputresult) > 0){
              ?>

                     <table class="table table-sm table-hover table-center table-bordered order-table" id="new_table">
                      <thead>
                        
                         <!-- <th scope="col">Image</th> -->
                          <th scope="col">Room Name</th>
                          <th scope="col">Room Price</th>
                          <th scope="col">Room Number</th>
                          <th scope="col">Availability</th>
                          <th scope="col">Actions</th>
                          <!--<th scope="col">Room Status</th> -->
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
                            <?php echo  $row['room_number'] ?> 
                            </td>
                            
                            <td style="width:12%">
                            <?php echo  $row['availability'] ?> 
                            </td>

                            <!--<td style="width:12%">
                            <?php //echo  $row['availability'] ? "<a href='admin-unlockRoomNo?room_id={$row['room_number']}' ><p class='btn btn-circle btn-danger'><i class='fa fa-lock'></i> Inactive &nbsp;&nbsp;</p></a>" : "<a href='admin-lockRoomNo?room_id={$row['room_number']}'><p class='btn btn-circle btn-success'><i class='fa fa-unlock'></i> Active &nbsp;&nbsp;</p></a>" ?> 
                            </td> -->


                            <!-- <td >  <button class="btn btn-circle btn-success">Available</button></td> -->
                            <td>
                            <!-- <a href="?page_id=admin-view-room-details&room_id=<?php echo $row['room_id']; ?>&room=<?php echo $row['room_name']; ?>&room_num=<?php echo $row['room_number'];?>" class="btn btn-warning"><i class="fa fa-eye"></i> &nbsp;View &nbsp;&nbsp;</a> -->
                            <!-- <a href="?page_id=admin-update-availroom&avail_id=<?php echo $row['avail_id']; ?>&room=<?php echo $row['room_name']; ?>&room_num=<?php echo $row['room_number'];?>" class="btn btn-info"><i class="fa fa-edit"></i> &nbsp; Update &nbsp;&nbsp;</a> -->
                          
                            
                            <input type="button" name="update" value="Update" id="<?php echo $row['avail_id']; ?>" class="btn btn-info update_data" data-target="#update_data_modal" data-toggle="modal">
                            
                        
                          
                          
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


                $sql = "SELECT COUNT(avail_id) as total FROM available_rooms WHERE availability = 'Available'"; 
                $result = $databaseconnection->query($sql);
                $data = $result->fetch_assoc();

                $total_pages = ceil($data["total"] / $limit_num);


                if ($page_num != 1) {
                        echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                  <div class='room-pagination'><a href='?page_id=manager-listavailableroom&page_num=".($page_num-1)."' class='ml-2'>PREV</a></div></li>";
                     }

                 for ($i=1; $i<=$total_pages; $i++) { 
            ?>

            <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
            <a href="?page_id=manager-listavailableroom&page_num=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
            </div>

            <?php
            };

            if ($page_num != $total_pages) {
                  echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                <div class='room-pagination'><a href='?page_id=manager-listavailableroom&page_num=".($page_num+1)."' class='ml-2'>NEXT</a></div></li>";
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

<!-- UPDATE ROOM MODAL -->
         <!-- add class modal -->
<div class="modal fade" id="update_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Available Room</h5>
          </div>

      <div class="modal-body">
         <div class="container">
             <form method="POST" id="insert_form">
              <div class="col-lg-12">
                 
                      <div class="row">

                          <div class="col-sm-4">
                              <div class="form-group">
                                 <label>Room Name:</label>
                                     <input type="text" name="room_name" id="room_name" class="form-control" disabled>
                                  </div>
                          </div>
                         </div>

                         <div class="row">
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <label>Room Number:</label>
                                     <input type="number" name="room_number" id="room_number" class="form-control">
                                     <input type="hidden" name="avail_id" id="avail_id">
                                  </div>
                          </div>
                     </div>

                     <div class="row">
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <label>Availability:</label>
                                     <!-- <input type="number" name="availability" id="availability" class="form-control"> -->
                                     <select name="availability" id="availability">
                                                <option value="Available"> Available</option>
                                                <option value="Unavailable">Occupy</option>
                                     </select>
                                     <!-- <input type="hidden" name="avail_id" id="avail_id"> -->
                                  </div>
                          </div>
                     </div>

                </div>

                 <div class="col-lg-12">
                    <div class="container">
                        

                        <div class="row">
                                <!-- <button class="btn btn-primary">Book</button> -->
                                <input type="submit" name="insert" id="insert" value="Update" class="btn btn-primary">
                                <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Close</button>
                        </div>

                       
                    </div>
               </div>



                 </form>
            </div>
        </div>

</div>

</div>

</div>



<!-- END ADD AVAILABLE ROOM MODAL -->

<!-- MODAL FOR GENERATE COUPON -->

  <div class="modal fade" id="form_coupon" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <form action="save_coupon" method="POST">
        <div class="modal-content">
          <div class="modal-body">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Coupon Code</label>
                <input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required"/>
                <br />
                <button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> Generate</button>
              </div>
              <div class="form-group">
                <label>Discount</label>
                <input type="number" class="form-control" name="discount" min="10" max="100" required="required" />
              </div>
            </div>
          </div>
          <div style="clear:both;"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
            <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>

<script>
  $(document).ready(function(){

    $('#generate').on('click', function(){
      $.get("get_coupon", function(data){
        $('#coupon').val(data);
      });
    });

    $(document).on('click', '.update_data', function(){
      var avail_id = $(this).attr("id");

        $.ajax({
            url:"admin-update-availroom-process",
            method:"POST",
            data:{avail_id:avail_id},
            dataType:"json",
            success:function(data){
              $('#room_name').val(data.room_name);
              $('#room_number').val(data.room_number);
              $('#availability').val(data.availability);
              $('#avail_id').val(data.avail_id);
              $('#insert').val("Update");
              $('#update_data_modal').modal('show');
            }
        });

    });


    $('#insert_form').on("submit", function(event){  
  
                $.ajax({  
                     url:"admin-insert",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),
                    beforeSend:function(){  
                          $('#insert').val("Updating");  
                     },    
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#update_data_modal').modal('hide');
                          $('#avail_id').val('');
                          $('#availability').val('');  
                          $('#new_table').html(data);


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
