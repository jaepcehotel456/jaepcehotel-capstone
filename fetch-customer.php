<?php
include('dbconnection.php');
session_start();

if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
   $id = $_SESSION['person_id'];

   $update_query = "UPDATE transaction SET notif_status = 1 WHERE person_id = $id AND transaction_type != 'pending' AND status = 'Pending'";
   mysqli_query($databaseconnection, $update_query);
}
$query = "SELECT * FROM transaction WHERE person_id = $id AND transaction_type != 'pending' AND update_status = 1 AND status = 'Pending'  ORDER BY transaction_id DESC LIMIT 1";
$result = mysqli_query($databaseconnection, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="?page_id=c-view-room-details&transaction_id='.$row["transaction_id"].'">
  <strong>'.$row["fname"].' ID:'.$row["person_id"].'</strong><br/>
  <small><em>Transaction ID :'.$row["transaction_id"].'</em></small>
  <small><em>Days = '.$row["days"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Notifications</a></li>';
}
$status_query = "SELECT * FROM transaction WHERE person_id = $id AND notif_status= 1 AND transaction_type != 'pending' AND status = 'Pending'";
$result_query = mysqli_query($databaseconnection, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>
