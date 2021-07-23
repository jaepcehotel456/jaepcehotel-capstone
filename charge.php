<?php
	require_once('vendor/autoload.php');

	// $stripe = new \Stripe\StripeClient('sk_test_51IPkLfI4w4xy133hliswvWlDe32AErVYAA3VW0upV5dSyAgDGgASTTxxXUJjyshz5Yf30c2YSnwgV5pasRA0yOvX00fIo7RkRn');
	\Stripe\Stripe::setApiKey('sk_test_51IPkLfI4w4xy133hliswvWlDe32AErVYAA3VW0upV5dSyAgDGgASTTxxXUJjyshz5Yf30c2YSnwgV5pasRA0yOvX00fIo7RkRn');
// Sanitize POST Array

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);


$confirmation =	$POST['confirmation'];
$payment_method = $POST['payment_method'];
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];
$bill  = $POST['bill'];
$transaction_type = $POST['transaction_type'];

$bill = $bill*100;


// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
	"email" => $email,
	"source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
"amount" => $bill,
"currency" => "php",
"description" => "JAEPCE Hotel and Resort Payment",
"customer" => $customer->id
));

// print_r($charge);


// Redirect to success

// header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);


$conn = mysqli_connect("localhost", "root", "", "jaepce");

$sql1="SELECT * transaction WHERE confirmation = '$confirmation'";



$tid = $charge->id;

// $sql1="INSERT INTO transaction (tid) VALUES ('$tid')";


// $result1=mysqli_query($conn,$sql1);


$sql="UPDATE transaction
		
		SET

		transaction_type = '{$transaction_type}',
		payment_method = '{$payment_method}',
		tid       		 = '{$tid}'

		WHERE

		confirmation = '$confirmation'";



		$result=mysqli_query($conn,$sql);
		echo "<script>alert('Payment Successful! Please print the form and bring it upon checking in. Thank you! ')</script>";
?>

<meta http-equiv="refresh" content="0;URL='./?page_id=customer-transaction-details-paid&confirmation=<?php echo $confirmation?>&tid=<?php echo $charge->id?>'" />


<?php
?>
