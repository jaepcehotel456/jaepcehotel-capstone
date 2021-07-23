<?php include('admin-navbar.php'); ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg');background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Online Bookings</h2>
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
                                    <!-- <a href="?page_id=admin-pending-reservation" class="text-white"><button class="btn btn-success btn-md text-right">Pending Reservations</button></a> -->
                                    <select class="btn btn-success btn-md text-right" id="room" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                      <option value="?page_id=admin-online-bookings">Admin Online Bookings</option>
                                    <option value="?page_id=admin-pending-reservation">Admin Pending Reservation</option>
                                    <option value="?page_id=admin-transaction">Admin Transaction</option>
                                    <option value="?page_id=admin-checkout-rooms">Currently Check In's</option>
                                    </select>  
                                </div>
                                <!-- <div class="col-md-10">
                                  <a href="./?page_id=admin-checkout-rooms" class="text-white float-right"><button class="btn btn-info btn-md text-right">Check Out Rooms</button></a>
                                </div> -->
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
                                        WHERE transaction.transaction_type != 'pending' AND transaction.status = 'Pending' ORDER BY transaction.transaction_date DESC LIMIT $start_num,$limit_num";
                                        $result = $databaseconnection->query($pendingdata);
                                        if ($outputresult = mysqli_query($databaseconnection, $pendingdata)) {
                                            if (mysqli_num_rows($outputresult) > 0) {       
                                    ?>

                                <table class="table table-md table-hover table-center table-bordered order-table">
                                        <thead>
                                            
                                                <th>Room Name</th>
                                                <th>Room Number</th>
                                                <th>Name</th>
                                            <!--    <th>Email</th> -->
                                            <!--    <th>Contact No#</th> -->
                                                <th>Transaction Status</th>
                                                <th>Transaction Date</th>
                                                <th>Confirmation Code</th>
                                                <th>Check in</th>
                                                <th>Check out</th>
                                                <th>Actions</th>
                                            
                                        </thead>
                                            
                                            <tbody>
                                       <!-- Fetch Data Each Row -->
                                            <?php
                                                while($row = mysqli_fetch_array($outputresult)) {
                                                $transactiondate = date_create($row['transaction_date']); 
                                                $checkin = date_create($row['checkin']);;
                                                $checkout = date_create($row['checkout']);;
                                            ?>

                                            <tr>
                                                <td><?php echo $row['room_name']; ?></td>
                                                <td><?php echo $row['room_no']; ?></td>
                                                <td><?php echo $row['fname']; ?> <?php echo $row['midname']; ?>. <?php echo $row['lname']; ?></td>
                                               <!-- <td><?php echo $row['email']; ?></td> -->
                                               <!-- <td><?php echo $row['contact']; ?></td> -->
                                                <td><?php echo ucfirst($row['transaction_type']); ?></td>
                                                <td><?php echo date_format($transactiondate, 'F d, Y'); ?></td>
                                                <td><?php echo $row['confirmation']; ?></td>
                                                <td><?php echo date_format($checkin, 'F d, Y'); ?></td>
                                                <td><?php echo date_format($checkout, 'F d, Y'); ?></td>
                                                <td>
                                                <form class="form-register" method="POST" action="checkin-process" enctype="multipart/form-data">
                                                <div class="col-sm-10">
                                              
                                             <?php if($row['transaction_type'] != 'paid'){



                                              ?>
                                              <select  name="payment_method" id="payment_method"  required>
                                               <option disable > Select payment</option>
                                               <option value="cash"  > Cash</option>
                                               <option value="credit card"  > Credit Card</option>
                                             </select>
                                              <?php }//else{
                                                ?>
                                                <!--
                                                <select  name="payment_method" id="payment_method"  required>
                                                <option disable > <?php echo $row['payment_method']; ?></option> 
                                                </select>
                                               -->
                                                
                                              <?php
                                             // }
                                                ?>
                                            
                                                <input type="hidden" name="transaction_id" id="transaction_id" value="<?php echo $row['transaction_id'] ?>">
                                                <input type="hidden" name="transaction_type" id="transaction_type" value="Paid">
                                                <input type="hidden" name="status" id="status" value="CheckIn">
                                                <button type="submit" name="submit" class="btn-join btn-sm btn-primary text-uppercase">Check in</button>

                                                 </form>
                                                <!--<input type="button" name="view" value="View" id="<?php echo $row['transaction_id']; ?>" class="btn btn-warning view_data" data-target="#view_data_modal" data-toggle="modal"> -->
                                                </td>
                                                <!-- <br> -->
                                            </tr>
                                            <?php  }}else{
                                              ?>
                                              <table class="table table-md table-hover table-center table-bordered order-table">
                                                    <thead>
                                                
                                                    <th>Room Name</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Transaction Status</th>
                                                    <th>Transaction Date</th>
                                                    <th>Confirmation Code</th>
                                                    <th>Actions</th>
                                                
                                                    </thead>

                                                    <tbody>
                                                      <tr>
                                                        <td>No Online Bookings</td>
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


                $sql = "SELECT COUNT(transaction_id) as total FROM transaction WHERE transaction_type != 'pending' AND status = 'Pending'"; 
                $result = $databaseconnection->query($sql);
                $data = $result->fetch_assoc();

                $total_pages = ceil($data["total"] / $limit_num);


                if ($page_num != 1) {
                        echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                  <div class='room-pagination'><a href='?page_id=admin-online-bookings&page_num=".($page_num-1)."' class='ml-2'>PREV</a></div></li>";
                     }

                 for ($i=1; $i<=$total_pages; $i++) { 
            ?>

            <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
            <a href="?page_id=admin-online-bookings&page_num=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
            </div>

            <?php
            };

            if ($page_num != $total_pages) {
                  echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                <div class='room-pagination'><a href='?page_id=admin-online-bookings&page_num=".($page_num+1)."' class='ml-2'>NEXT</a></div></li>";
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




    <!-- VIEW MODAL -->
         <!-- add class modal -->
         <!--
<div class="modal fade" id="view_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Check In Form</h5>
            </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" id="insert_form">
                            <div class="col-lg-12">

                                
                                    <div class="row">
                                      <div class="col-sm-5">
                                            <div class="form-group">
                                             <label>Room Name:</label><br>
                                             
                                             <input type="text" name="room_name" id="room_name" disabled>
                                            </div>
                                      </div>
                                    </div>
                                    

                                    <div class="row">

                                      <div class="col-sm-12">
                                      <div class="form-group">
                                       <label>Room No :</label><br>
                                       <input type="text" name="room_number" id="room_number" disabled>            
                                        </div>
                                    </div>

                                      <div class="col-sm-2">
                                            <div class="form-group">
                                             <label>Check In :</label><br>
                                             <input type="text" name="checkin" id="checkin" disabled>            
                                            </div>
                                      </div>
                                      <div class="col-sm-2">
                                            <div class="form-group">
                                             <label>Check Out :</label><br>
                                             <input type="text" name="checkout" id="checkout" disabled>         
                                            </div>
                                      </div>
                                    </div>

                                    
                                    <div class="row">
                                      <div class="col-sm-2">
                                            <div class="form-group">
                                             <label>Days :</label><br>
                                             <input type="text" name="days" id="days" disabled>            
                                            </div>
                                      </div>
                                     Contact Number 
                                      <div class="col-sm-5">
                                            <div class="form-group">
                                             <label>Contact Number :</label><br>
                                             <input type="number" name="contactnumber" id="contactnumber" disabled>            
                                            </div>
                                      </div>
                                  
                                      <div class="col-sm-2">
                                            <div class="form-group">
                                             <label>Bill :</label><br>
                                             <input type="text" name="bill" id="bill" disabled>            
                                            </div>
                                      </div>
                                      
                                      <div class="col-sm-10">
                                            <div class="form-group">
                                             <label>Payment :</label><br>
                                             <select  name="payment_method" id="payment_method" required="">
                                               <option value="cash"  > Cash</option>
                                               <option value="credit card"  > Credit Card</option>
                                             </select>
                                                
                                            </div>
                                      </div>
                                      
                                    </div>
                                    <input type="hidden" name="transaction_id" id="transaction_id">
                                    <input type="hidden" name="transaction_type" id="transaction_type">
                                    <input type="hidden" name="status" id="status" value="CheckIn">
                                    

                            </div>
                            <div class="col-lg-12">
                                <div class="container">
                                    <div class="row">
                                            
                                            <input type="submit" name="insert" id="insert" value="Check In" class="btn btn-danger">
                                            <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Close</button>
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

<!--

<script>

        $(document).ready(function(){

         function submitForm(action)
            {
                document.getElementById('insert_form').action = action;
                document.getElementById('insert_form').submit();
            }
        $(document).on('click', '.view_data', function(){
            var transaction_id = $(this).attr("id");
            $.ajax({
                url:"admin-view-bookings",
                method:"POST",
                data:{transaction_id:transaction_id},
                dataType:"json",
                success:function(data){
                    $('#room_name').val(data.room_name);
                    $('#contactnumber').val(data.contactnumber);
                    $('#room_id').val(data.room_id);
                    $('#days').val(data.days);
                    $('#transaction_id').val(data.transaction_id);
                    $('#checkin').val(data.checkin);
                    $('#checkout').val(data.checkout);
                    $('#avail_id').val(data.avail_id);
                    $('#bill').val(data.bill);
                    $('#room_number').val(data.room_number);
                    $('#transaction_type').val(data.transaction_type);
                    $('#payment_method').val(data.payment_method);
                    $('#insert').val("Check In");
                    $('#view_data_modal').modal('show');

                }
            });
        });


        $('#insert_form').on("submit", function(event){  
  
                $.ajax({  
                     url:"admin-insert-checkin",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),
                    beforeSend:function(){  
                          $('#insert').val("Updating");  
                     },    
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#view_data_modal').modal('hide');
                          $('#transaction_id').val('');
                          $('#transaction_type').val('');
                          $('#status').val('');
                          $('#bill').val('');
                          $('#payment_method').val('');           
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

-->