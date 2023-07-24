<?php ob_start();?>     
<?php 


include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--important to  make website response-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restuarant Website</title>


    <!-- boosts trap links starts here -->
    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

   <!-- Vendor CSS Files -->
      <!--   <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="assets/vendor/aos/aos.css" rel="stylesheet"> 
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">  
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">   -->

  <!-- Template Main CSS File -->
  <!-- <link href="css/footer.css" rel="stylesheet"> -->

        <!-- boosts trap links ends here -->
<!-- bootsrap starts here -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- bootsrap ends here -->



<!-- links for icons -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> 
<link rel="stylesheet" href="slides.css"> 

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>



    <!--linK to css file-->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/order.css">
    
</head>
<body>

<nav id="nav1" class="menu2">
   <!--Navbar starts from here-->
   <section class="Navbar">
    <div class="container">     <!--container creates boxes-->
       <div class="logo">
        <img src="images/loga.jpg" alt="Restuarant logo" class="imgresponse">
       </div>

  <div class="menu text-right">        <!--multiple classes can be used-->
        <ul>
            <li><a href="<?php echo SITEURL;?>index.php">Home</a></li>
            <li><a href="<?php echo SITEURL;?>categories.php">Categories</a></li>
            <!-- <li><a href="order.php">Order</a></li> -->
            <li><a href="<?php echo SITEURL;?>foods.php">Foods</a></li>
            <li><a href="<?php echo SITEURL;?>contact.php">Contacts</a></li>
        </ul>
       </div>
<div class="clearfix">


</div>

    </div>


</section>
</nav>



 <nav id="nav2">

 
  <input type="checkbox" id="check">
  <label for="check">
    <div class="size">
    <i class="fa fa-bars" aria-hidden="true" id="btn"></i>
    <i class="fa fa-times-circle" aria-hidden="true" id="cancel"></i>
    </div>
  </label>
  <div class="sidebar display2">
    <header>My App</header>
    <ul>
      <!-- <li><a href="#"><i class="fa fa-tachometer" aria-hidden="true">Dashboard</i></a></li>
      <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i>Shortcuts</a></li>
      <li><a href="#"><i class="fa fa-steam-square" aria-hidden="true"></i>Overview</a></li>
      <li><a href="#"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>Events</a></li>
      <li><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>About</a></li>
      <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i>Services</a></li>
      <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Contacts</a></li> -->
      <div class="container">     <!--container creates boxes-->
       <div class="logo">
        <img src="images/loga.jpg" alt="Restuarant logo" class="imgresponse">
       </div>
            <li><a href="<?php echo SITEURL;?>index.php"><i class="fa fa-tachometer" aria-hidden="true">Home</i></a></li>
            <li><a href="<?php echo SITEURL;?>categories.php"><i class="fa fa-link" aria-hidden="true"></i>Categories</a></li>
            <!-- <li><a href="<?//phpecho SITEURL;?>order.php"><i class="fa fa-steam-square" aria-hidden="true"></i>Order</a></a></li>  -->
            <li><a href="<?php echo SITEURL;?>foods.php"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>Food</a></li>
            <li><a href="<?php echo SITEURL; ?>contact.php"><i class="fa fa-envelope-o" aria-hidden="true"></i>Contacts</a></li>

          

    </ul>
  </div>
  </nav> 
      <!-- Navbar ends from here  -->
