<?php
session_start();

	require_once('vendor/autoload.php');

	// $stripe = new \Stripe\StripeClient('sk_test_51IPkLfI4w4xy133hliswvWlDe32AErVYAA3VW0upV5dSyAgDGgASTTxxXUJjyshz5Yf30c2YSnwgV5pasRA0yOvX00fIo7RkRn');
	\Stripe\Stripe::setApiKey('sk_test_51IPkLfI4w4xy133hliswvWlDe32AErVYAA3VW0upV5dSyAgDGgASTTxxXUJjyshz5Yf30c2YSnwgV5pasRA0yOvX00fIo7RkRn');
// Sanitize POST Array

$conn = mysqli_connect("localhost", "root", "", "jaepce");
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);


$creatorId          = (int)$_SESSION['person_id'];
$gender             = $_SESSION['gender'];
$creatorName        = $_SESSION['fname'];
$midname            = $_SESSION['midname'];
$lname              = $_SESSION['lname'];
$emails              = $_SESSION['email'];
$avail_id			 = $POST['avail_id'];
$room_id			 = $POST['room_id'];
$extra_bed			= $POST['extra_bed'];
$checkin			= new DateTime($POST['checkin']);
$checkout			= new DateTime($POST['checkout']);
$checkin1			= $POST['checkin'];
$checkout1			= $POST['checkout'];
$status				= $POST['status'];
$room_no			= $POST['room_no'];
$promo              = $_SESSION['promo'];
$coupon             = $_SESSION['coupon'];    
$daysdiff           = date_diff($checkout,$checkin);

$days              = $daysdiff->format('%a');

$dateCreated        = date('Y-m-d H:i:s');


$confirmation =	$POST['confirmation'];
$payment_method = $POST['payment_method'];
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];
$bills  = $POST['bill'];
$transaction_type = $POST['transaction_type'];

$bill = $bills*100;

try{
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


$tid = $charge->id;



$sql="INSERT INTO transaction (person_id, 
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
	checkout, 
	bill, 
	transaction_date, 
	createdby, 
	confirmation, 
	tid,
    promo,
    coupon)
	VALUES
	('$creatorId',
	 '$room_id',
	 '$gender',
	 '$creatorName',
	 '$midname',
	 '$lname',
	 '$emails',
	 '$room_no',
	 '$transaction_type',
	 '$extra_bed',
	 '$status',
	 '$payment_method',
	 '$days',
	 '$checkin1',
	 '$checkout1',
	 '$bills',
	 '$dateCreated',
	 '$creatorName',
	 '$confirmation', 
	 '$tid',
     '$promo',
     '$coupon')";

	$result=mysqli_query($conn,$sql);

		if ($result) {
			echo "<script>alert('Payment Successful! You may check your transaction history in history page. Please print the form and bring it upon checking in. Thank you! ')</script>";
		}else{
			echo "<script>alert('error')</script>";
			mysqli_error($conn);
		}
?>
<meta http-equiv="refresh" content="0;URL='./?page_id=customer-transaction-details-paid&confirmation=<?php echo $confirmation?>&tid=<?php echo $charge->id?>" />
<?php
	}catch(\Stripe\Exception\ApiErrorException $e) {
		 // $return_array = [
   //      "status" => $e->getHttpStatus(),
   //      "type" => $e->getError()->type,
   //      "code" => $e->getError()->code,
   //      "param" => $e->getError()->param,
   //      "message" => $e->getError()->message,
   //  ];
   //  $return_str = json_encode($return_array);          
   //  http_response_code($e->getHttpStatus());
   //  echo $return_str;
		$body = $e->getJsonBody();
		$err = $body['error'];
		$errorMessage = $err['message'];

		if ($e) {
			echo '<script type="text/javascript">alert("'.$errorMessage.'");</script>';
		?>
			<meta http-equiv="refresh" content="0;URL='./?page_id=c-online-payment'" />
		<?php
		}
		


	}

?>



<?php
?>
<!-- 

<script>
	$(document).ajaxError(function ajaxError(event, jqXHR, ajaxSettings, thrownError) {
    try {
        var url = ajaxSettings.url;
        var http_status_code = jqXHR.status;
        var response = jqXHR.responseText;
        var message = "";
        if (isJson(response)) {     // see here for function: https://stackoverflow.com/a/32278428/4056146
            message = "  " + (JSON.parse(response)).message;
        }
        var error_str = "";

        // 1. handle HTTP status code
        switch (http_status_code) {
            case 0: {
                error_str = "No Connection.  Cannot connect to " + new URL(url).hostname + ".";
                break;
            }   // No Connection
            case 400: {
                error_str = "Bad Request." + message + "  Please see help.";
                break;
            }   // Bad Request
            case 401: {
                error_str = "Unauthorized." + message + "  Please see help.";
                break;
            }   // Unauthorized
            case 402: {
                error_str = "Request Failed." + message;
                break;
            }   // Request Failed
            case 404: {
                error_str = "Not Found." + message + "  Please see help.";
                break;
            }   // Not Found
            case 405: {
                error_str = "Method Not Allowed." + message + "  Please see help.";
                break;
            }   // Method Not Allowed
            case 409: {
                error_str = "Conflict." + message + "  Please see help.";
                break;
            }   // Conflict
            case 429: {
                error_str = "Too Many Requests." + message + "  Please try again later.";
                break;
            }   // Too Many Requests
            case 500: {
                error_str = "Internal Server Error." + message + "  Please see help.";
                break;
            }   // Internal Server Error
            case 502: {
                error_str = "Bad Gateway." + message + "  Please see help.";
                break;
            }   // Bad Gateway
            case 503: {
                error_str = "Service Unavailable." + message + "  Please see help.";
                break;
            }   // Service Unavailable
            case 504: {
                error_str = "Gateway Timeout." + message + "  Please see help.";
                break;
            }   // Gateway Timeout
            default: {
                console.error(loc + "http_status_code unhandled >> http_status_code = " + http_status_code);
                error_str = "Unknown Error." + message + "  Please see help.";
                break;
            }
        }

        // 2. show popup
        alert(error_str);
        console.error(arguments.callee.name + " >> http_status_code = " + http_status_code.toString() + "; thrownError = " + thrownError + "; URL = " + url + "; Response = " + response);

    }
    catch (e) {
        console.error(arguments.callee.name + " >> ERROR >> " + e.toString());
        alert("Internal Error.  Please see help.");
    }
});
</script> -->