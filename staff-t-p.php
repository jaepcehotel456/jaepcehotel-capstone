<?php
include('dbconnection.php');
session_start();



$person_type = $_SESSION['person_type'];

if(isset($_POST['nextbtn'])){

    $payment_method = $_POST['payment_method'];


   // if ($payment_method == 'cash') {

        function createRandomPassword() {

        $chars = "abcdefghijkmnopqrstuvwxyz023456789";

        srand((double)microtime()*1000000);

        $i = 0;

        $pass = '' ;
        while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

        }

        return $pass;

        }



        $avail_id           = $_POST['avail_id'];
        $person_id          = $_POST['person_id'];//----->
        $payment_method     = $_POST['payment_method'];//----->
        $checkin            = new DateTime($_POST['checkin']);//----->
        $checkout           = new DateTime($_POST['checkout']);//----->
        $extra_bed          = $_POST['extra_bed'];//----->
        $creatorName        = $_SESSION['fname'];//----->
        $dateCreated        = date('Y-m-d H:i:s');//----->

        //$availability       = $_POST['availability'];
        $status             = $_POST['status'];//----->
        $confirmation       = createRandomPassword(); //----->
        $transaction_type   = 'paid';//----->


        // *** START DATA FOR PERSON *** //
        $sql="SELECT * FROM person WHERE person_id = {$person_id}";
        $result= mysqli_query($databaseconnection,$sql); 
        $data=mysqli_fetch_assoc($result);

        $gender = $data['gender'];//----->
        $fname  = $data['fname'];//----->
        $midname = $data['midname'];//----->
        $lname  = $data['lname'];//----->
        $email  =  $data['email'];//----->
        // *** END DATA FOR PERSON *** //


        // *** START ROOM DATA *** //
        $sql1="SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id WHERE available_rooms.avail_id={$avail_id}";
        $result1=mysqli_query($databaseconnection,$sql1);
        $data1=mysqli_fetch_assoc($result1);


        $daysdiff           = date_diff($checkout,$checkin);
        $days               = $daysdiff->format('%a');
        $rate               =   $data1['room_price'];


        $bill = $rate*$days; //----->
        $room_no = $data1['room_number']; //------------>
        $room_id = $data1['room_id']; //----->


        // *** END ROOM DATA *** //

        // *** START INSERTING DATA TO TRANSACTION *** //

        $sql2="INSERT INTO transaction
        (person_id,

        room_id,
        gender,
        fname,
        midname,
        lname,
        email,
        room_no,
        transaction_type,
        extra_bed,
        status,
        payment_method,
        days,
        checkin,
        checkin_time,
        checkout,
        bill,
        transaction_date,
        createdby,
        confirmation)
        VALUES
        ('$person_id',
        '$room_id',
        '$gender',
        '$fname',
        '$midname',
        '$lname',
        '$email',
        '$room_no',
        '$transaction_type',
        '$extra_bed',
        '$status',
        '$payment_method',
        '$days',
        '{$_POST['checkin']}',
        now(),
        '{$_POST['checkout']}',
        '$bill',
        '$dateCreated',
        '$creatorName',
        '$confirmation')";


        $result2=mysqli_query($databaseconnection,$sql2);

        // *** END INSERTING DATA TO TRANSACTION *** //

        // ************** START UPDATING DATA TO AVAILABLE ROOM TABLE AFTER TRANSACTION*************  

        


        // ************** END UPDATING DATA TO AVAILABLE ROOM TABLE AFTER TRANSACTION************* 

        if ($_SESSION['person_type'] == 'admin') {
        echo "<script>alert('Room Successfully Booked!')</script>";
        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=admin-transaction'" /> 
        <?php
        }elseif($_SESSION['person_type'] == 'manager'){
        echo "<script>alert('Room Successfully Booked!')</script>";
        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=m-transaction'" />
        <?php
        }elseif($_SESSION['person_type'] == 'staff'){
        echo "<script>alert('Room Successfully Booked!')</script>";
        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=staff-transaction'" />
        <?php
        }else{
        echo "<script>alert('Room Successfully Booked!')</script>";
        }


