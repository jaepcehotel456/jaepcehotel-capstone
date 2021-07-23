<?php
session_start();
session_destroy();
error_reporting(0);
//echo "<script>alert('YOU ARE NOW LOGGED OUT!')</script>";
?>
<meta http-equiv="refresh" content="0;URL='./?page_id=login'" /> 