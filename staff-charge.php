<?php
	require_once('vendor/autoload.php');

	 //$stripe = new \Stripe\StripeClient('sk_test_51IPkLfI4w4xy133hliswvWlDe32AErVYAA3VW0upV5dSyAgDGgASTTxxXUJjyshz5Yf30c2YSnwgV5pasRA0yOvX00fIo7RkRn');
	\Stripe\Stripe::setApiKey('sk_test_51IPkLfI4w4xy133hliswvWlDe32AErVYAA3VW0upV5dSyAgDGgASTTxxXUJjyshz5Yf30c2YSnwgV5pasRA0yOvX00fIo7RkRn');
// Sanitize POST Array

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$token = $POST['stripeToken'];
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$bill  = $POST['bill'];
$transaction_type = $POST['transaction_type'];
$payment_method = $POST['payment_method'];
$confirmation =	$POST['confirmation'];
$avail_id =	$POST['avail_id'];
$person_id =	$POST['person_id'];
$checkin =	$POST['checkin'];
$checkout =	$POST['checkout'];
$extra_bed =	$POST['extra_bed'];
$creatorName =	$POST['creatorName'];
$dateCreated =	$POST['dateCreated'];
$availability =	$POST['availability'];
$status =	$POST['status'];
$gender =	$POST['gender'];
$fname =	$POST['fname'];
$midname =	$POST['midname'];
$lname =	$POST['lname'];
$email1 = $POST['email1'];
$room_no =	$POST['room_no'];
$room_id =	$POST['room_id'];
$days =	$POST['days'];



$bills = $bill*100;

try{
// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
	"email" => $email,
	"source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
"amount" => $bills,
"currency" => "php",
"description" => "JAEPCE Hotel and Resort Payment",
"customer" => $customer->id
));

// print_r($charge);


$conn = mysqli_connect("localhost", "root", "", "jaepce");

$tid = $charge->id;

$sql="INSERT INTO transaction
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
        confirmation,
        tid)
        VALUES
        ('$person_id',
        '$room_id',
        '$gender',
        '$fname',
        '$midname',
        '$lname',
        '$email1',
        '$room_no',
        '$transaction_type',
        '$extra_bed',
        '$status',
        '$payment_method',
        '$days',
        '$checkin',
        now(),
        '$checkout',
        '$bill',
        '$dateCreated',
        '$creatorName',
        '$confirmation',
        '$tid')";



        $result=mysqli_query($conn,$sql);
        

        $sql1="UPDATE available_rooms

            SET
            
            availability = '{$availability}'

            WHERE

            avail_id = '$avail_id'";



        $result1=mysqli_query($conn,$sql1);
        
		echo "<script>alert('Payment Successful! Thank you! ')</script>";
?>
<meta http-equiv="refresh" content="0;URL='./?page_id=staff-transaction'" />
<?php
}catch(\Stripe\Exception\ApiErrorException $e) {
            $body = $e->getJsonBody();
        $err = $body['error'];
        $errorMessage = $err['message'];

        if ($e) {
            echo '<script type="text/javascript">alert("'.$errorMessage.'");</script>';
        ?>
            <meta http-equiv="refresh" content="0;URL='./?page_id=staff-online-payment'" />
        <?php
        }
        
    }

?>
<?php
?>
