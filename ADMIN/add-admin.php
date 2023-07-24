<?php include('partials/menu.php'); ?>


     <!-- main content section starts -->
     <div class="main-content">
       <div class="wrapper">
       <h1>Add Admin</h1>
   <br> <br>

     <?php  //echo out admin not added 
      if(isset($_SESSION['add'])) //check whether the session is set 
      {
        echo $_SESSION['add'];      // display session messega
        unset($_SESSION['add']);  // remove session messega
      }
     ?>
       <!-- for POST value will not be displayed on the browser   secure-->
       <!-- for GET value will  be displayed on the browser unsecure-->
       <form action="add-admin.php" method="POST">
           <table class="table-30">
            
           <tr>
                <td>fullname:</td>
                <td><input type="text" name="fullname" placeholder="Enter fullname... "></td>
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Enter username... "></td>
            </tr>

            <tr>
                <td>Password:</td>
                   
                   <td><input type="password" name="password" placeholder="Enter password..."></td>
                
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                </td>
            </tr>
           </table>
       </form>
            
       
        

         <div class="clearfix"></div>



       </div>
     </div>
     <!-- main content section ends -->

     <?php include('partials/footer.php'); ?>


 
<?php
   // process thr Value Form and Save it in Datase
   
   // Checkwhether the submit button is clicked or not 
   
   if(isset($_POST['submit'])) {
    //button clicked
   // echo "Button Clicked" ;


   //get the data from form
   $fullname =mysqli_real_escape_string($conn,$_POST['fullname']) ;
   $username =mysqli_real_escape_string($conn,$_POST['username'] ) ;
   $password =md5($_POST['password']) ;      // md5 is  password encription
   
    
  
 

   
   //SQL query to the data to the database
   $sql = "INSERT INTO table_admin SET   
      fullname ='$fullname',
      username ='$username',
      password ='$password'
    "; 

     //connect to the database
     //$conn = mysqli_connect('localhost','username','password') or die(mysqli_error()) ;
  //$conn = mysqli_connect('127.0.0.1:8080','root','') or die(mysqli_error());

      //$db_select = mysqli_select_db($conn,'food-order') or die(mysqli_error()) ; //select the database

     //excute query and save data in the database
   $res = mysqli_query($conn, $sql) or die(mysqli_error());
  
   //is to check whether the (Query is Executed) data is inserted or not and display appropriate message

  if($res==TRUE)
   {
    //Data Inserted   use session is avaliabe which can display the message on defferent pages
   // echo "Data Inserted";
   // Create a session valiable to display the message
   $_SESSION['add']="Admin Added Successfully";            //concatinating
   // Redirect the page to manage manage admin page
   header("location:".SITEURL.'admin/manage-admin.php');
   }
   else
   {
     //Failed to Enter
     echo "Failed to Inserted";
     // Create a session valiable to display the message
   $_SESSION['add']="Failed to Add Admin";            
   // Redirect the page to add manage admin page
   header("location:".SITEURL.'admin/add-admin.php'); //concatinating  add-admin page with the URL using dot(.SITEURL.)
   }
  }
  ?> 

