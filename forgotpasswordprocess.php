<?php


require 'dbconnection.php';
if(isset($_POST['password']))
{
    $password = $_POST['password'];
    $personid = $_POST['personid'];
    $sqlquery = "SELECT * FROM person WHERE person_id = '$personid'";
    $sqlquerytoinsert = "UPDATE person SET password = '$password',guid =  null WHERE person_id = '$personid'";
    $executeQueryInsert = mysqli_query($databaseconnection,$sqlquerytoinsert);
    echo "<script>alert('Password has been changed successfully!')</script>"; 
    ?>
    <meta http-equiv="refresh" content="0;URL='login'" /> 
   <?php
}
 


?>