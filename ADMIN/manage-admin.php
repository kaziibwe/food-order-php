 <?php include('partials/menu.php') ; ?>
    

     <!-- main content section starts -->
     <div class="main-content">
       <div class="wrapper">
       <h1>Manage Admin</h1>
            
       <br><br>
       <?php     // echo out admin added
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];     //adding the  Session Message
            unset($_SESSION['add']);  //Removing Session Message
        }
        if(isset($_SESSION['delete']))
         {
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);

         }

         if(isset($_SESSION['update']))
         {
          echo $_SESSION['update'];
          unset($_SESSION['update']);

         }

         if(isset($_SESSION['user-not-found']))
         {
          echo $_SESSION['user-not-found'];
          unset($_SESSION['user-not-found']);

         }
     
         if(isset($_SESSION['pwd-not-match']))
         {
          echo $_SESSION['pwd-not-match'];
          unset($_SESSION['pwd-not-match']);

         }

         if(isset($_SESSION['change-pwd']))
         {
          echo $_SESSION['change-pwd'];
          unset($_SESSION['change-pwd']);

         }

        

       ?>
       <br><br>

       <!-- button to add Admin starts-->
       <a href="<?php echo SITEURL;?>admin/add-admin.php" class="btn-primary">Add Admin</a>
       <!-- button to add Admin ends-->
     <br> <br><br>


        <table class="table-full">
           <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
           </tr>
               
           <?php
           //Query to get all admin
              $sql = "SELECT * FROM table_admin ";
              // Execute the Query
              $res = mysqli_query($conn,$sql);
              //Checkn whether the Query is excuted or Not
              if($res== TRUE)         
              {
                //Count Rows to Check whether we have data in the database or Not
                $count = mysqli_num_rows($res); // Function to get all the rows in the database 

                $sn=1; //creat the valueable and assign to the value(1) . it dispalys the id increamenting way (1 2 3 4 5) not the same the are in the database
                
                //check the the num of rows
                if($count>0)
                {
                  //we have data in the database
                     while($rows= mysqli_fetch_assoc($res)) 
                     {
                      // using While loop to get data in the database

                      //Get individial data
                      $id=$rows['id'];
                      $fullname=$rows['fullname'];   //we use rows
                      $username=$rows['username'];

                      //display the values in the table
                      ?>
                      <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $fullname; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a><!--GET  method-->
                         <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a><!--GET  method-->
                         <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a> <!--GET  method is used in url   but in the form we u the PIST method-->
                        </td>                             
                                                            
                     </tr>
                      <?php
                    
                     }
                }
                else
                {
                  //we Dont have data in the database
                  echo "No data in the  database";
                }
              }
           ?>
        

        </table>
         
        

         <div class="clearfix"></div>
         
         <div class="move-image1"></div>


       </div>
     </div>
     <!-- main content section ends -->

     <?php include('partials/footer.php') ; ?>



    


