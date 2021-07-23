<?php include('m-navbar.php');?>
<section>
   <div class="container">
      <div class="panel with-nav-tabs panel-default">
         <div class="panel-heading">
            <ul class="nav nav-tabs">
               <li><a href="?page_id=manager-data-chart">Montly Transaction Chart</a></li>
               <li class="active"><a href="?page_id=manager-data-table">Transaction History</a></li>
            </ul>
         </div>
         <div class="panel-body">
            <div class="tab-content">
               <div class="container">
                  <!-- SQL PHP FETCHING DATA -->
                  <!-- Search bar -->
                  <div class="col-lg-3 my-2 mb-5">
                     <div class="row">
                        <input type="search" id="search" class="form-control light-table-filter" onkeyup="myFunction()" placeholder="Search" data-table="order-table">
                     </div>
                  </div>

                  <!-- Search bar -->
                  <div style="margin-right: 70px;">
                  <table class="table table-md table-hover table-center table-bordered order-table">
                     <thead>
                        <th>Room Name</th>
                        <th>Room No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Transaction Date</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                        <th>Staff Booked By</th>
                        <th>Transaction Billing</th>
                     </thead>
                     <tbody>
                        <!-- Fetch Data Each Row -->
                        <?php 
                           $sqlTransact = "SELECT * FROM transaction t
                           JOIN room r 
                           ON t.room_id = r.room_id
                           ORDER BY transaction_date DESC
                           LIMIT $start_num, $limit_num
                           ";
                           $resultTransact = mysqli_query($databaseconnection,$sqlTransact);
                           
                                        while($transactRow = mysqli_fetch_assoc($resultTransact)) {
                           
                                        // get customer name
                                        $customerfullname = $transactRow['fname'].' '.$transactRow['midname'].' '.$transactRow['lname'];
                           
                                        // get transaction date
                           
                                        // change into date type
                                        $transactiondate = date_create($transactRow['transaction_date']); 
                           
                                      // get the transaction date format
                                        $transaction_dateformat = date_format($transactiondate, 'F d, Y');
                           
                                        // get transaction date
                           
                                        // change into date type
                                        $checkIndate = date_create($transactRow['checkin']);
                           
                                        $checkOutdate = date_create($transactRow['checkout']);  
                           
                                      // get the transaction date format
                                        $checkin_dateformat = date_format($checkIndate, 'F d, Y');
                           
                                        $checkout_dateformat = date_format($checkOutdate, 'F d, Y');
                           
                                        ?>
                        <tr>
                           <td><?php echo $transactRow['room_name']; ?></td>
                           <td><?php echo $transactRow['room_no']; ?></td>
                           <td><?php echo $customerfullname ?></td>
                           <td><?php echo $transactRow['email']; ?></td>
                           <td><?php echo $transaction_dateformat ?></td>
                           <td><?php echo $checkin_dateformat ?></td>
                           <td><?php echo $checkout_dateformat ?></td>
                           <td><?php echo $transactRow['createdby']; ?></td>
                           <td><?php echo $transactRow['bill']; ?></td>
                    
                        </tr>
                        <?php 
                           }
                           
                             ?>
                     </tbody>
                  </table>
                </div>
           
                  <div class="row mt-2">
                     <div class="col text-center">
                        <div class="block-27">
                           <ul class="row text-center">
                              <!-- Counter for page *Start* -->
                              <?php 
                                 require('dbconnection.php');
                                 
                                 
                                 $sql = "SELECT COUNT(transaction_id) as total FROM transaction"; 
                                 $result = $databaseconnection->query($sql);
                                 $data = $result->fetch_assoc();
                                 
                                 $total_pages = ceil($data["total"] / $limit_num);
                                 
                                 
                                 if ($page_num != 1) {
                                         echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                                   <div class='room-pagination'><a href='?page_id=manager-data-table&page_num=".($page_num-1)."' class='ml-2'>PREV</a></div></li>";
                                      }
                                 
                                  for ($i=1; $i<=$total_pages; $i++) { 
                                 ?>
                              <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
                                 <a href="?page_id=manager-data-table&page_num=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
                              </div>
                              <?php
                                 };
                                 
                                 if ($page_num != $total_pages) {
                                       echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                                     <div class='room-pagination'><a href='?page_id=manager-data-table&page_num=".($page_num+1)."' class='ml-2'>NEXT</a></div></li>";
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
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-6">
            <div class="room-item">
               <div class="ri-text">
                  <?php 
                     require_once('dbconnection.php');
                     
                     $sql = "SELECT year(checkout) AS year, month(checkout) as month,sum(bill) AS total_bills FROM transaction WHERE status = 'CheckOut' AND year(checkout) = YEAR(CURDATE()) GROUP BY year";
                     
                     $result = mysqli_query($databaseconnection,$sql);
                     foreach ($result as $row) {
                     ?>  
                  <span><strong>Current Total Revenue:</strong> ₱<?php echo number_format($row['total_bills'], 2); ?> <br> <strong>Year :</strong> <?php echo $row['year']; ?></span>
                  <?php 
                     }
                     
                     ?>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="room-item">
               <div class="ri-text">
                  <?php
                     require_once('dbconnection.php');
                     
                     $sql = "SELECT year(checkout) AS year, month(checkout) as month,sum(bill) AS total_bills FROM transaction WHERE status = 'CheckOut' AND year(checkout) = YEAR(CURDATE()) - 1 GROUP BY year";
                     
                     $result = mysqli_query($databaseconnection,$sql);
                       foreach ($result as $row1) {
                     ?>
                  <span><strong>Last Years Total Revenue:</strong> ₱<?php echo number_format($row1['total_bills'], 2); ?> <br> <strong>Year :</strong> <?php echo $row1['year']; ?></span>
                  <?php 
                     }
                     
                     ?>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="room-item">
               <div class="ri-text">
                  <span><strong>Increase of Sales From Year</strong> <?php echo $row1['year'];?> to <?php echo $row['year'];?><strong>:</strong><br>
                  <?php 
                     $total = $row['total_bills'] - $row1['total_bills']; 
                     
                     
                     $percentage = 100*$total/$row['total_bills'];
                     
                     echo (round($percentage, 2));
                     
                     ?>%
                  </span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>
      $(document).ready(function () {
          showGraph();
      });
      
      
      function showGraph()
      {
          {
              $.post("data",
              function (data)
              {
                  console.log(data);
                   var name = [];
                  var marks = [];
      
                  for (var i in data) {
      
                      // $month = data[i].month;
                      // $month_name = date_format($month, "%M");
                      const monthNames = ["January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
      ];
                      const d = new Date(data[i].month);
      
                      name.push(monthNames[d.getMonth()]);
                      marks.push(data[i].total_bills);
                  }
      
                  var chartdata = {
                      labels: name,
                      datasets: [
                          {
                              label: 'Total Revenue',
                              backgroundColor: '#49e2ff',
                              borderColor: '#46d5f1',
                              hoverBackgroundColor: '#CCCCCC',
                              hoverBorderColor: '#666666',
                              data: marks
                          }
                      ]
                  };
      
                  var graphTarget = $("#graphCanvas");
      
                  var barGraph = new Chart(graphTarget, {
                      type: 'bar',
                      data: chartdata
                  });
              });
          }
      }
   </script>
</section>