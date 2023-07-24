<?php ob_start();?>      

<?php 
include('../config/constants.php');
include('login-check.php');


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food-order Website</title>
    <link rel="stylesheet" href="../CSS/admin.css">


    <!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"
     integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
     crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
     <link rel="stylesheet" href="../css/deposit.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->


</head>
<body>

     <!-- menu section starts -->
     <div class="menu">
       <div class="wrapper text-center ">
       <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="manage-admin.php">Admin</a></li>
            <li><a href="manage-category.php">Category</a></li>
            <li><a href="manage-food.php">Food</a></li>
            <li><a href="manage-order.php">Order</a></li>

            <!-- <li><a href="manage-messages.php">Messages</a></li> -->
            <li><a href="logout.php">Logout</a></li>

        </ul>
       </div>
     </div>
     <!-- menu section ends -->