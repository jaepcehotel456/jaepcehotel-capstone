<?php
session_start(); 

if (isset($_POST['submit'])){

$roomStatus = 1;
$room_name = $_POST['room_name'];
$number_beds = $_POST['number_beds'];
$bed_size = $_POST['bed_size'];
$capacity = $_POST['capacity'];
$floor_number = $_POST['floor_number'];
$room_price = $_POST['room_price'];
$details = $_POST['details'];
$services1 = $_POST['services1'];
$services2 = $_POST['services2'];
$services3 = $_POST['services3'];
$services4 = $_POST['services4'];
$services5 = $_POST['services5'];

$creatorId = (int)$_SESSION['person_id'];
$creatorName = $_SESSION['fname'];
$islocked = 0;



require 'dbconnection.php';

$randomfilename = bin2hex(openssl_random_pseudo_bytes(16));
$image_link = $_FILES['image_link']['tmp_name'];
$extension = explode("/", $_FILES['image_link']['type']);
$name=$randomfilename.".".$extension[1];
$target = "uploads/".$name;

$dateCreated = date('Y-m-d H:i:s');


if (move_uploaded_file($image_link, $target)) 
{
$valuetoreturn = mysqli_query(
    $databaseconnection,
    "INSERT INTO room
    (
    room_status, 
    room_name, room_price,
    number_beds, 
    bed_size, 
    capacity,
    floor_number,
    
    details,
    services1,
    services2,
    services3,
    services4,
    services5,

    room_photo,
    room_islocked,
    
    createdby,
    modifiedby,
    createddate,
    modifieddate,
    person_id
    )

    VALUES
    (
    '".$roomStatus."', 
    '".$room_name."', 
    '".$room_price."',
    '".$number_beds."', 
    '".$bed_size."', 
    '".$capacity."', 
    '".$floor_number."', 
     
    '".$details."', 
    '".$services1."', 
    '".$services2."', 
    '".$services3."', 
    '".$services4."', 
    '".$services5."', 
    
    '".$name."',
    '".$islocked."',

    '".$creatorName."',
    '".$creatorName."',

    '".$dateCreated."', 
    '".$dateCreated."',

    '".$creatorId."'
    
    )
    ");

 //echo "<script>alert('Successfully Created A Room!')</script>";
 ?>
 <meta http-equiv="refresh" content="0;URL='./?page_id=admin-room'" />
 <?php
}
}



?>