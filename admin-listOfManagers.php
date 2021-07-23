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
                        <h2 class="text-white">List of Managers</h2>
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
                                    <a href="?page_id=admin-createManager" class="text-white" ><button class="btn btn-success btn-sm text-right">Add New Manager</button></a>
                                </div>

                                    <div class="container">

              

                                        <div class="row">

                                    
                                        <div class="col-lg-12 my-3">
                                          
                                      </div>

                                    <!-- Search bar -->
                                    <div class="col-lg-3 my-2">
                                      <div class="row">
                                        <input type="search" id="search" class="form-control light-table-filter" onkeyup="myFunction()" placeholder="Search" data-table="order-table">
                                      </div>
                                    </div>
                                    <!-- Search bar -->




                <?php 
               
               $getalluser = "SELECT * FROM person WHERE person_type = 3 ORDER BY createddate DESC LIMIT $start_num,$limit_num";
               $result = $databaseconnection->query($getalluser);
               if($outputresult = mysqli_query($databaseconnection, $getalluser)){
                if(mysqli_num_rows($outputresult) > 0){
              ?>

                     <table class="table table-sm table-hover table-center table-bordered order-table">
                      <thead>
                        
                          <th scope="col">Image</th>
                          <th scope="col">Full Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Account Type</th>
                          <th scope="col">Account Status</th>
                          <th scope="col">Options</th>
                        
                      </thead>

                      <tbody>
                      <?php 
						            while($row = mysqli_fetch_array($outputresult)){ 
                      ?>
                 
                        <tr>
                            <td ><img src="uploads/<?php echo $row['person_photo'] ?>" style="width:80px;"></td>
                            <td style="width:20%">
                              <?php echo  ucfirst($row['fname']) ?> <?php echo  ucfirst($row['lname']) ?> 
                            </td>
                            <td style="width:18%">
                            <?php echo  $row['email'] ?> 
                            </td>
                            <td style="width:12%">
                            <?php echo  ucfirst($row['person_type']) ?> 
                            </td>
                            <td style="width:12%">
                            <?php echo  $row['islocked'] ? "<a href='admin-unlockManager?person_id={$row['person_id']}' ><p class='btn btn-circle btn-danger'><i class='fa fa-lock'></i> Inactive &nbsp;&nbsp;</p></a>" : "<a href='admin-lockManager?person_id={$row['person_id']}'><p class='btn btn-circle btn-success'><i class='fa fa-unlock'></i> Active &nbsp;&nbsp;</p></a>" ?> 
                            </td>

                            <td>
                            <a href="?page_id=admin-viewManagerProfile&person_id=<?php echo $row['person_id']; ?>" class="btn btn-warning"> <i class="fa fa-eye"></i> &nbsp;View &nbsp;&nbsp;</a>
                            <a href="?page_id=admin-updateManagerProfile&person_id=<?php echo $row['person_id']; ?>&person=<?php echo $row['fname']; ?>" class="btn btn-info"> <i class="fa fa-edit"></i> &nbsp;Update &nbsp;&nbsp;</a>
                            <!-- <a href="admin-deleteManager?del_id=<?php echo $row["person_id"]; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp;Delete &nbsp;&nbsp;</a> -->
                          
                          
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


                $sql = "SELECT COUNT(person_id) as total FROM person WHERE person_type = 3"; 
                $result = $databaseconnection->query($sql);
                $data = $result->fetch_assoc();

                $total_pages = ceil($data["total"] / $limit_num);


                if ($page_num != 1) {
                        echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                  <div class='room-pagination'><a href='?page_id=admin-listOfManagers&page_num=".($page_num-1)."' class='ml-2'>PREV</a></div></li>";
                     }

                 for ($i=1; $i<=$total_pages; $i++) { 
            ?>

            <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
            <a href="?page_id=admin-listOfManagers&page_num=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
            </div>

            <?php
            };

            if ($page_num != $total_pages) {
                  echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                <div class='room-pagination'><a href='?page_id=admin-listOfManagers&page_num=".($page_num+1)."' class='ml-2'>NEXT</a></div></li>";
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