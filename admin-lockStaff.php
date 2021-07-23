<?php
error_reporting(0);
require 'adminsession.php';
     $idtoedit =$_GET['person_id'];
     require 'dbconnection.php';
$islocked = 1;
require 'dbconnection.php';
$sql = "UPDATE person set 
           islocked =  '$islocked'
            WHERE  
            person_id = $idtoedit
     ";

  if ($databaseconnection->query($sql) === TRUE) {
    ?>
    <meta http-equiv="refresh" content="0;URL='./?page_id=admin-listOfStaff'" /> 
    <?php
} else {
    echo "<script>alert('Error On Updating')</script>";

}
?>