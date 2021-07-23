<?php session_start(); ?>
<?php
if(isset($_POST['submit']))  {
    require 'dbconnection.php';
 $password = $_POST['password'];
 $username = $_POST['username'];
if(mysqli_connect_errno()){
  exit();       
   }
else{
$selectStatement="
SELECT person_id,
person_type,
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
islocked,
createddate

FROM person   
WHERE 
username=? AND password=?";
if($preparedquery=mysqli_prepare($databaseconnection,$selectStatement)) {
mysqli_stmt_bind_param($preparedquery,"ss",$username,$password);
mysqli_stmt_execute($preparedquery);
mysqli_stmt_bind_result(
	$preparedquery,
	$person_id, 
	$person_type,
	$gender,
    
	$fname, 
	$midname,
    $lname, 
    $email,
    $birthdate,
    $person_photo, 
    $username,
	$password,
	$address,
	$city,
	$postcode,
	$country,
	$contactnumber,
    $islocked,
	$createddate); 
            if(mysqli_stmt_fetch($preparedquery)) {
				$_SESSION['person_id']=$person_id; 
				$_SESSION['person_type']=$person_type; 
				$_SESSION['gender']=$gender;
				$_SESSION['fname']=$fname;
				$_SESSION['midname']=$midname;
                $_SESSION['lname']=$lname;
                $_SESSION['email']=$email;    
                $_SESSION['birthdate']=$birthdate; 
                $_SESSION['person_photo']=$person_photo; 
                $_SESSION['username']=$username;
				$_SESSION['password']=$password;
				$_SESSION['address']=$address;
				$_SESSION['city']=$city;
				$_SESSION['postcode']=$postcode;
				$_SESSION['country']=$country;
				$_SESSION['contactnumber']=$contactnumber;
                $_SESSION['islocked']=$islocked;
                $_SESSION['createddate']=$createddate;
                $_SESSION['hassession']=1;
                if($islocked == false)
                {
					switch ($person_type) 
					{
                        case "guest": //echo "<script>alert('WELCOME GUEST!')</script>"; 
                        header("refresh:0;url=./?page_id=customer-dashboard");
					break;

						case "staff": //echo "<script>alert('WELCOME STAFF!!')</script>"; 
						header("refresh:0;url=./?page_id=staff-dashboard");
					break;
                        case "manager":// echo "<script>alert('WELCOME MANAGER!!')</script>"; 
                        header("refresh:0;url=./?page_id=manager-dashboard");
					break;
						case "admin":// echo "<script>alert('WELCOME ADMIN!!')</script>"; 
						header("refresh:0;url=./?page_id=admin-dashboard");
					break;
                   }
				}  
				else {
                echo "<script>alert('Your account is locked. Please contact the administrator.')</script>";
                header("refresh:0;url=./?page_id=login");
            		}
			}

			
			else{
				echo "<script>alert('password is incorrect.')</script>";header("refresh:0;url=./?page_id=login");
			}    
			        
      }      
    }
}
else
{
    header("refresh:0;url=./?page_id=login");
}
              
?>

