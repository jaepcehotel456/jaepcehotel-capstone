<?php
session_start();
if($_SESSION['person_type'] != 'staff')
{
    include('dbconnection.php'); 
?>
<meta http-equiv="refresh" content="0;URL='index'" /> 
<?php
session_destroy();
}
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
            <!-- <i class="icon_search"></i> -->
        </div>
        <div class="header-configure-area">
            <!-- <div class="language-option">
                <img src="img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div> -->
            <a href="#" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li ><a href="?page_id=manager-dashboard">Dashboard</a></li>
                <li><a href="?page_id=m-transaction">Transactions</a></li>
                
                <li><a href="?page_id=m-listOfGuest">Guest List</a></li>
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
            <li><i class="fa fa-envelope"></i> info.jaepcehotel@gmail.com</li>
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
                                        <li ><a href="?page_id=staff-dashboard">Dashboard</a></li>
                                        <li><a href="?page_id=staff-transaction">Transactions</a></li>
                                        
                                        <li><a href="?page_id=staff-listOfGuest">Guest List</a></li>
                                        <!-- <li><a href="m-history.html">History</a></li> -->
                                        <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="icon_archive_alt" style="font-size:18px;"></span></a>
                                              <ul class="dropdown-menu text-center"></ul>
                                        </li>
                                      </ul>

                                    <!--  <ul>
                                        <li><a href="#./rooms.html">My Reservations</a></li>
                                        <li><a href="./contact.html">Contact</a></li>
                                        <li><a href="./login.html">Login</a></li>
                                      </ul> -->
                                   
                               
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
                            <a href="?page_id=staff-profile" class="bk-btn mb-2">Profile</a>
                            <a href="logout" class="bk-btn mb-2">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
      <script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"staff-fetch",
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