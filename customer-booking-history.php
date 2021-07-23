<?php include('customer-navbar.php'); ?>

<style>
  .section-register .card-body table tbody td a.c-bh-btn {
    display: inline-block;
    font-size: 13px;
    font-weight: 700;
    padding:15px 20px;
    background: #dfa974;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 2px;
    }
</style>
      <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Booking History</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

 <section class="section-register py-2">
            <div class="container-fluid px-5">
              
                    <div class="row my-5" style="background-color:#dfa974">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-2">


                                <div class="card-body">

                

                                    <div class="container">

                     <div class="col-lg-12 my-2 text-right">
                                    <!--  <a href="customer-dashboard.html" class="text-white" >  <button class="btn btn-danger btn-sm text-right">X</button></a> -->
                                </div>
                     <div class="row">
                     <table class="table table-sm table-hover table-center table-bordered">
                     <thead>
                        <tr>
                          <th scope="col">Room Photo</th>
                          <th scope="col">Room Name</th>
                          <th scope="col">Transaction Date</th>
                          <th scope="col">Options</th>
                        </tr>
                      </thead>
                      <tbody>

            <?php 
            	$conn = mysqli_connect("localhost", "root", "", "jaepce");

            	$person_id = $_SESSION['person_id'];

            	$query = $conn->query("SELECT * FROM transaction INNER JOIN room ON transaction.room_id=room.room_id  WHERE transaction.person_id = '$person_id' AND transaction.transaction_type != 'pending' ORDER BY transaction.transaction_id DESC LIMIT $start_hist,$limit_hist");

            	$book_hist = [];

            	while ($row = $query->fetch_object()) {
            		$book_hist[] = $row;
            	}

            ?>
            <?php 
                foreach($book_hist as $book_hist_dets){
            ?>
                        <tr>
                            <td style="width:25%"><img src="uploads/<?php echo $book_hist_dets->room_photo;?>" style="width:300px;"></td>
                            <td><?php echo $book_hist_dets->room_name;?><?php echo $book_hist_dets->transaction_id;?></td>
                            <td><?php echo $book_hist_dets->transaction_date;?></td>
                            <td><a href="./?page_id=c-view-room-details&transaction_id=<?php echo $book_hist_dets->transaction_id;?>" class="c-bh-btn">View Details</a></td>
                        </tr>
            <?php } ?>
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


                $sql = "SELECT COUNT(transaction_id) as total FROM transaction WHERE person_id = '$person_id'"; 
                $result = $databaseconnection->query($sql);
                $data = $result->fetch_assoc();

                $total_pages = ceil($data["total"] / $limit_hist);


                if ($page_hist != 1) {
                        echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                  <div class='room-pagination'><a href='?page_id=customer-booking-history&page_hist=".($page_hist-1)."' class='ml-2'>PREV</a></div></li>";
                     }

                 for ($i=1; $i<=$total_pages; $i++) { 
            ?>

            <div class="room-pagination text-left <?php if($i == $page){ echo "active";} ?>">
            <a href="?page_id=customer-booking-history&page_hist=<?php echo $i?>" class="ml-2"><?php echo $i ?></a>
            </div>

            <?php
            };

            if ($page_hist != $total_pages) {
                  echo "<li style='display:inline-block; display:inline;zoom:1;margin-right:10px;'>
                <div class='room-pagination'><a href='?page_id=customer-booking-history&page_hist=".($page_hist+1)."' class='ml-2'>NEXT</a></div></li>";
              }
                                                                 
            ?>
            <!--Counter for page *End*  -->
            </ul>
             </div>
            </div>
            </div>  



<!-- END COUNT LIMITER PAGINATION -->
<!--                 <div class="col-lg-3">
                    <button class="btn btn-success px-4">Go</button>
                </div> -->
                                         
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
          </section>