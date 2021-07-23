<?php 

include('dbconnection.php'); 

if (isset($_GET['transaction_id'])) {
    # code...
                $transaction_id = $_GET['transaction_id'];
        }else{
                $transaction_id = '';
    }

if (isset($_GET['avail_id'])) {
    # code...
                $avail_id = $_GET['avail_id'];
        }else{
                $avail_id = '';
    }

if (isset($_GET['room_id'])) {
    # code...
                $room_id = $_GET['room_id'];
        }else{
                $room_id = '';
    }

if (isset($_GET['person_id'])) {
# code...
            $person_id = $_GET['person_id'];
    }else{
            $person_id = '';
} 

// *limiter for room and counter for room page * Start//

$limit = 1;
 if (isset($_GET['page'])) {
   $page = $_GET['page'];
    $start = ($page - 1) * $limit;
 }else{
  $page=1;
  $start = 0;
 }
// *End for limiter and counter for room page *//

// *START LIMITER FOR PAGE BOOKING HISTORY PAGE *//
$limit_hist = 3;
 if (isset($_GET['page_hist'])) {
   $page_hist = $_GET['page_hist'];
    $start_hist = ($page_hist - 1) * $limit_hist;
 }else{
  $page_hist=1;
  $start_hist = 0;
 }
// *END LIMITER FOR PAGE BOOKING HISTORY PAGE *//

 // *START LIMITER FOR OTHER PAGES*//
 $limit_num = 10;
 if (isset($_GET['page_num'])) {
     $page_num = $_GET['page_num'];
     $start_num = ($page_num - 1) * $limit_num;
 }else{
    $page_num=1;
    $start_num = 0;
 }
 // *END LIMITER FOR OTHER PAGES*//


?>


<!DOCTYPE html>
<html>

<head>
<?php include'header.php'; ?>
</head>


<body>


