<?php
error_reporting(0);
require 'adminsession.php';
     $idtoedit =$_GET['room_number'];
     require 'dbconnection.php';
$islocked = 'Available';
require 'dbconnection.php';
$sql = "UPDATE available_room set 
           availability =  '$islocked'
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