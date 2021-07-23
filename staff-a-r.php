<?php
include('staff-navbar.php');
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


                                    <div class="container">

              

                                        <div class="row">



                                          



                                    <!-- Search bar -->
                                    <div class="col-lg-3 my-2">
                                      <div class="row">
                                        <input type="search" id="search" class="form-control light-table-filter" onkeyup="myFunction()" placeholder="Search" data-table="order-table">
                                      </div>
                                    </div>
                                    <!-- Search bar -->




                <?php 
               //$getalluser = "SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id WHERE available_rooms.availability = 'Available' ORDER BY available_rooms.room_id DESC LIMIT $start_num,$limit_num";
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
                          <!--<th scope="col">Actions</th> -->
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
                           <!-- <td> -->
                            <!-- <a href="?page_id=admin-view-room-details&room_id=<?php echo $row['room_id']; ?>&room=<?php echo $row['room_name']; ?>&room_num=<?php echo $row['room_number'];?>" class="btn btn-warning"><i class="fa fa-eye"></i> &nbsp;View &nbsp;&nbsp;</a> -->
                            <!-- <a href="?page_id=admin-update-availroom&avail_id=<?php echo $row['avail_id']; ?>&room=<?php echo $row['room_name']; ?>&room_num=<?php echo $row['room_number'];?>" class="btn btn-info"><i class="fa fa-edit"></i> &nbsp; Update &nbsp;&nbsp;</a> -->
                          
                            
                            <!--<input type="button" name="update" value="Update" id="<?php echo $row['avail_id']; ?>" class="btn btn-info update_data" data-target="#update_data_modal" data-toggle="modal"> -->
                            
                        
                          
                          
                         <!-- </td>-->


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


                $sql = "SELECT COUNT(avail_id) as total FROM available_rooms"; 
                $result = $databaseconnection->query($sql);
                $data = $result->fetch_assoc();

                $total_pages = ceil($data["total"] / $limit_num);


                if ($page_num != 1) {
                        echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                  <div class='room-pagination'><a href='?page_id=staff-a-r&page_num=".($page_num-1)."' class='ml-2'>PREV</a></div></li>";
                     }

                 for ($i=1; $i<=$total_pages; $i++) { 
            ?>

            <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
            <a href="?page_id=staff-a-r&page_num=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
            </div>

            <?php
            };

            if ($page_num != $total_pages) {
                  echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                <div class='room-pagination'><a href='?page_id=staff-a-r&page_num=".($page_num+1)."' class='ml-2'>NEXT</a></div></li>";
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
<script>
  
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






