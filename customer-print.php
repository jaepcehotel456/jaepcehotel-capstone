
<?php include('customer-navbar.php'); ?>
<?php

	$conn = mysqli_connect("localhost", "root", "", "jaepce");

	 $confirmation = $_REQUEST['confirmation'];
    // $sql="SELECT * FROM transaction WHERE room_no = '$id'";

     $sql="SELECT * FROM transaction INNER JOIN room ON transaction.room_id=room.room_id  WHERE transaction.confirmation = '$confirmation'";

    $result= mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($result);

?>

         <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text text-left">
                            <h2 class="text-white">Reservation Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
<section class="mb-5">
	<div class="container mt-5" style="border: solid 1px;">
		<form action="" method="POST" name="">
			<span id="printout">
				<fieldset >
				<legend><h2>Reservation Details</h2></legend>
				<p>
					<br/><br/>
					<?php echo $data['gender']; ?> <?php echo $data['fname']; ?> <?php echo $data['midname']; ?>. <?php echo $data['lname']; ?> <br/>
					<?php echo $data['email']; ?><br /><br /><br />
					Dear <?php echo $data['gender']; ?> <?php echo $data['lname']; ?>,<br /><br />
					Greetings from JAEPCE Hotel and Resort!<br /><br />
					Please check the details of your reservation:<br /><br />
					<strong>GUEST NAME(S):</strong> <?php echo $data['fname']; ?> <?php echo $data['midname']; ?>. <?php echo $data['lname']; ?>


					
				</p>
				<table style="border: solid 1px;">
					<thead>
						<tr  bgcolor="#999999">
							<th align="center" width="120">Room Type</th>
			                <th align="center" width="120">Check In</th>
			                <th align="center" width="120">Check Out</th>
			                <th align="center" width="120">Nights</th>
			              	<!-- <th  width="120">Price</th> -->
			                <th align="center" width="150">Transaction Type</th>
							<th align="center" width="150">Payment Method</th>
			              	<th align="center" width="120">Room Price</th>
			              	<th align="center" width="120">Transaction Date</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $data['room_name'];?></td>
							<td><?php echo $data['checkin'];?></td>
							<td><?php echo $data['checkout'];?></td>
							<td><?php echo $data['days'];?></td>
							<td><?php echo $data['transaction_type'];?></td>
							<td><?php echo $data['payment_method'];?></td>
							<td>₱<?php echo $data['room_price'];?></td>
							<td><?php echo $data['transaction_date'];?></td>


						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td align="left"><h5><b>TOTAL AMOUNT: </b></h5>
							<td align="left">
								<h5><b>₱ <?php echo $data['bill'];?></b></h5>
							</td>
						</tr>
					</tfoot>



				</table>

					<p class="mt-2">We are eagerly anticipating your arrival and would like to advise you of the following in order to help you with your trip planning. Your reservation number is <b><?php echo $data['confirmation'];?>:</b><br/><br/>

					<?php

					if ($data['transaction_type'] == "paid" && $data['payment_method'] == "credit card") {
					?>
					
						Your transaction ID is <b><?php echo $data['tid'];?>
					<?php
					}else{

					}
					?>
						


						</b><br/ >Should there be a concern with your reservation, a customer service representative will contact you. Otherwise, consider your reservation confirmed.</p>
					<ul class="ml-3">
					 <li>Function Room rate is Php 500.00 for first four hours and Php 100.00 for each succeeding hours.</li>
					 <li>No pets allowed.</li>
					 <li>Outside foods are allowed inside the guest house.</li>
					 <li>Check in time is 1pm and Check out time is 12 noon.</li>
					 <li>Guest arriving before 1 pm shall be accommodated if rooms are vacant and ready.</li>
					 <li>Free WIFI access.</li>
					 <li>Room rates inclusive of government tax and service charge.</li>
					 <li>Rates are subject to change without prior notice.</li>
					 <li>Cancellation notification must be made at least 10 days prior to arrival for refund of deposits. Cancellation received within the 10 days period will result to forfeiture of full deposits.</li>
					 <li>We serve Breakfast, Lunch and Dinner upon request with 2 hours notice.</li><br>
					<strong>I have agreed that I will present the following documents upon check in:</strong><br/>
					 <li>Copy of BDO Payment.</li>
					 <li>Authorization letter issued by BDO payer for guest/s whose transactions were paid for in his/ her behalf.</li>
					 </ul>
					If you have any questions, please email at jaepce.com or call (000-0000-0000)
					<br/><br/>
					Thank you for choosing JAEPCE Hotel and Resort
					<br/><br/>
					Respectfully your,<br/><br/>
					JAEPCE Hotel and Resort
					<br/><br/><br/>



			</span>
			<div class="mb-3 mt-5" id="divButtons" name="divButtons">
				<input type="button" value="Print" onclick="tablePrint();" class="btn btn-primary">
				<a href="./?page_id=customer-dashboard" class="btn btn-primary">Back</a>
			</div>
		</div>
		</form>
	</div>
</section>
<hr>

<?php

if ($data['transaction_type'] == "reserve") {
?>
<section  class="mb-3">
	<div class="container" style="border: solid 1px;">
		<a href="./?page_id=customer-online-payment&confirmation=<?php echo $confirmation?>">
			<img src="img/creditcardicons.png" ><b>YOU CAN PAY ONLINE NOW!</b>
			
		</a>
	</div>
</section>
<?php
}else{

}
?>

<hr>
 <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false;  
    } 
  $(document).ready(function() {
    oTable = jQuery('#list').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers"
    } );
  });   
</script>