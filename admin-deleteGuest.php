<?php
session_start();
if(isset($_GET['del_id'])){
	deleteGuest();
}


function deleteGuest()
{

    require 'dbconnection.php';
    
	$person_id = mysqli_real_escape_string($databaseconnection, $_GET['del_id']);
	$delete_query = "DELETE FROM person WHERE person_id = '$person_id'";
	$run=mysqli_query($databaseconnection, $delete_query);
	if($run)
	{
        echo "<script>alert('Guest Deleted!')</script>";
        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=admin-listOfGuest'" />
        <?php
	}else{
        echo "Something went wrong!";
        exit();
    }
}
?>