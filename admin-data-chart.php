<?php include('admin-navbar.php');?>


<section>
	<div class="container">
	    <div id="chart-container">
	        <canvas id="graphCanvas"></canvas>
	    </div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="room-item">
					<div class="ri-text">
						<?php 
							require_once('dbconnection.php');

							$sql = "SELECT year(checkout) AS year, month(checkout) as month,sum(bill) AS total_bills FROM transaction WHERE status = 'CheckOut' AND year(checkout) = YEAR(CURDATE()) GROUP BY year";

							$result = mysqli_query($databaseconnection,$sql);
							foreach ($result as $row) {
							?>	
								<span><strong>Current Total Revenue:</strong> ₱<?php echo number_format($row['total_bills'], 2); ?> <br> <strong>Year :</strong> <?php echo $row['year']; ?></span>

							<?php	
							}
							
						?>
						
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="room-item">
					<div class="ri-text">
						<?php
						require_once('dbconnection.php');

						$sql = "SELECT year(checkout) AS year, month(checkout) as month,sum(bill) AS total_bills FROM transaction WHERE status = 'CheckOut' AND year(checkout) = YEAR(CURDATE()) - 1 GROUP BY year";

						$result = mysqli_query($databaseconnection,$sql);
							foreach ($result as $row1) {
						?>
						<span><strong>Last Years Total Revenue:</strong> ₱<?php echo number_format($row1['total_bills'], 2); ?> <br> <strong>Year :</strong> <?php echo $row1['year']; ?></span>

							<?php	
							}
							
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="room-item">
					<div class="ri-text">
						<span><strong>Increase of Sales From Year</strong> <?php echo $row1['year'];?> to <?php echo $row['year'];?><strong>:</strong><br>
							<?php 

							$total = $row['total_bills'] - $row1['total_bills']; 


							$percentage = 100*$total/$row['total_bills'];

							echo (round($percentage, 2));

						?>%
					</span>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {

                        // $month = data[i].month;
                        // $month_name = date_format($month, "%M");
                        const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
                        const d = new Date(data[i].month);

                        name.push(monthNames[d.getMonth()]);
                        marks.push(data[i].total_bills);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Total Revenue',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>
</section>