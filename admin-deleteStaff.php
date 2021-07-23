<?php
session_start();
if(isset($_GET['del_id'])){
	deleteStaff();
}


function deleteStaff()
{

    require 'dbconnection.php';
    
	$person_id = mysqli_real_escape_string($databaseconnection, $_GET['del_id']);
	$delete_query = "DELETE FROM person WHERE person_id = '$person_id'";
	$run=mysqli_query($databaseconnection, $delete_query);
	if($run)
	{
        echo "<script>alert('Staff Deleted!')</script>";
        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=admin-listOfStaff'" />
        <?php
	}else{
        echo "Something went wrong!";
        exit();
    }
}
?>