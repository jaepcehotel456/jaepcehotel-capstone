<?php

include('dbconnection.php');

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';


if (isset($_POST['submit'])) {

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

    



	$fname  = $_POST['fname'];
	$midname  = $_POST['midname'];
	$lname  = $_POST['lname'];
	$gender  = $_POST['gender'];
	$email = $_POST['email'];
	$birthdate  = $_POST['birthdate'];
	$contact = $_POST['contact'];
	$roomid   = $_POST['room_id'];
	$checkin   = new DateTime($_POST['checkin']);
    $checkout  = new DateTime($_POST['checkout']);
	$room_no  = $_POST['room_no'];
	$status = 'pending';
	
	$transaction_type = 'pending';
	$payment_method = 'none';
	$extra_bed = $_POST['room_no'];
	$coupon    = $_POST['coupon'];
	$confirmation = createRandomPassword();
    $dateCreated        = date('Y-m-d H:i:s');
    $createdby = "Customer-w";

    $sql     = "SELECT * FROM room  WHERE $roomid = room_id ";
    $results = mysqli_query($databaseconnection,$sql); 
    $data    = mysqli_fetch_assoc($results);
    $room_name = $data['room_name'];



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
       <meta http-equiv="refresh" content="0;URL='./?page_id=w-booking&room_id=<?php echo $room_id; ?>'" />
       
<?php        
    }
}

if($room_no != ''){

    $sql1="INSERT INTO transaction
            (            
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
            coupon,
            contact_no)
        VALUES
            (
            '$roomid',
            '$gender',
            '$fname',
            '$midname',
            '$lname',
            '$email',
            '$room_no',
            '$transaction_type',
            '{$_POST['extra_bed']}',
            '$status',
            '$days',
            '{$_POST['checkin']}',
            '{$_POST['checkout']}',
            '$bill',
            '$dateCreated',
            '$createdby',
            '$confirmation',
            '$promo',
            '$coupon',
        	'$contact')";


            $result=mysqli_query($databaseconnection,$sql1);

            if ($result) {
              
                 echo "<script>alert('Room Successfully Reserved! Please be On-site or Contact Us ahead before the check in time or the reservation will be cancelled!')</script>";
            ?>

              <meta http-equiv="refresh" content="0;URL='./?page_id=w-transaction-details&confirmation=<?php echo $confirmation; ?>'" />
                
            <!--<form class="form-register" method="POST" action="w-transaction-details" enctype="multipart/form-data">
                  

            </form> -->
            <?php
               //$_SESSION["confirmation"] = $confirmation;
               //$_SESSION["coupon"] = $coupon;  
             }  
            else{

                $_SESSION["status"] = "Room Reservation Failed!";
                echo "<script>alert('Room Reservation Failed! Please Try Again! ')</script>";
                header("Location:./?page_id=w-booking&room_id=<?php echo $room_id; ?>");
                    // echo mysqli_error($databaseconnection);
                    // exit();
             }


}else{

    header("Location:./?page_id=home");
}
}
	//try{
	//	$mail->isSMTP();
	//	$mail->Host = 'smtp.gmail.com';
	//	$mail->SMTPAuth = true;
	//	$mail->Username = 'jaepcehotels@gmail.com'; // Gmail address which you want to use as SMTP server
	//	$mail->Password = 'qweasdqwdase132'; // Gmail address Password
	//	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	//	$mail->Port = '587';
//
//		$mail->setFrom('jaepcehotels@gmail.com'); // Gmail address which you use as SMTP Server
//		$mail->addAddress('jaepcehotels@gmail.com'); // Email address where you want to receive emails //
//
//		$mail->isHTML(true);
//		$mail->Subject = 'Web Booking Form JAEPCE';
//		$mail->Body = "<h3>Full Name: $fname $midname . $lname  <br>Email: $email<br> <br>Contact No#: $contact <br>Birthdate: $birthdate <br>Selected Room: $room_name  <br>Check-in: $checkin <br>Check-out: $checkout <br> </h3>";
//
//		$mail->send();
//		echo "<script>alert('Successfully Submitted!')</script>";
//		header("Location: ./?page_id=home");
//		// exit;
//	} catch (Exception $e){
//		$alert = '<div class="alert alert-danger" role="alert">
  //                        '.$e->getMessage().'
    //                </div>';
      //  echo "<script>alert('Something went wrong. Please try again.')</script>";
//	}
//}



?>

