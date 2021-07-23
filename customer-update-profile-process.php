
<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "jaepce");


if (isset($_POST['updatebtn'])) {
	

    $id          = $_POST['id'];
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
    if($_FILES['image_link']['error'] != 4){
    $extension = explode("/", $_FILES['image_link']['type']);
    $name=$randomfilename.".".$extension[1];
    $target = "uploads/".$name;
    }

    $dateCreated = date('Y-m-d H:i:s');
	// $randomfilename = bin2hex(openssl_random_pseudo_bytes(16));
	// $image_link = $_FILES['image_link']['tmp_name'];
	// $extension = explode("/", $_FILES['image_link']['type']);
	// $name=$randomfilename.".".$extension[1];
	// $target = "uploads/".$name;

if ($_FILES['image_link']['error'] != 4 && move_uploaded_file($image_link, $target)) {
	
$sql="UPDATE person

        SET

        person_type = '{$_POST['person_type']}',
        gender = '{$_POST['gender']}',
        fname = '{$_POST['fname']}',
        midname = '{$_POST['midname']}',
        lname = '{$_POST['lname']}',
        email = '{$_POST['email']}',
        birthdate = '{$_POST['birthdate']}',
        person_photo = '$name',
        username = '{$_POST['username']}',
        password = '{$_POST['password']}',
        address = '{$_POST['address']}',
        city = '{$_POST['city']}',
        postcode = '{$_POST['postcode']}',
        country = '{$_POST['country']}',
        contactnumber = '{$_POST['contactnumber']}',
        modifieddate = '$dateCreated' 

        WHERE 

        person_id = '$id'";


        
    $result=mysqli_query($conn,$sql);


    if ($result) {
    	$_SESSION["success"] = "Account Updated Successfully!";
        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=customer-update-profile&person_id=<?php echo $_SESSION['person_id'];?>'" /> 
    <?php
    }else{

    	$_SESSION["status"] = "Account Update Failed!";
    	header("Location:./?page_id=customer-update-profile");
		}	
	}else{

      

        $id          = mysqli_real_escape_string($conn,$_POST['id']);
        $person_type = mysqli_real_escape_string($conn,$_POST['person_type']);
        $gender      = mysqli_real_escape_string($conn,$_POST['gender']);
        $fname       = mysqli_real_escape_string($conn,$_POST['fname']);
        $midname     = mysqli_real_escape_string($conn,$_POST['midname']);
        $lname       = mysqli_real_escape_string($conn,$_POST['lname']);
        $email       = mysqli_real_escape_string($conn,$_POST['email']);
        $birthdate   = mysqli_real_escape_string($conn,$_POST['birthdate']);
        $username    = mysqli_real_escape_string($conn,$_POST['username']);
        $password    = mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword   = mysqli_real_escape_string($conn,$_POST['confirm_password']);
        $address     = mysqli_real_escape_string($conn,$_POST['address']);
        $city        = mysqli_real_escape_string($conn,$_POST['city']);
        $postcode    = mysqli_real_escape_string($conn,$_POST['postcode']);
        $country     = mysqli_real_escape_string($conn,$_POST['country']);
        $contactnumber =  mysqli_real_escape_string($conn,$_POST['contactnumber']);
        $dateCreated = date('Y-m-d H:i:s');


        $sql="UPDATE person

        SET

        person_type = '{$_POST['person_type']}',
        gender = '{$_POST['gender']}',
        fname = '{$_POST['fname']}',
        midname = '{$_POST['midname']}',
        lname = '{$_POST['lname']}',
        email = '{$_POST['email']}',
        birthdate = '{$_POST['birthdate']}',
        username = '{$_POST['username']}',
        password = '{$_POST['password']}',
        address = '{$_POST['address']}',
        city = '{$_POST['city']}',
        postcode = '{$_POST['postcode']}',
        country = '{$_POST['country']}',
        contactnumber = '{$_POST['contactnumber']}',
        modifieddate = '$dateCreated' 

        WHERE 

        person_id = '$id'";


        
    $result=mysqli_query($conn,$sql);


    if ($result) {
        // $_SESSION["success"] = "Account Updated Successfully!";
        echo "<script>alert('Successfully Updated!')</script>";
        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=customer-update-profile&person_id=<?php echo $_SESSION['person_id'];?>'" /> 
    <?php
    }else{
        echo "<script>alert('Fail to Update!')</script>";
        // $_SESSION["status"] = "Account Update Failed!";
        header("Location:./?page_id=customer-update-profile");
        }   
    }  

  }    
?>