//    }elseif($payment_method == 'credit card'){

            

//            function createRandomPassword() {
//
//          $chars = "abcdefghijkmnopqrstuvwxyz023456789";
//
  //          srand((double)microtime()*1000000);
//
  //          $i = 0;
//
  //          $pass = '' ;
    //        while ($i <= 7) {
//
  //          $num = rand() % 33;
//
  //          $tmp = substr($chars, $num, 1);

    //        $pass = $pass . $tmp;
//
  //          $i++;
//
  //          }
//
  //          return $pass;
//
  //          }
//
  //          $avail_id           = $_POST['avail_id'];
    //        $person_id          = $_POST['person_id'];//----->
      //      $payment_method     = $_POST['payment_method'];//----->
        //    $checkin1           = new DateTime($_POST['checkin']);//----->
          //  $checkout1           = new DateTime($_POST['checkout']);//----->
            //$checkin           = $_POST['checkin'];//----->
//            $checkout          = $_POST['checkout'];//----->
  //          $extra_bed          = $_POST['extra_bed'];//----->
    //        $creatorName        = $_SESSION['fname'];//----->
      //      $dateCreated        = date('Y-m-d H:i:s');//----->

//            $availability       = $_POST['availability'];
  //          $status             = $_POST['status'];//----->
    //        $confirmation       = createRandomPassword(); //----->
      //      $transaction_type   = 'paid';//----->

            // *** START DATA FOR PERSON *** //
 //           $sql="SELECT * FROM person WHERE person_id = {$person_id}";
   //         $result= mysqli_query($conn,$sql); 
     //       $data=mysqli_fetch_assoc($result);
//
  //          $gender = $data['gender'];//----->
    //        $fname  = $data['fname'];//----->
      //      $midname = $data['midname'];//----->
        //    $lname  = $data['lname'];//----->
          //  $email  =  $data['email'];//----->
            // *** END DATA FOR PERSON *** //

            // *** START ROOM DATA *** //
 //           $sql1="SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id WHERE available_rooms.avail_id={$avail_id}";
   //         $result1=mysqli_query($conn,$sql1);
     //       $data1=mysqli_fetch_assoc($result1);


       //     $daysdiff           = date_diff($checkout1,$checkin1);
         //   $days               = $daysdiff->format('%a');
           // $rate               =   $data1['room_price'];


            //$bill = $rate*$days; //----->
  //          $room_no = $data1['room_number']; //------------>
    //        $room_id = $data1['room_id']; //----->


            // *** END ROOM DATA *** //

            

        //    $_SESSION['avail_id'] = $avail_id;
      //      $_SESSION['person_id1'] = $person_id;
      //      $_SESSION['payment_method'] = $payment_method;
        //    $_SESSION['checkin'] = $checkin;
          //  $_SESSION['checkout'] = $checkout;
 //           $_SESSION['checkin1'] = $checkin1;
   //         $_SESSION['checkout1'] = $checkout1;
     //       $_SESSION['extra_bed'] = $extra_bed;
       //     $_SESSION['creatorName'] = $creatorName;
         //   $_SESSION['dateCreated'] = $dateCreated;
//            $_SESSION['availability'] = $availability;
  //          $_SESSION['status'] = $status;
    //        $_SESSION['confirmation'] = $confirmation;
      //      $_SESSION['transaction_type'] = $transaction_type;
        //    $_SESSION['gender1'] = $gender;
//            $_SESSION['fname1'] = $fname;
  //          $_SESSION['midname1'] = $midname;
    //        $_SESSION['lname1'] = $lname;
      //      $_SESSION['email1'] = $email;
        //    $_SESSION['bill'] = $bill;
//            $_SESSION['room_no'] = $room_no;
  //          $_SESSION['room_id'] = $room_id;
    //        $_SESSION['days'] = $days;

    

            // header("Location: ./?page_id=staff-online-payment");
        ?>
           <!-- <meta http-equiv="refresh" content="0;URL='./?page_id=staff-online-payment'" /> -->
        <?php
 //   }


}

?>