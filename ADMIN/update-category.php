<?php include('partials/menu.php') ; ?>

<!-- main content section starts -->
<div class="main-content">
       <div class="wrapper">
       <h1>Update Category</h1>

       <br><br>

       <?php 
             // use get method to get the values from the  from manage category page 
             //check whether the id is set
             if(isset($_GET['id']))
             {
               //Get the id and other details 
               //   echo "Getting the data";
               $id=$_GET['id'];
               //create aquery to get all other details
               $sql ="SELECT * FROM table_category WHERE id=$id";

               //EXECUTEN THE QUERY 
               $res =mysqli_query($conn,$sql);

               //count the rows to check whether the id is valid or not
               $count =mysqli_num_rows($res);

               if($count==1)
               {
                //get the data
                  $row =mysqli_fetch_assoc($res);
                  $title =$row['title'];
                  $current_image =$row['image_name'];
                  $featured =$row['featured'];
                  $active =$row['active'];

                

               }
               else
               {
                //when Category is not found the message below is seen on the manage category security future
                $_SESSION['no-category-found'] = "<div class='error'>Category is not found.</div>";
                //redirect to the category with the session message

                header('location:'.SITEURL.'admin/manage-category.php');
               }
             }
             else
             {
                //redirect to the category if the hacker to access the update page will be redirected to the manage admin page
                $_SESSION['no-access'] = "<div class='error'>Authorised Access.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
             }
       ?>
        

       <form action="" method="POST" enctype="multipart/form-data">
       <table class="table-30">
        <tr>
        <td>Title:</td>
        <td>
            <input type="text" name="title" value="<?php echo $title;?>">
        </td>
        </tr>

        <tr>

        <td>Current Image:</td>
        <td>
         
        <?php 
        
        if($current_image !='')
        {
            //display the image
            // echo "were the image";
            ?>
               
               <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px" >
            <?php
        }
        else
        {
              //display message
              echo '<div class="error">Image Not Added.</div>'; 
        }
        ?>
        </td>
        <tr>
        <tr>
        <td>Image Name:</td>
        <td>
            <input type="file" name="image" >
        </td>
        </tr> 
        
        <tr>
                <td>Featured:</td>
                <td>             <!-- The below function eg if($featured=="Yes"){echo "checked";}  calls the selected featured value yes or no  from the manage admin to update admin-->
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes

                    <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                 </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if($active =="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes

                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                 </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Update Category" class="btn-secondary">

                </td>
            </tr>


       </table>
       </form>


         <div class="clearfix"></div>

       </div>
     </div>
     <!-- main content section ends -->
   <?php
   
      if(isset($_POST['submit']))
      {
        //echo "clicked";
        //1.get all the values from our form
        $id =$_POST['id'];
        $title =mysqli_real_escape_string($conn,$_POST['title']);
        $current_image =$_POST['current_image'];
        $featured =$_POST['featured'];
        $active =$_POST['active'];

      //2.update new image if selected
       // checke whether the image is selected or not
        if(isset($_FILES['image']['name']))
        {
            //Get the image details
            $image_name =$_FILES['image']['name'];

            //check whether  the image is availabe or not
            if($image_name !='')
            {
                //image is available
                // Section A  upload the new image

                // to rename our image
    //get the extension of the image (jpg,png,gif,etc) eg " food1.jpg"
    //us explode to break the image name and end will get the last value .jpg 
    $ext = end(explode('.',$image_name));

    //Rename the image  this can also be used to uniquely identified with time
   $image_name ="food_category_".rand(000, 999).'.'.$ext; //eg our food name will be <food_category_ #34.jpg

   


    $source_path =$_FILES['image']['tmp_name'];

    $destination_path ="../images/category/". $image_name;  //concatinate

    //upload the image
    $upload=move_uploaded_file($source_path,$destination_path);

    //check whether the image is uploaded or not
    // if the image is not upload we will stop the procces and redirect with the error message
     if($upload==false)
     {
        //set amessage
        $_SESSION['upload'] = "<div class='error'>Failed to Upload the Image.</div>";  

        // Redire  to add category page
        header('location:'.SITEURL.'admin/manage-category.php');
        
        //stop the proccess
        die();

        // upload end here
     }
          //remove our current image if available
          if($current_image !="")
          {

            $remove_path="../images/category/".$current_image;

            $remove =unlink($remove_path);
            // check whether imag is removed or not
            // if failed to remove the display the mwssage to srop the process
            if($remove==false)
            {
               //failed to remove message
               $_SESSION['failed-remove'] = "<div class='error'>Failed to Remove the  Current  Image.</div>";  
   
           // Redire  to add category page
           header('location:'.SITEURL.'admin/manage-category.php');
           die();// stop the proess
            }
   
            //section B
                   //remove the current image
   
          }
          
            }
            else
            {
                $image_name = $current_image ;  
   
            }

        }
        else
        {
            $image_name = $current_image ;  
        }

      //3. update the database
       $sql2="UPDATE table_category SET 
       title = '$title',
       image_name = '$image_name',
       featured = '$featured',
       active = '$active'
       WHERE id=$id
        ";

        //Execute the Query
        $res2 =mysqli_query($conn,$sql2);

      //3.Redirect to the manage category

      //check whether executed or not
      if($res2==true)
      {
        //category updated
        $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";  

        // Redire  to add category page
        header('location:'.SITEURL.'admin/manage-category.php');
        
      }
      else
      {
          //failed message
          $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";  

        // Redire  to add category page
        header('location:'.SITEURL.'admin/manage-category.php');
        
      }
          
      }

   ?>

<?php include('partials/footer.php') ; ?>
