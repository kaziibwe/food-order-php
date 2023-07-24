<?php include('partials/menu.php') ; ?>
 <!-- main content section starts -->
 <div class="main-content">
       <div class="wrapper">
       <h1>Change Password</h1>
            
       <br><br>

       <?php  
           if(isset($_GET['id']))   // GETing an id from tha table
           {
            $id=$_GET['id'];
           }

       
       ?>

       <form action="" method="POST">
           <table class="table-30">
        
            <tr>
                <td>Current Password:</td>
                <td><input type="password" name="current_password" placeholder="Current password"></td>
            </tr>

            <tr>
                <td>New Password:</td>
                <td><input type="password" name="new_password" placeholder="New password"></td>
            </tr>

            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password" placeholder="Confirm_password..."></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Change Password" class="btn-secondary">

                </td>
            </tr>
           </table>
       </form>

      

       <div class="clearfix"></div>
 </div>
</div>

<?php 
       //check whether the admin button is clicked or not
       if(isset($_POST['submit']))
    {
        //echo "Button clicked";
         
        //1. get the data from form
         $id=$_POST['id'];
         $current_password=md5($_POST['current_password']);
         $new_password=md5($_POST['new_password']);
         $confirm_password=md5($_POST['confirm_password']);

        //2.check whether the user with current ID and Current Password  Exists or not
          $sql = "SELECT * FROM table_admin WHERE id=$id AND password= '$current_password'"; // id have no quotes bse its an interger but password hase coz its astring

          //Execute the query
          $res =mysqli_query($conn, $sql);

        if($res==true)
        {
            //check whether the data is available or Not
            $count = mysqli_num_rows($res);

              if($count==1)
           {
                 //user exist and Password can be changed
                  // echo "User Found";

                    // check whether the new pasword and confirm password match
                    if($new_password==$confirm_password)
                    {
                        //update the password
                        //  echo "Password Match";
                        $sql2 = "UPDATE table_admin SET
                        password='$new_password'
                        WHERE id=$id
                        ";
                   
                     //executed the Query
                     $res2 =mysqli_query($conn, $sql2);

                     //check whether the Query Execute or not
                     if($res2==true)
                     {
                        // Display the security message
                         // Redirect to the admin with an Success Message
                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                        //Redire the user
                        header("location:".SITEURL.'admin/manage-admin.php');
        
                     }
                     else
                     {
                        // display error message
                            // Redirect to the admin with an error Message
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to change the Password .</div>";
                        //Redire the user
                        header("location:".SITEURL.'admin/manage-admin.php');
           
                     }


                      }
                      else
                      {
                        // Redirect to the admin with an error Message
                        $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not Match.</div>";
                        //Redire the user
                        header("location:".SITEURL.'admin/manage-admin.php');
        
                    }
               }
                else
               {
                //user does not exist SET the message and Redirect
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
                //Redire the user
                header("location:".SITEURL.'admin/manage-admin.php');


            }

        }
         //3.check whether  the new Password and the Current Password match or not

         // 4. update password if all the above is true
    }
       ?>
<?php include('partials/footer.php') ; ?>
