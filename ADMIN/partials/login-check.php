<?php 
 //Authorization - Accesss Control

 //check whether the user is logged in or not
 if(!isset($_SESSION['user']))  // if u try to access the admin dashbord u will be directed to the login page (u have to be authorised) or if user  session is not check
 {                           
    //user is logged out
    //Redirect to the login page with the message
    $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
    //Redirect  to  login page
    header("location:".SITEURL.'admin/login.php');
    
 }
?>