<?php //DtransactionsRY partern Dont Reapet Yourself
//start the section
session_start();



// create costants ti store Non repeating valiables  constant in Upper case  valiables in low case
define('SITEURL','http://localhost/food-order/');   //HOME URL or SITEURL
define('LOCALHOST','127.0.0.1:8080');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','');
define('DB_NAME' ,'food-order');

 $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());

$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()) ; //select the database


?>