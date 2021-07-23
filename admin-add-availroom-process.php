<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "jaepce");


if (isset($_POST['submit'])) {



	$room_name       =    $_POST['room_id'];
	$room_no   = 	$_POST['room_number'];




	$sql="INSERT INTO available_rooms
		(room_id,
		room_number)
		VALUES
		('{$_POST['room_id']}',
		'{$_POST['room_number']}')";



	$result=mysqli_query($conn,$sql);


	if ($result){
        echo "Succesfully add room";
		// echo "<script>alert('Successfully Added Available room')</script>";
		
		
	?>
 	<meta http-equiv="refresh" content="0;URL='./?page_id=admin-listavailableroom'" /> 
	<?php
	}else{
		echo "<script>alert('error')</script>";
	}
}

?>