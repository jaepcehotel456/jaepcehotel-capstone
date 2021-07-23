<?php
error_reporting(0);
require 'adminsession.php';
     $idtoedit =$_GET['room_id'];
     require 'dbconnection.php';
$islocked = 0;
require 'dbconnection.php';
$sql = "UPDATE room set 
           room_islocked =  '$islocked'
            WHERE  
            room_id = $idtoedit
     ";

  if ($databaseconnection->query($sql) === TRUE) {
    ?>
    <meta http-equiv="refresh" content="0;URL='./?page_id=admin-room'" /> 
    <?php
} else {
    echo "<script>alert('Error On Updating')</script>";

}
?>