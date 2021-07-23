<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "jaepce");

$transaction_id = $_REQUEST['transaction_id'];

if (isset($_REQUEST['transaction_id'])) {

$sql="DELETE FROM transaction WHERE transaction_id='$transaction_id'";

 $result=mysqli_query($conn,$sql);

header("location: ./?page_id=staff-pending-reservation");

}


?>