<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "jaepce");

$transaction_id = $_POST['transaction_id'];

if (isset($_POST['transaction_id'])) 
{

	$sql="SELECT * FROM transaction INNER JOIN room ON transaction.room_id=room.room_id WHERE transaction.transaction_id = '$transaction_id'";

    $result= mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);

    echo json_encode($row);

  	
}


// echo $_POST['room_id'];
?>



<!-- 			                                     	<select name="room_no" id="room_id" required>
			                                     		
                                                            <option selected="true" disabled="disabled">Please select room number...</option>
                                                                    <?php

                                                                     	$room_id = $row['room_id'];
                                                                      
                                                                        $sql="SELECT * FROM available_rooms INNER JOIN room ON available_rooms.room_id=room.room_id WHERE available_rooms.availability = 'Available' AND available_rooms.room_id = '$room_id'";

                                                                        $result= mysqli_query($databaseconnection,$sql);
                                                                        while ($data = $result->fetch_assoc()) {

                                                                    ?>
                                                                    <option value="<?php echo $data['room_number']; ?>"><?php echo $data['room_number']; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                    </select> -->