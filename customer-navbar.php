<?php
session_start();
if($_SESSION['person_type'] != 'guest')
{
    include('dbconnection.php'); 
?>
<meta http-equiv="refresh" content="0;URL='index'" /> 
<?php
session_destroy();
}

$conn         = mysqli_connect("localhost", "root", "", "jaepce");


 $date        = date('Y-m-d H:i:s', strtotime('-2 day'));
 $creatorId          = (int)$_SESSION['person_id'];
 mysqli_query($conn, "DELETE FROM transaction WHERE transaction_date < '$date' AND transaction_type = 'pending'");
?>


    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div>
            <a href="?Pagee_id=room" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li ><a href="?page_id=home">My Reservations</a></li>
                <li><a href="?page_id=contact">Contact</a></li>
                <li><a href="?page_id=about-us">About Us</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (12) 345 67890</li>
            <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="?page_id=index">
                               <!--  <img src="img/logo.png" alt=""> -->
                               <h3 class="text-logo">JAEPCE</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                            
                                     <ul>
                                        <li><a href="?page_id=customer-pending">My Reservations</a></li>
                                        <li><a href="?page_id=contact">Contact</a></li>
                                        <li><a href="?page_id=customer-dashboard">My Profile</a></li>
                                        <li><a href="logout">Log out</a></li>
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="icon_archive_alt" style="font-size:18px;"></span></a>
                                              <ul class="dropdown-menu text-center"></ul>
                                            </li>
                                      </ul>
                                   
                               
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tn-right">
                            <a href="?page_id=room" class="bk-btn mb-2">Booking Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                <script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch-customer",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();
// submit form and get new records
// $('#comment_form').on('submit', function(event){
//  event.preventDefault();
//  if($('#subject').val() != '' && $('#comment').val() != '')
//  {
//   var form_data = $(this).serialize();
//   $.ajax({
//    url:"insert.php",
//    method:"POST",
//    data:form_data,
//    success:function(data)
//    {
//     $('#comment_form')[0].reset();
//     load_unseen_notification();
//    }
//   });
//  }
//  else
//  {
//   alert("Both Fields are Required");
//  }
// });
// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>


         <!-- Modal Here -->

    <!-- add class modal -->
<!-- <div class="modal fade" id="bookNow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book now and enjoy your stay!</h5>
          </div>

      <div class="modal-body">
         <div class="container">
             <form>
              <div class="col-lg-12">
                 
                      <div class="row">

                          <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Check In:</label>
                                     <input type="date" class="form-control">
                                  </div>
                          </div>
                         </div>

                         <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Check Out:</label>
                                     <input type="date" class="form-control">
                                  </div>
                          </div>
                     </div>

                       <div class="row">
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Rooms</label>
                                     <input type="text" class="form-control">
                                  </div>
                          </div>
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Adults</label>
                                     <input type="text" class="form-control">
                                  </div>
                          </div>
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Children</label>
                                     <input type="text" class="form-control">
                                  </div>
                          </div>
                     </div>
                </div>

                 <div class="col-lg-12">
                    <div class="container my-2" style="border:1px solid #dfa974;border-radius: 10px;padding:10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center text-dark">Do you have any promo code?</p>
                        </div>
                        </div>

                         <div class="row">
                               <div class="col-sm-12">
                                  <div class="form-group">
                                       <input type="text" class="form-control w-100" placeholder="Enter Code">
                                   </div>
                              </div>
                         </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-primary">Confirm</button>
                            </div>
                        </div>

                       
                    </div>
               </div>

                 <div class="col-lg-12">
                    <div class="container">
                        

                        <div class="row">
                                <button class="btn btn-primary">Book</button>
                        </div>

                       
                    </div>
               </div>

                 </form>
            </div>
        </div>

</div>

</div>

</div> -->
<!-- end of section modal -->