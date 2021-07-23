<?php
session_start();

?>
<?php
require 'dbconnection.php';
if(isset($_POST['submit']))  
{
    $idToUpdate = $_POST['room_id'];
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

    $randomfilename = bin2hex(openssl_random_pseudo_bytes(16));

    $image_link = $_FILES['image_link']['tmp_name'];

    if($_FILES['image_link']['error'] != 4){

        $extension = explode("/", $_FILES['image_link']['type']);

        $name=$randomfilename.".".$extension[1];

        $target = "uploads/".$name;

    }

    if ($_FILES['image_link']['error'] != 4 && move_uploaded_file($image_link, $target)) 

    {

      
$creatorId = (int)$_SESSION['person_id'];

    require 'dbconnection.php';

   
    $sql = "UPDATE room SET 
            room_name = '$room_name',
            room_price = '$room_price',
            number_beds = '$number_beds',
            bed_size = '$bed_size',
            capacity = '$capacity',
            floor_number = '$floor_number',
            
            details = '$details',
            services1 = '$services1',
            services2 = '$services2',
            services3 = '$services3',
            services4 = '$services4',
            services5 = '$services5',
            room_photo = '$name'
            WHERE  
            room_id = $idToUpdate
         ";

      if ($databaseconnection->query($sql) === TRUE) {
        echo "<script>alert('Room has been updated.')</script>";

        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=admin-room'" /> 
        <?php
    } else {
        echo "<script>alert('Error On Updating')</script>";

    }

    }else{//no file




    $creatorId = (int)$_SESSION['person_id'];

    require 'dbconnection.php';

   
    $sql = "UPDATE room SET 
            room_name = '$room_name',
            room_price = '$room_price',
            number_beds = '$number_beds',
            bed_size = '$bed_size',
            capacity = '$capacity',
            floor_number = '$floor_number',
            
            details = '$details',
            services1 = '$services1',
            services2 = '$services2',
            services3 = '$services3',
            services4 = '$services4',
            services5 = '$services5'
            WHERE  
            room_id = $idToUpdate
         ";

      if ($databaseconnection->query($sql) === TRUE) {
        echo "<script>alert('Room has been updated.')</script>";

        ?>
        <meta http-equiv="refresh" content="0;URL='./?page_id=admin-room'" /> 
        <?php
    } else {
        echo "<script>alert('Error On Updating')</script>";

    }
}
}
?>




