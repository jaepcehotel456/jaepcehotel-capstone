<?php
include('dbconnection.php');


if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
   $update_query = "UPDATE transaction SET update_status = 1 WHERE update_status=0";
   mysqli_query($databaseconnection, $update_query);
}
$query = "SELECT * FROM transaction ORDER BY transaction_id DESC LIMIT 1";
$result = mysqli_query($databaseconnection, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="?page_id=staff-pending-reservation">
  <strong>'.$row["fname"].' ID:'.$row["person_id"].'</strong><br />
  <small><em>Transaction ID :'.$row["transaction_id"].'</em></small>
  <small><em>Days = '.$row["days"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM transaction WHERE update_status=0";
$result_query = mysqli_query($databaseconnection, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>
