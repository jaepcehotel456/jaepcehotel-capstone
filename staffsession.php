<?php
session_start();
if($_SESSION['person_type'] != 'staff')
{
?>
<meta http-equiv="refresh" content="0;URL='index'" /> 
<?php
session_destroy();
}
?>