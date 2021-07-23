<?php include('m-navbar.php'); ?>

  <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg');background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Check Out Rooms</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="section-register py-2">
        <div class="container-fluid px-5">
            <div class="row my-5" style="background-color:#dfa974">
                <div class="col-md-12 mx-auto">
                    <div class="card card-register my-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <select class="btn btn-success btn-md text-right" id="room" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                  <option value="?page_id=m-checkout-rooms">Currently Check In's</option>
                                  <option value="?page_id=m-pending-reservation">Pending Reservation</option>
                                  <option value="?page_id=m-transaction">Transaction</option>
                                  <option value="?page_id=m-online-bookings">Online Bookings</option>
                                  </select>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- Search bar -->
                                    <div class="col-lg-3 my-2">
                                      <div class="row">
                                        <input type="search" id="search" class="form-control light-table-filter" onkeyup="myFunction()" placeholder="Search" data-table="order-table">
                                      </div>
                                    </div>
                                    <!-- Search bar -->

                                    <!-- SQL PHP FETCHING DATA -->

                                    <?php
                                        $pendingdata = "SELECT * FROM transaction INNER JOIN room ON transaction.room_id=room.room_id 
                                        WHERE transaction.status = 'CheckIn' ORDER BY transaction.transaction_date DESC LIMIT $start_num,$limit_num";
                                        $result = $databaseconnection->query($pendingdata);
                                        if ($outputresult = mysqli_query($databaseconnection, $pendingdata)) {
                                            if (mysqli_num_rows($outputresult) > 0) {      
                                    ?>

                                <table class="table table-md table-hover table-center table-bordered order-table">
                                        <thead>
                                            
                                                <th>Room Name</th>
                                                <th>Room No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Transaction Status</th>
                                                <th>Check-In Date</th>
                                                <th>Check-Out Date</th>
                                                <th>Confirmation Code</th>
                                                <th>Actions</th>
                                            
                                        </thead>
                                            
                                            <tbody>
                                       <!-- Fetch Data Each Row -->
                                            <?php
                                                while($row = mysqli_fetch_array($outputresult)) {
                                                $transactiondate = date_create($row['checkin']); 
                                                $checkoutdate = date_create($row['checkout']); 
                                            ?>

                                            <tr>
                                                <td><?php echo $row['room_name']; ?></td>
                                                <td><?php echo $row['room_no']; ?></td>
                                                <td><?php echo $row['fname']; ?> <?php echo $row['midname']; ?>. <?php echo $row['lname']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo ucfirst($row['transaction_type']); ?></td>
                                                <td><?php echo date_format($transactiondate, 'F d, Y'); ?></td>
                                                <td><?php echo date_format($checkoutdate, 'F d, Y'); ?></td>
                                                <td><?php echo $row['confirmation']; ?></td>
                                                <td>
                                                <?php

                                                 if ($row['transaction_type'] == 'reserve') {
                                                 ?>
                                                 <a onclick="return confirm('Customer hasnt paid yet')" href="?page_id=manager-checkout-rooms&transaction_id=<?php echo $row['transaction_id'];?>&room_id=<?php echo $row['room_no'];?>" class="btn btn-danger">Check Out</a>
                                                 <?php
                                                 }else{
                                                 ?> 
                                                <a href="?page_id=manager-checkout-rooms&transaction_id=<?php echo $row['transaction_id'];?>&room_id=<?php echo $row['room_no'];?>" class="btn btn-danger">Check Out</a>
                                                <?php
                                                }?>
                                                </td>
                                                <br>
                                            </tr>
                                            <?php  }}else{

                                            ?>
                                <table class="table table-md table-hover table-center table-bordered order-table">
                                        <thead>
                                            
                                                <th>Room Name</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Transaction Status</th>
                                                <th>Check-In Date</th>
                                                <th>Check-Out Date</th>
                                                <th>Confirmation Code</th>
                                                <th>Actions</th>
                                            
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>No Reservation/Bookings</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                            </table>
                                            <?php
                                            }}
                                            ?>
                                            </tbody>
                                            </table>
                                      
                                    


                                    
                                                                       <!--START COUNT LIMITER PAGINATION -->

      <div class="row mt-2">
               <div class="col text-center">
                     <div class="block-27">

                         <ul class="row text-center">
       <!-- Counter for page *Start* -->
            <?php 
                require('dbconnection.php');


                $sql = "SELECT COUNT(transaction_id) as total FROM transaction WHERE status = 'CheckIn'"; 
                $result = $databaseconnection->query($sql);
                $data = $result->fetch_assoc();

                $total_pages = ceil($data["total"] / $limit_num);


                if ($page_num != 1) {
                        echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                  <div class='room-pagination'><a href='?page_id=m-checkout-rooms&page_num=".($page_num-1)."' class='ml-2'>PREV</a></div></li>";
                     }

                 for ($i=1; $i<=$total_pages; $i++) { 
            ?>

            <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
            <a href="?page_id=m-checkout-rooms&page_num=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
            </div>

            <?php
            };

            if ($page_num != $total_pages) {
                  echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                <div class='room-pagination'><a href='?page_id=m-checkout-rooms&page_num=".($page_num+1)."' class='ml-2'>NEXT</a></div></li>";
              }
                                                                 
            ?>
            <!--Counter for page *End*  -->
            </ul>
             </div>
            </div>
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