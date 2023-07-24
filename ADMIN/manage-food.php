<?php include('partials/menu.php'); ?>

<!-- main content section starts -->
<div class="main-content">
       <div class="wrapper">
       <h1>Manage Food</h1>

       <br><br>
       <?php
       
       if(isset($_SESSION['add']))
       {
        echo $_SESSION['add'];
        unset( $_SESSION['add']);
       }

       if(isset($_SESSION['unauthorized']))
       {
        echo $_SESSION['unauthorized'];
        unset( $_SESSION['unauthorized']);
       }

       if(isset($_SESSION['fail-remove-image']))
       {
        echo $_SESSION['fail-remove-image'];
        unset( $_SESSION['fail-remove-image']);
       }

       if(isset($_SESSION['del-food']))
       {
        echo $_SESSION['del-food'];
        unset( $_SESSION['del-food']);

       }

        
       if(isset($_SESSION['upload']))
       {
        echo $_SESSION['upload'];
        unset( $_SESSION['upload']);
       }
      
        
       if(isset($_SESSION['remove-failed']))
       {
        echo $_SESSION['remove-failed'];
        unset( $_SESSION['remove-failed']);
       }
       

       if(isset($_SESSION['up-date']))
       {
        echo $_SESSION['up-date'];
        unset( $_SESSION['up-date']);
       }
       ?>
        
       <br><br>

<!-- button to add Admin starts-->
<a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add Food</a>

<!-- button to add Admin ends-->
<br> <br><br>


 <table class="table-full">
    <tr>
     <th>S.N.</th>
     <th>Title</th>
     <th>Price</th>
     <th>image</th>
     <th>featured</th>
     <th>Active</th>
     <th>Actions</th>
    </tr>

    <tr>

    <?php 
         // creat the query to Get all the food
         $sql ="SELECT * FROM table_food";

         //creat the Query 
         $res = mysqli_query($conn,$sql);

         //count the rows to check whether we have the food
         $count =mysqli_num_rows($res);

         //create serial number valuable and is set as one
         $sn=1;  //always out side the loop

         if($count>0)
         {
          // We have food in the database
          //Get the food from database and display
             while($row=mysqli_fetch_assoc($res))
             {
              $id =  $row['id'];
              $title = $row['title'];
              $price = $row['price'];
              $image_name = $row['image_name'];
              $featured = $row['featured'];
              $active = $row['active'];

              ?>
          <tr>
             <td><?php echo $sn++;?>.</td>  <!-- we use SN not ID-->
             <td><?php echo $title;?></td>
             <td><?php echo $price;?></td>
             <td>
             <?php 
                          //check whether the image name is available or not
                          if($image_name =='')  /// use this or check in the manage category to use defferent way
                          {

                           // desplay the message
                            echo '<div class="error">Image Not Added</div>';
                           
                          }
                          else
                          {
                             //display the image
                             ?>

                             <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="150px" >
 
                             <?php
 
                          }
                      ?>
             </td>
             <td><?php echo $featured;?></td>
              <td><?php echo $active;?></td>
              
               <td>
                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
               </td>
            </tr>
                   
              <?php

             }

         }
         else
         {
          //food not added in the database
          echo "<tr><td colspan=7 class='error'></td></tr>";  

         }

    ?>
    
  
    
   

 </table>
  
         
        

         <div class="clearfix"></div>



       </div>
     </div>
     <!-- main content section ends -->



     
 

<?php include('partials/footer.php'); ?>