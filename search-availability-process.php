
<?php 
	session_start();
	include('dbconnection.php'); 
	$roomid    = $_POST['room_id'];
	$checkin1   = new DateTime ($_POST['checkin']);
    $checkout2  = new DateTime ($_POST['checkout']);
    $checkin    = $_POST['checkin'];
    $checkout   = $_POST['checkout'];


   // $query = mysqli_query($conn, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon' && `status` = 'Valid'") or die(mysqli_error());
   // $count = mysqli_num_rows($query);
   // $fetch = mysqli_fetch_array($query);

if($checkin1 > $checkout2){
             echo "<script>alert('Please put the CHECK-IN Date before the CHECK-OUT')</script>";
             ?>
              <meta http-equiv="refresh" content="0;URL='./?page_id=search-availability&room_id=<?php echo $roomid;?>'>" /> 
<?php
    }elseif ($checkin1 == $checkout2) {
            echo "<script>alert('Please put the CHECK-OUT Date on next day')</script>";
            ?>
            <meta http-equiv="refresh" content="0;URL='./?page_id=search-availability&room_id=<?php echo $roomid;?>'>" /> 
        <?php
    }else{

    //$query = mysqli_query($databaseconnection,"SELECT * FROM transaction WHERE $roomid = room_id AND '$checkin'  BETWEEN checkin and checkout AND '$checkout'  BETWEEN checkin and checkout ");
    ///$count = mysqli_num_rows($query);
    

    $query2 = mysqli_query($databaseconnection,"SELECT * FROM transaction WHERE $roomid = room_id AND checkin BETWEEN '$checkin' and '$checkout' AND checkout BETWEEN '$checkin' and '$checkout' ");
    $count2 = mysqli_num_rows($query2);
    

    //$sql1 = mysqli_query($databaseconnection,"SELECT room_no FROM transaction WHERE $roomid = room_id AND '$checkin'  BETWEEN checkin and checkout AND '$checkout'  BETWEEN checkin and checkout ");
   // $data1=mysqli_fetch_assoc($sql1);
   // $room_no1 = $data1['room_no'];

    //$sql = mysqli_query($databaseconnection,"SELECT room_number FROM available_rooms INNER JOIN transaction ON  available_rooms.room_id=transaction.room_id  WHERE available_rooms.room_id = '$roomid' AND available_rooms.room_number NOT IN ('$room_no1') AND '$checkin' NOT BETWEEN transaction.checkin and transaction.checkout AND '$checkout' NOT BETWEEN transaction.checkin and transaction.checkout");
   // $data=mysqli_fetch_assoc($sql);
    //$room_no = $data['room_number'];


    //$sql = mysqli_query($databaseconnection,"SELECT room_number FROM available_rooms INNER JOIN transaction ON  available_rooms.room_id=transaction.room_id  WHERE available_rooms.room_id = $roomid AND available_rooms.room_number != transaction.room_noAND '$checkin' NOT BETWEEN 'transaction.checkin' and 'transaction.checkout' AND '$checkout' NOT BETWEEN 'transaction.checkin' and 'transaction.checkout'");
   // $number = mysqli_num_rows($query1);

    

    

    $query1 = mysqli_query($databaseconnection, "SELECT room_number FROM available_rooms WHERE $roomid = room_id AND availability = 'Available' ");
    $count1 = mysqli_num_rows($query1);
    $fetch = mysqli_fetch_assoc($query1);
    $roomer = $fetch['room_number'];

   // $total1 =  $count + $count2;
    $total = $count1 - $count2 ;

    $room_no = $roomer + $total - 1;




  //  while($x != 0){
   // $data= mysqli_fetch_assoc($sql);
  //  $room_no1 = $data['room_number'];
 //   $room_no =  $room -
  //      $x --;
  // }

    if($total > 0){

    			 $_SESSION['roomid']     = $roomid;
    			 $_SESSION['checkin']    = $checkin;
    			 $_SESSION['checkout']   = $checkout;
    			 $_SESSION['total']      = $total;
                 $_SESSION['room_no']    = $room_no;
    			

    ?>

    			

    			<meta http-equiv="refresh" content="0;URL='./?page_id=w-available-rooms&room_id=<?php echo $roomid;?>'" /> 
    <?php
    }else{

    	 echo "<script>alert('Sorry, the selected room is currently fully booked!')</script>";
    	 ?>
    	 <meta http-equiv="refresh" content="0;URL='./?page_id=search-availability&room_id=<?php echo $roomid;?>'>" /> 

    	 <?php

    }


	//$cat = $databaseconnection->query("SELECT * FROM room");
	//$cat_arr = array();
	//while($row = $cat->fetch_assoc()){
	//	$cat_arr[$row['id']] = $row;
	//}
	//$qry = $databaseconnection->query("SELECT distinct(room_id),room_id from available_rooms where id in (SELECT room_id from transaction where '$checkin' NOT BETWEEN date(checkin) and date(checkout) and '$checkout' NOT BETWEEN date(checkin) and date(checkout)  )");
	//while($row= $qry->fetch_assoc()):

	//$

}
?>





<?php



//    $sql = "SELECT * FROM `transaction` WHERE ('$checkin' NOT BETWEEN `checkin` AND `checkout`) AND ('$checkout' NOT BETWEEN `checkin` AND `checkout`)";
//	$result = mysqli_query($databaseconnection,$sql);
//	$count = mysqli_num_rows($result);
//	$data=mysqli_fetch_assoc($result);

//	if($count > 0){
//		while
//		$room = $data['room_id'];

//	}else{
//		 echo "<script>alert('There are no available rooms on seleceted dates!')</script>";
//		 ?>
<!--		  <meta http-equiv="refresh" content="0;URL='./?page_id=search-availability'" /> 
	}



-->
	<?php


	//$sql1 = "SELECT * FROM `rooms` WHERE room_id = "


?>