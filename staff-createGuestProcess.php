
<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "jaepce");

if(!$conn){
    echo "Failed to connect to mysql/db!";
    exit();
}

if (isset($_POST['registerbtn'])) {
	
	$person_type = $_POST['person_type'];
	$gender		 = $_POST['gender'];
	$fname		 = $_POST['fname'];
	$midname	 = $_POST['midname'];
	$lname		 = $_POST['lname'];
	$email		 = $_POST['email'];
	$birthdate	 = $_POST['birthdate'];
	$username	 = $_POST['username'];
	$password	 = $_POST['password'];
	$cpassword	 = $_POST['confirm_password'];
	$address	 = $_POST['address'];
	$city		 = $_POST['city'];
	$postcode	 = $_POST['postcode'];
	$country	 = $_POST['country'];
	$contactnumber =  $_POST['contactnumber'];


	$randomfilename = bin2hex(openssl_random_pseudo_bytes(16));
	$image_link = $_FILES['image_link']['tmp_name'];
	$extension = explode("/", $_FILES['image_link']['type']);
	$name=$randomfilename.".".$extension[1];
	$target = "uploads/".$name;

	$dateCreated = date('Y-m-d H:i:s');

if (move_uploaded_file($image_link, $target) && $password === $cpassword) {
	
$sql="INSERT INTO person
        (person_type,
        gender,
        fname,
        midname,
        lname,
        email,
        birthdate,
        person_photo,
        username,
        password,
        address,
        city,
        postcode,
        country,
        contactnumber,
        createddate)
    VALUES
        ('{$_POST['person_type']}',
        '{$_POST['gender']}',
        '{$_POST['fname']}',
        '{$_POST['midname']}',
        '{$_POST['lname']}',
        '{$_POST['email']}',
        '{$_POST['birthdate']}',
        '$name',
        '{$_POST['username']}',
        '{$_POST['password']}',
        '{$_POST['address']}',
        '{$_POST['city']}',
        '{$_POST['postcode']}',
        '{$_POST['country']}',
        '{$_POST['contactnumber']}',
        '$dateCreated')";
        
    $result=mysqli_query($conn,$sql);

    if ($result) {
    	echo "<script>alert('Successfully added New Guest.')</script>";
        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=staff-listOfGuest'" /> 
        <?php
    }else{

    	echo "<script>alert('Something went wrong!')</script>";
			// echo mysqli_error($conn);
			// exit();
		}	
	}else{
		$_SESSION['status'] = "Password and Confirm Password does not Match";
	}
  }      
?>