<?php 
$page_id = (isset($_GET['page_id']) && $_GET['page_id'] != '') ? $_GET['page_id'] : '';
switch ($page_id) {

   
        
    case 'admin-c-guest' :
        include('admin-c-guest.php');
        break; 

        //ADMIN
    case 'admin-room' :
        include('admin-room.php');
        break;
    case 'admin-webpage' :
        include('admin-webpage.php');
        break; 
    case 'admin-lockRoom' :
        include('admin-lockRoom.php');
        break;
    case 'admin-unlockRoom' :
        include('admin-unlockRoom.php');
        break; 

    case 'admin-lockStaff' :
        include('admin-lockStaff.php');
        break;
    case 'admin-unlockStaff' :
        include('admin-unlockStaff.php');
        break; 
    case 'admin-lockManager' :
        include('admin-lockManager.php');
        break;
    case 'admin-unlockManager' :
        include('admin-unlockManager.php');
        break; 

    case 'admin-viewStaffProfile' :
        include('admin-viewStaffProfile.php');
        break;
    case 'admin-viewManagerProfile' :
        include('admin-viewManagerProfile.php');
        break;
    case 'admin-listOfManagers' :
        include('admin-listOfManagers.php');
        break;
    case 'admin-listOfStaff' :
        include('admin-listOfStaff.php');
        break;
    case 'admin-listOfGuest' :
        include('admin-listOfGuest.php');
        break;

    case 'admin-create-room' :
        include('admin-create-room.php');
        break; 

    case 'admin-edit-room' :
        include('admin-edit-room.php');
        break;
     
    case 'admin-view-room-details' :
        include('admin-view-room-details.php');
        break;

    case 'admin-view-room' :
        include('admin-view-room.php');
        break;

    case 'admin-create-room-process' :
        include('admin-create-room-process.php');
        break;
    case 'admin-listavailableroom' :
        include('admin-listavailableroom.php');
        break;
    case 'admin-listoccupiedroom' :
        include('admin-listoccupiedroom.php');
        break;
    case 'admin-dashboard' :
        include('admin-dashboard.php');
        break;
    case 'admin-profile' :
        include('admin-profile.php');
        break;
    case 'admin-updateProfile' :
        include('admin-updateProfile.php');
        break;
    case 'admin-updateProfileProcess' :
        include('admin-updateProfileProcess.php');
        break;
    case 'admin-add-availroom' :
        include('admin-add-availroom.php');
        break;
    case 'admin-viewGuestProfile' :
        include('admin-viewGuestProfile.php');
        break;
    case 'admin-createManager' :
        include('admin-createManager.php');
        break;
    case 'admin-updateManagerProfile' :
        include('admin-updateManagerProfile.php');
        break;
    case 'admin-createStaff' :
        include('admin-createStaff.php');
        break;
    case 'admin-updateStaff' :
        include('admin-updateStaff.php');
        break;    
    case 'admin-updateGuest' :
        include('admin-updateGuest.php');
        break; 
    case 'admin-createGuest' :
        include('admin-createGuest.php');
        break;
    case 'admin-update-availroom' :
        include('admin-update-availroom.php');
        break;   

    case 'admin-transaction' :
        include('admin-transaction.php');
        break;  

    case 'admin-pending-reservation' :
        include('admin-pending-reservation.php');
        break;

    case 'admin-pending-cancel':
          include('admin-pending-cancel.php');
          break;
          
    case 'admin-online-payment':
            include('admin-online-payment.php');
            break;
    case 'admin-online-bookings':
            include('admin-online-bookings.php');
            break;   
    case 'admin-checkout-rooms':
            include('admin-checkout-rooms.php');
            break;
    case 'checkout-rooms':
         include('checkout-rooms.php');
         break;
    case 'admin-data-chart':
         include('admin-data-chart.php');
         break;
    case 'checkin-process':
    include('checkin-process.php');
    break; 



    //MANAGERS
    case 'manager-room' :
        include('manager-room.php');
        break;
    case 'manager-data-chart' :
            include('manager-data-chart.php');
            break;    
    case 'manager-data-table' :
            include('manager-data-table.php');
            break; 
    case 'manager-listavailableroom' :
        include('manager-listavailableroom.php');
        break;    
    case 'manager-dashboard' :
        include('manager-dashboard.php');
        break;
    case 'm-profile' :
        include('m-profile.php');
        break;
    case 'm-updateProfile' :
        include('m-updateProfile.php');
        break;
    case 'm-listOfStaff' :
        include('m-listOfStaff.php');
        break;
    case 'm-viewStaffProfile' :
        include('m-viewStaffProfile.php');
        break;
    case 'm-createstaff' :
        include('m-createstaff.php');
        break;
    case 'm-updateStaff' :
        include('m-updateStaff.php');
        break;
    case 'm-lockStaff' :
        include('m-lockStaff.php');
        break;
    case 'm-unlockStaff' :
        include('m-unlockStaff.php');
        break;
    case 'm-transaction' :
        include('m-transaction.php');
        break;
    case 'm-listOfGuest' :
        include('m-listOfGuest.php');
        break;
    case 'm-viewGuestProfile' :
        include('m-viewGuestProfile.php');
        break;
    case 'm-createGuest' :
        include('m-createGuest.php');
        break;
    case 'm-updateGuest' :
        include('m-updateGuest.php');
        break;
    case 'm-lockGuest' :
        include('m-lockGuest.php');
        break;
    case 'm-unlockGuest' :
        include('m-unlockGuest.php');
        break;
    case 'm-pending-reservation' :
        include('m-pending-reservation.php');
        break;
    case 'm-pending-cancel' :
        include('m-pending-cancel.php');
        break;
    case 'm-online-payment' :
        include('m-online-payment.php');
        break;
    case 'm-online-bookings':
        include('m-online-bookings.php');
        break;
    case 'm-checkout-rooms':
        include('m-checkout-rooms.php');
        break;
    case 'manager-checkout-rooms':
        include('manager-checkout-rooms.php');
        break;
    case 'manager-a-r' :
        include('manager-a-r.php');
        break;
    
    //STAFF
    case 'staff-availableroom' :
        include('staff-availableroom.php');
        break;
    case 'staff-dashboard' :
        include('staff-dashboard.php');
        break;
    case 'staff-a-r' :
        include('staff-a-r.php');
        break;
    case 'staff-listOfGuest' :
        include('staff-listOfGuest.php');
        break;
    case 'staff-createGuest' :
        include('staff-createGuest.php');
        break;
    case 'staff-viewGuest' :
        include('staff-viewGuest.php');
        break;
    case 'staff-updateGuest' :
        include('staff-updateGuest.php');
        break;
    case 'staff-profile' :
        include('staff-profile.php');
        break;
    case 'staff-updateProfile' :
        include('staff-updateProfile.php');
        break;
    case 'staff-transaction' :
        include('staff-transaction.php');
        break;
    case 'staff-pending-reservation' :
        include('staff-pending-reservation.php');
        break;
    case 'staff-pending-cancel' :
        include('staff-pending-cancel.php');
        break;
    case 'staff-online-payment' :
        include('staff-online-payment.php');
        break;
    case 'staff-online-bookings':
        include('staff-online-bookings.php');
        break;
    case 'staff-checkout-rooms':
        include('staff-checkout-rooms.php');
        break;
    case 's-checkout-rooms':
        include('s-checkout-rooms.php');        
            break;

// LOGIN 

    case 'contact' :
        include('contact.php');
        break;
    case 'aboutus' :
        include('aboutus.php');
    break;

    case 'login' :
        include('login.php');
        break;
// CUSTOMER
    case 'customer-booking' :
        include('customer-booking.php');
        break;

    case 'customer-pending' :
        include('customer-pending.php');
        break;

    case 'customer-online-payment' :
        include('customer-online-payment.php');
        break;

    case 'customer-transaction-details' :
        include('customer-transaction-details.php');
        break;

    case 'customer-transaction-details-paid' :
        include('customer-transaction-details-paid.php');
        break;

    case 'customer-dashboard' :
        include('customer-dashboard.php');
        break;    

    case 'customer-print' :
        include('customer-print.php');
        break;
     
    case 'customer-update-profile' :
        include('customer-update-profile.php');
        break;

    case 'customer-booking-history' :
        include('customer-booking-history.php');
        break;

    case 'c-view-room-details' :
        include('c-view-room-details.php');
        break;

    case 'c-online-payment' :
        include('c-online-payment.php');
        break;

    case 'reserve-room' :
        include('reserve-room.php');
        break;                

    case 'register' :
        include('register.php');
        break; 

    // case 'charge':
    //      include('charge.php');
    //     break;
    case 'room' :
        include('room.php');
        break; 

    case 'search-availability' :
    include('search-availability.php');
        break; 

    
    case 'w-available-rooms' :
    include('w-available-rooms.php');
        break;

    case 'w-booking' :
    include('w-booking.php');
        break;

    case 'c-sa' :
    include('c-sa.php');
        break;

    case 'c-available-rooms' :
    include('c-available-rooms.php');
        break;

    case 'c-booking' :
    include('c-booking.php');
        break;

    case 'c-payment' :
    include('c-payment.php');
        break; 

    case 'c-payment-process' :
    include('c-payment-process.php');
        break;

    case 'w-transaction-details' :
    include('w-transaction-details.php');
        break; 
                
    default :
        include('home.php');


                

}
?>











<?php include'footer.php'; ?>

  
<?php include'link_script.php'; ?>
  
</body>
</html>