<?php include('navbar.php'); ?>
<?php session_start(); ?>

<div class="breadcrumb-section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb-text">
<h2>Our Rooms</h2>
<div class="bt-option">
<a href="./?page_id=home">Home</a>
<span>Rooms</span>
</div>
</div>
</div>
</div>
</div>
</div>


<section class="rooms-section spad">
                
<div class="container">
                
    <div class="row">
    <?php   
                $sql = "SELECT * FROM room  WHERE room_islocked = 0 ";
                $result = $databaseconnection->query($sql);
                if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) { 
                $date=date_create($row['modifieddate']);
                ?>
        <div class="col-lg-4">
        
            <div class="room-item">
        
                <img src="uploads/<?php echo $row['room_photo'] ?>" height="300px" alt="">
            <div class="ri-text">
                <h4><?php echo ucfirst($row['room_name']) ?></h4>
                <h3><?php echo number_format($row['room_price'])?>.00<span>/ Per night</span></h3>
                <table>
                <tbody>
                <tr>
                <td class="r-o">Bed Size:</td>
                <td><?php echo ucfirst($row['bed_size']) ?></td>
                </tr>
                <tr>
                <td class="r-o">Capacity:</td>
                <td><?php echo ucfirst($row['capacity']) ?></td>
                </tr>
                <tr>
                <td class="r-o">No. Beds:</td>
                <td><?php echo ucfirst($row['number_beds']) ?></td>
                </tr>
                <tr>
                <td class="r-o">Floor No.</td>
                <td><?php echo ucfirst($row['floor_number']) ?></td>
                </tr>
                <tr>
                <td class="r-o">Services</td>
                <td><?php echo ucfirst($row['services1']) ?>, <?php echo ucfirst($row['services2']) ?>, <?php echo ucfirst($row['services3']) ?>, <?php echo ucfirst($row['services4']) ?>, <?php echo ucfirst($row['services5']) ?></td>
                </tr>
                </tbody>
                </table>
                <?php
                if ($_SESSION['person_type'] == '') {
                ?>
                    
                    
                    <a href="./?page_id=search-availability&room_id=<?php echo $row['room_id']; ?>" class="primary-btn">Check Availability</a>


                <?php
                }else if ($_SESSION['person_type'] == 'guest') {
                    ?>
                    <a href="./?page_id=c-sa&room_id=<?php echo $row['room_id']; ?>" class="primary-btn">Check Availability</a>
                <?php
                }
                ?>
               <!--  <a href="#" class="primary-btn">More Details</a> -->
            </div>

        </div>

    </div>

<?php 
            }}
            ?> 

</div>
</div>


</section>
