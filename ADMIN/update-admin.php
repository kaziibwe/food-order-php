<?php include('partials/menu.php') ; ?>

  
     <!-- main content section starts -->
     <div class="main-content">
       <div class="wrapper">
       <h1>Update</h1>

       <br><br>
        
       <?php 
       //1.Get the ID of Selected Admin
       $id = $_GET['id'];

       //2.Create SQL Query to Get the Details
       $sql = "SELECT * FROM table_admin WHERE id=$id";      // id is obtained by GET method fron the  manage admin on delete source code
       //Execute the Query
       $res =mysqli_query($conn, $sql);
       //Check whether the data is available or not
       if($res==true)
       {
        //check whether the data is available or not
        $count = mysqli_num_rows($res);        //Check whether we have admin data or not

        //check whether the query is executed
        if($count==1)    // is the checking mechanism or if the admin is not available it retains u to the manage admin and its prevents the hackers
        {                 // this IF statement is for security
            //Get the Detailes 
           // echo "Admin Available";
            $row=mysqli_fetch_assoc($res);

            $fullname=$row['fullname'];  // we use row not rows bse update one admin is updated at a time
            $username=$row['username'];  // avaliable to save current admin name

        }
        else
        {
            //Redirect to the Admin Page
            header("location:".SITEURL.'admin/manage-admin.php');

        }
       }
       
       ?>
             
          <form action="" method="POST">
            <table class="table-30">

            <tr>
                <td>fullname:</td>
                <td><input type="text" name="fullname" Value="<?php echo $fullname;?>"></td>
            </tr>

            <tr>
                <td>username:</td>
                <td><input type="text" name="username" Value="<?php echo $username;?>"></td>
            </tr>
           
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" >
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">

                </td>
            </tr>
            </table>
              
          </form>
           

       <div class="clearfix"></div>



       </div>
     </div>
     <!-- main content section ends -->
    
     <?php 
       // check whether the submit button is clicked or not
       if(isset($_POST['submit']))
      {
        //echo "Button Clicked";
        //Get the values from form to update
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];   // us the POST method becoz we are passing the value through the form
        $username = $_POST['username'];
        
        // creat the sql query to update admin
        $sql = "UPDATE table_admin SET
        fullname = '$fullname',
        username = '$username'
        WHERE id= '$id'  
        ";        //SET is to set the value that have been changed OR UPDATED
                       //we use WHERE id= 'id'  becoz we want to update only the admin that has been selected 
    
         // EXECUTE the query
         $res = mysqli_query($conn,$sql);

         // check whether the query is executed or not
        if($res==true)
        {
            //Query executed  and admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated sucessfuly.</div>";
            //Redirect to the Manage Admin page
           header("location:".SITEURL.'admin/manage-admin.php');


        }
       else
       {
         //Failed to update admin
         $_SESSION['update'] = "<div class='error'>Failed to Update the Admin.</div>";
         //Redirect to the Manage Admin page
         header("location:".SITEURL.'admin/manage-admin.php');

       }
         
        }            
     ?>


<?php include('partials/footer.php') ; ?>
