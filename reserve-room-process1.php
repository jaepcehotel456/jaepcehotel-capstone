
<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "jaepce");


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

    $creatorId          = (int)$_SESSION['person_id'];
    $gender             = $_SESSION['gender'];
    $creatorName        = $_SESSION['fname'];
    $midname            = $_SESSION['midname'];
    $lname              = $_SESSION['lname'];
    $email              = $_SESSION['email'];
    $room_id            = $_POST['room_id'];
    $avail_id           = $_POST['avail_id'];
    $availability       = $_POST['availability'];
    $transaction_type   = $_POST['transaction_type'];

    $extra_bed          = $_POST['extra_bed'];
    $status             = $_POST['status'];
    $checkin            = new DateTime($_POST['checkin']);
    $checkout           = new DateTime($_POST['checkout']);


    $dateCreated        = date('Y-m-d H:i:s');

    $confirmation = createRandomPassword();
    $_SESSION['confirmation'] = $confirmation;

// ************** START QUERY FOR DAYS STAY & BILLING************* 
    $sql="SELECT * FROM room WHERE room_id  =  {$room_id}";
    $results= mysqli_query($conn,$sql); 
    $data=mysqli_fetch_assoc($results);


    $daysdiff           = date_diff($checkout,$checkin);

    $days              = $daysdiff->format('%a');


    $rate   =   $data['room_price'];

    $bill = $rate*$days;
// ************** END QUERY FOR DAYS STAY & BILLING************* 



// ************** START QUERY GETTING ROOM NUMBER OF THE ROOM VIA ROOM ID*************     

    $sqli="SELECT * FROM available_rooms WHERE avail_id = {$avail_id}";
    $results1=mysqli_query($conn,$sqli);
    $data1=mysqli_fetch_assoc($results1);


    $room_number = $data1['room_number'];

// ************** END QUERY GETTING ROOM NUMBER OF THE ROOM VIA ROOM ID*************  



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
            confirmation)
        VALUES
            ('$creatorId',
            '$room_id',
            '$gender',
            '$creatorName',
            '$midname',
            '$lname',
            '$email',
            '$room_number',
            '{$_POST['transaction_type']}',
            '{$_POST['extra_bed']}',
            '{$_POST['status']}',
            '$days',
            '{$_POST['checkin']}',
            '{$_POST['checkout']}',
            '$bill',
            '$dateCreated',
            '$creatorName',
            '$confirmation')";


            $result=mysqli_query($conn,$sql1);

            if ($result) {
                echo "<script>alert('Room Successfully Reserved! Pleasae print the form and bring the form upon visiting our Hotel for the Reservation You made!')</script>";
                 // header("Location:./?page_id=customer-transaction-details");
                 // header("Location:./?page_id=customer-booking");
            ?>
                <meta http-equiv="refresh" content="0;URL='./?page_id=customer-transaction-details&confirmation=<?php echo $confirmation?>'" /> 
            <?php
               
               
            }else{

                $_SESSION["status"] = "Room Reservation Failed!";
                header("Location:./?page_id=customer-booking");
                    // echo mysqli_error($conn);
                    // exit();
             }

// ************** END INSERTING DATA TO TRANSACTION TABLE*************  


// ************** START UPDATING DATA TO AVAILABLE ROOM TABLE AFTER RESERVING/BOOKING*************  

        $sql2="UPDATE available_rooms

             SET
             
             availability = '{$_POST['availability']}'

             WHERE

             avail_id = '$avail_id'";



    $result1=mysqli_query($conn,$sql2);


// ************** END UPDATING DATA TO AVAILABLE ROOM TABLE AFTER RESERVING/BOOKING*************  



}
