<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['submit'])) {
	$name  = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	try{
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'jaepcehotel657@gmail.com'; // Gmail address which you want to use as SMTP server
		$mail->Password = 'Jaepcehotel657!'; // Gmail address Password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port = '587';

		$mail->setFrom('jaepcehotel657@gmail.com'); // Gmail address which you use as SMTP Server
		$mail->addAddress('jaepcehotel657@gmail.com'); // Email address where you want to receive emails //

		$mail->isHTML(true);
		$mail->Subject = 'Contact Form JAEPCE';
		$mail->Body = "<h3>Full Name: $name <br>Email: $email<br><br>Message: $message</h3>";

		$mail->send();
		// echo "<script>alert('Successfully Submitted!')</script>";
		header("Location: ./?page_id=contact");
		// exit;
	} catch (Exception $e){
		$alert = '<div class="alert alert-danger" role="alert">
                          '.$e->getMessage().'
                    </div>';
        echo "<script>alert('Something went wrong. Please try again.')</script>";
	}
}
?>

