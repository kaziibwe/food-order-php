<?php include('partials/menu.php'); ?>

<!-- main content section starts -->
<div class="main-content">
       <div class="wrapper">
       <h1>Manage Category</h1>

       <br><br>

       <?php
       if(isset($_SESSION['add-cat']))
       {
        echo $_SESSION['add-cat'];
        unset( $_SESSION['add-cat']);
       }

       if(isset($_SESSION['remove']))
       {
        echo $_SESSION['remove'];
        unset( $_SESSION['remove']);
       }
        
       if(isset($_SESSION['delete-cat']))
       {
        echo $_SESSION['delete-cat'];
        unset( $_SESSION['delete-cat']);
       }

       if(isset($_SESSION['no-access']))
       {
        echo $_SESSION['no-access'];
        unset( $_SESSION['no-access']);
       }

       if(isset($_SESSION['no-category-found']))
       {
        echo $_SESSION['no-category-found'];
        unset( $_SESSION['no-category-found']);
       }
        
       if(isset($_SESSION['update']))
       {
        echo $_SESSION['update'];
        unset( $_SESSION['update']);
       }

       if(isset($_SESSION['upload']))
       {
        echo $_SESSION['upload'];
        unset( $_SESSION['upload']);
       }
      
       if(isset($_SESSION[' failed-remove']))
       {
        echo $_SESSION[' failed-remove'];
        unset( $_SESSION[' failed-remove']);
       }
       ?>
       <br><br>

<!-- button to add Admin starts-->
<a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add Category</a>
<!-- button to add Admin ends-->
<br> <br><br>


 <table class="table-full">
    <tr>
     <th>S.N.</th>
     <th>Title</th>
     <th>Image</th>
     <th>Featured</th>
     <th>Active</th>
     <th>Actions</th>

    </tr>

    <?php 
    
    //Query to get all Category from Database
     $Sql = "SELECT * FROM table_category";

     //Execute Query
     $res =mysqli_query($conn,$Sql);

     //count rows
     $count = mysqli_num_rows($res);

     //creat serial numbers SN valiabe and assign value to one
     $sn=1;


     // check whether we have the data in the database or not
     if($count>0)
     {
        //we have data in the database
        //get the data data and display
        while($row=mysqli_fetch_assoc($res))
        {
          $id = $row['id'];
          $title = $row['title'];
          $image_name = $row['image_name'];
          $featured = $row['featured'];
          $active = $row['active'];

          ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>

                    <td>
                      <?php 
                          //check whether the image name is available or not
                          if($image_name!='')
                          {
                            //display the image
                            ?>

                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="150px" >

                            <?php

                          }
                          else
                          {
                            // desplay the message
                            echo '<div class="error">Image Not Added</div>';
                          }
                      ?>
                    </td>

                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>

                     <td>                                                        <!-- the id below is obtained from while above ang is a get method -->
                     <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                     <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Category</a>
                     </td>
                 </tr>

          <?php

        }

     }
     else
     {
        //we do not have data
        //we will display the message
           ?>

       <tr>
        <td colspan="6"><div class="error">No Category Added.</div></td>
       </tr> 

       <?php

     }

    ?>

   
    
  

 </table>
  
         
        

         <div class="clearfix"></div>



       </div>
     </div>
     <!-- main content section ends -->


<?php include('partials/footer.php'); ?>