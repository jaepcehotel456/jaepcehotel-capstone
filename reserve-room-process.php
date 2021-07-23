
<?php
session_start();

include('dbconnection.php');



if (isset($_POST['reservebtn'])) {



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


// ************** DECLARING ALL THE INPUT/POST FROM RESERVE ROOM *************      
    $pay_con            = $_POST['pay_con'];

    $creatorId          = (int)$_SESSION['person_id'];
    $gender             = $_SESSION['gender'];
    $creatorName        = $_SESSION['fname'];
    $midname            = $_SESSION['midname'];
    $lname              = $_SESSION['lname'];
    $email              = $_SESSION['email'];
    $room_id            = $_POST['room_id'];
    //$avail_id           = $_POST['avail_id'];
    //$availability       = $_POST['availability'];
    $transaction_type   = $_POST['transaction_type'];

    $extra_bed          = $_POST['extra_bed'];
    //$status             = $_POST['status'];
    $status             = "pending";
    $checkin            = new DateTime($_POST['checkin']);
    $checkout           = new DateTime($_POST['checkout']);
    $coupon             = $_POST['coupon'];
    $room_no            = $_SESSION['room_no'];

    $dateCreated        = date('Y-m-d H:i:s');

    $confirmation = createRandomPassword();
    $_SESSION['confirmation'] = $confirmation;
if($checkin == $checkout){
             echo "<script>alert('Please put the checkout date on next day')</script>";
             ?>
             <meta http-equiv="refresh" content="0;URL='./?page_id=reserve-room&room_id=<?php echo $room_id; ?>&avail_id=<?php echo $avail_id; ?>'" /> 
<?php
    }else{

    

// ************** START QUERY FOR DAYS STAY & BILLING************* 
    $sql="SELECT * FROM room WHERE room_id  =  {$room_id}";
    $results= mysqli_query($databaseconnection,$sql); 
    $data=mysqli_fetch_assoc($results);


    $daysdiff           = date_diff($checkout,$checkin);

    $days              = $daysdiff->format('%a');


    $rate   =   $data['room_price'];
    $bill   =   "";
    if($coupon == ""){
    $bill = $rate*$days;
    $promo = 0;
    }else{
        $bill1= $rate*$days;
        $query = mysqli_query($databaseconnection, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon' && `status` = 'Valid'") or die(mysqli_error());
        $count = mysqli_num_rows($query);
        $fetch = mysqli_fetch_array($query);
        if ($count > 0) {
            
        $discount = $fetch['discount'] / 100;
        $total = $discount * $bill1;
        $discounts = $fetch['discount'];
        $bill = $bill1 - $total;
        $promo = 1;
    }else{
        echo "<script>alert('Invalid Promo Code!')</script>";

        ?>
       <meta http-equiv="refresh" content="0;URL='./?page_id=c-available-rooms&room_id=<?php echo $room_id; ?>'" /> 
<?php        
    }
// ************** END QUERY FOR DAYS STAY & BILLING************* 
    
}
if($bill != ""){
if ($pay_con == "1") {

// ************** START INSERTING DATA TO TRANSACTION TABLE*************    
       $sql1="INSERT INTO transaction
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
            days,
            checkin,
            checkout,
            bill,
            transaction_date,
            createdby,
            confirmation,
            promo,
            coupon)
        VALUES
            ('$creatorId',
            '$room_id',
            '$gender',
            '$creatorName',
            '$midname',
            '$lname',
            '$email',
            '$room_no',
            '{$_POST['transaction_type']}',
            '{$_POST['extra_bed']}',
            '$status',
            '$days',
            '{$_POST['checkin']}',
            '{$_POST['checkout']}',
            '$bill',
            '$dateCreated',
            '$creatorName',
            '$confirmation',
            '$promo',
            '$coupon')";


            $result=mysqli_query($databaseconnection,$sql1);

            if ($result) {
              
                 echo "<script>alert('Room Successfully Reserved! Please be On-site or Contact Us ahead before the check in time or the reservation will be cancelled!')</script>";
            ?>

                <meta http-equiv="refresh" content="0;URL='./?page_id=customer-pending'" /> 
            <?php
               
             }  
            else{

                $_SESSION["status"] = "Room Reservation Failed!";
                echo "<script>alert('Room Reservation Failed! Please Try Again! ')</script>";
                header("Location:./?page_id=c-available-rooms&room_id=<?php echo $room_id; ?>");
                    // echo mysqli_error($databaseconnection);
                    // exit();
             }
        }elseif ($pay_con == "2") {
            
                $_SESSION['confirmation'] = $confirmation;

                $_SESSION['room_id']      = $room_id;
                $_SESSION['extra_bed']    = $extra_bed;
                $_SESSION['status']       = $status;
                $_SESSION['checkin']      = $_POST['checkin'];
                $_SESSION['checkout']     = $_POST['checkout'];
                $_SESSION['bill']         = $bill;
               // $_SESSION['avail_id']     = $avail_id;
                $_SESSION['promo']        = $promo;
                $_SESSION['coupon']       = $coupon;
                $_SESSION['room_no']      = $room_no;
                $_SESSION['days']         = $days;
                $_SESSION['creatorId']    = $creatorId;
        ?>
            <meta http-equiv="refresh" content="0;URL='./?page_id=c-payment'" />
        <?php
        }else{
            echo "error";
        }

// ************** END INSERTING DATA TO TRANSACTION TABLE*************  


 
}
}
}

?>
