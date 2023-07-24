
<?php 
//include costants.php for SITEURL 
include('../config/constants.php');
//1.destroy the session
session_destroy(); // unsets $-SESSION['user']  and logout our system

//2.DIRECT TO LOGIN PAGE
header('location:'.SITEURL.'admin/login.php');
?>
