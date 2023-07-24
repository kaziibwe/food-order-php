<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - food order system</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body> 

<section class="container forms">
   <div class="form login">
     <div class="form-content">
         <header>login</header>
    
<div class="logi">
<h1 class="text-cente"></h1>

<br>
<?php 
if(isset($_SESSION['login']))
{
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}

if(isset($_SESSION['no-login-message']))
{
    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
}




?>

<br>

<!--Login form starts here -->
<form action="" method="POST" class="text-center">
            
<div class="field input-field">       

<input type="text" name="username" placeholder="Username"><br><br>
</div>

<div class="field input-field">

<input type="password" name="password" placeholder="Password"><br><br>
</div>

<div class="field feild-button">
<input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
</div>

</form> <br>
            
<!--Login form ends here -->


<P class="text-center">Created by <a href="www.zexa-tech.com">Kaziibwe Alfred</a> </P>
</div>

</div>
</div>
</section>
 



                
               
            </form>
           </div>
        </div>

    </section>


</body>

</html>

<?php

// check whether the submit buton is clicked or not
if(isset($_POST['submit']))
{    
    //procces for login
    //1. get or obtain the data from the login
    //$username =$_POST['username'];
    $username =mysqli_real_escape_string($conn,$_POST['username']);
    //$password = md5($_POST['password']);
    $row_password=md5($_POST['password']);
    $password = mysqli_real_escape_string($conn,$row_password);

    //2.sql to check whether the username and password exit or not
    $sql="SELECT * FROM table_admin WHERE username='$username' AND password='$password'";
    
    //3.execute the query
    $res=mysqli_query($conn,$sql);

    //4.count rows to chech whether the user exist or not
    $count= mysqli_num_rows($res);

    //5.check whether the user is active or not
    if($count==1)
    {
        //user available and login success
        $_SESSION['login'] = "<div class='success'>Login in sucessfuly.</div>";

        // a session to check whether the user is logined in or not 
        $_SESSION['user'] = $username; //To check whether the user is loged in or not and log out will unset it
            //Redirect to the Manage Admin page
           header("location:".SITEURL.'admin/');

    }
    else
    {
        //user not available
        $_SESSION['login'] = "<div class='error text-center'>Username or Password Did not Match.</div>";
        //Redirect to the Manage Admin page
       header("location:".SITEURL.'admin/login.php');


    }
}
?>


