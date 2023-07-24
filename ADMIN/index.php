
 
    <?php include('partials/menu.php'); ?>

     <!-- main content section starts -->
     <div class="main-content">
       <div class="wrapper">
        <h1> Dashboard</h1>

        <div class="move-image2"></div>

<br><br>
        <?php 
       if(isset($_SESSION['login']))
         {
             echo $_SESSION['login'];
             unset($_SESSION['login']);

 
            //Query to get all admin
            // $sql5 = "SELECT * FROM table_admin ";
            // // Execute the Query
            // $res5 = mysqli_query($conn,$sql5);
            // //Checkn whether the Query is excuted or Not
            // $row5=mysqli_fetch_assoc($res5);

            // $username =$row5['username'];
          //   ?>
            <p>  <strong><?// echo $username;?></strong></p> 
            <?php


         }
         
         ?>
            
         <br><br>
         <div class="col-4 text-center">
            <?php 
               // sql query
              $sql ="SELECT * FROM table_category ";

              //Execute rows
               $res = mysqli_query($conn,$sql);
               //count rows
               $count = mysqli_num_rows($res);

            ?>

           <h1 style="color:green"><?php echo $count;?></h1>
           <br>
           <b style="color:brown">Category</b>
         </div>

         <div class="col-4 text-center">
         <?php 
               // sql query
              $sql2 ="SELECT * FROM table_food ";

              //Execute rows
               $res2 = mysqli_query($conn,$sql2);
               //count rows
               $count2 = mysqli_num_rows($res2);
            ?>

           <h1 style="color:brown"><?php echo $count2;?></h1>
           <br >
            <b style="color:green">Foods</b>
         </div>



         <div class="col-4 text-center">

         <?php 
               // sql query
              $sql3 ="SELECT * FROM table_order ";

              //Execute rows
               $res3 = mysqli_query($conn,$sql3);
               //count rows
               $count3 = mysqli_num_rows($res3);
            ?>

           <h1 style="color:green"><?php echo $count3;?></h1>
           <br>
           <b style="color:brown">Total Order</b>
           
         </div>



         <div class="col-4 text-center">

           <?php
           
             //create the sql  Query to Get Total Generated
             //Aggregated function in sql
             $sql4 ="SELECT SUM(total) AS Total FROM table_order WHERE status='deliverd' ";
       
             //Execute rows
             $res4 = mysqli_query($conn,$sql4);

             //Get the values
             $row4 = mysqli_fetch_assoc($res4);

             //Get the total revenue
             $total_revenue = $row4['Total'];

           ?>
           <h1 style="color:brown">$<?php echo $total_revenue;?></h1>
           <br>
           <b style="color:green"> Revenue Generated</b>
           
              </div>       

         <div class="clearfix"></div>
       
         

       </div>
     </div>
     <!-- main content section ends -->

     <?php include('partials/footer.php'); ?>