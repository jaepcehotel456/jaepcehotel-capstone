<?php
error_reporting(0);
// require 'managersession.php';
     $idtoedit =$_GET['person_id'];
     require 'dbconnection.php';
$islocked = 0;
require 'dbconnection.php';
$sql = "UPDATE person set 
           islocked =  '$islocked'
            WHERE  
            person_id = $idtoedit
     ";

  if ($databaseconnection->query($sql) === TRUE) {
    ?>
    <meta http-equiv="refresh" content="0;URL='./?page_id=m-listOfStaff'" /> 
    <?php
} else {
    echo "<script>alert('Error On Updating')</script>";

}
?>