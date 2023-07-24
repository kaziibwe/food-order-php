
<?php include('partials/menu.php'); ?>

<?php 
  
    // use get method to get the values from the  from manage category page 
    //check whether the id is set
    if(isset($_GET['id']))
    {
      //Get the id and other details 
      //   echo "Getting the data";
      $id=$_GET['id'];
      //execute the query to get the  selected food
      $sql2 ="SELECT * FROM table_food WHERE id=$id";

      //EXECUTEN THE QUERY 
      $res2 =mysqli_query($conn,$sql2);


     

      
       
              /// Get the value based on the query executed
          $row2=mysqli_fetch_assoc($res2);

          //get the individual value of the selected food
          $title =$row2['title'];
          $description =$row2['description'];
          $price =$row2['price'];
          $current_image =$row2['image_name'];
          $current_category =$row2['category_id'];
          $featured =$row2['featured'];
          $active =$row2['active'];
       
      
    }
    else
    {
       //redirect to the category if the hacker to access the update page will be redirected to the manage admin page
       $_SESSION['no-access'] = "<div class='error'>Authorised Access.</div>";
       header('location:'.SITEURL.'admin/manage-food.php');
    }
?>



<!-- main content section starts -->
<div class="main-content">
     <div class="wrapper">
     <h1>Update Food</h1>

     <br><br>

     
    

     
     <form action="" method="POST" enctype="multipart/form-data"> <!-- enctype property will all us to upload the image-->
         <table class="table-30">
          
         <tr>
              <td>Title:</td>
              <td><input type="text" name="title" value="<?php echo $title;?>" ></td>
          </tr>
              
          <tr>
              <td>Description:</td>
              <td>
                  <textarea name="description"  cols="30" rows="5" ><?php echo $description;?></textarea>
              </td>
          </tr>

          <tr>
              <td>Price:</td>
              <td><input type="number" name="price" value="<?php echo $price;?>" ></td>
          </tr>

          <tr> 
              <td>Current Image:</td>
              
             <td>
             <?php 
      
            if($current_image =='')
               {
                    //display message
                    echo '<div class="error">Image Not Added.</div>'; 
                
                }
                 else
                 {
                   //display the image
                 // echo "were the image";
                     ?>
             
                      <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px" alt="<?php echo $title; ?>">
                    <?php  
                   }
                   ?>
             </td>
           </tr>
              
           <tr> 
              <td>Select New Image:</td>
              <td>
              <input type="file" name="image">
              </td>
           </tr>


           <tr>
           <td>Category:</td>
              <td>
                  <select name="category" >
                      <?php 
                      
                      //1. creat sql to get all active categorys from the database
                      $sql = "SELECT * FROM table_category WHERE active='Yes' ";

                        // Execute the query
                        $res= mysqli_query($conn,$sql);

                        //count the rows to check whether we have categories or not
                      $count =mysqli_num_rows($res);

                       //if count is greater than zero ,we have categories else we donot have categories
               
                       if($count>0)
                       {
                           //we have categories
                           // sinse we have categories in the database and they are many were to use the while loop
                           while($row=mysqli_fetch_assoc($res))
                           {
                               //get the details of the category
                               $category_title =$row['title'];
                               $category_id =$row['id'];
                               
                             //echo "<option value="  $category_id"> $category_title</option> ";
                             //the reason of removing the above method is to add if in our function and inside echo u cannot use if  
                             ?>

                             <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>

                             <?php
                           } 
                          }
                       else
                       {
                         //  we dont have categories
                          
                            echo "<option value='0'>Category Not Available</option> "; // if u want an alternative check out the add category 


                          
                       }


                      
                      ?>
                      <option value="0">Test Category</option>
                  </select>
              </td>
           </tr>
          
          <tr>
              <td>Featured:</td>
              <td>
                  <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                  <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
               </td>
          </tr>
          <tr>
              <td>Active:</td>
              <td>
                  <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                  <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
               </td>
          </tr>

          <tr>
              <td colspan="2">
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                  <input type="submit" name="submit" value="Add Food" class="btn-secondary">

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
  // echo "clicked";
  //1.Get all the detaies from the form
      $id =$_POST['id'];
      $title =mysqli_real_escape_string($conn,$_POST['title']);
      $description =mysqli_real_escape_string($conn,$_POST['description']);
      $price =$_POST['price'];
      $current_image =$_POST['current_image'];
       $category =$_POST['category'];

       $featured =$_POST['featured'];
      $active =$_POST['active'];


      //check whether the update button is clicked or not
      if(isset($_FILES['image']['name']))
      {
          //upload clicked
         //Get the image details
          $image_name = $_FILES['image']['name']; //new image name

           //check whether the file is available or not
           if($image_name !='')
           {
              //A. uploading new image
              //get the extension of the image (jpg ,png ,gig, etc)

              $parts = explode('.', $image_name);
              $ext = end($parts);

              //$ext = end(explode('.',$image_name));

              //Rename the image  this can also be used to uniquely identified with time
             $image_name = "food-Name-".rand(0000, 9999).'.'.$ext; //eg our food name will be <food_category_ #34.jpg

  
             $scr_path = $_FILES['image']['tmp_name']; //souce path

             $dest_path = "../images/food/". $image_name;  //destination path
   
             //upload the image
             $upload = move_uploaded_file($scr_path,$dest_path);

             //check whether the image is uploaded or not
                  // if the image is not upload we will stop the procces and redirect with the error message
                  if($upload==false)
                  {
             //set amessage
             $_SESSION['upload'] = "<div class='error'>Failed to Upload New Image.</div>";  

             // Redire  to add category page
             header('location:'.SITEURL.'admin/manage-food.php');
 
              //stop the proccess
               die();
                  }


                  //3Remove the image if the image is uploades and th current image exists   
                   //section B
                      //remove the current image
                       //remove our current image if available
                       if($current_image !="")
                       {
                           //current image is availabe
                           //remove the image
                           $remove_path="../images/food/".$current_image;

                           $remove =unlink($remove_path);

                           if($remove == false)
                           {
                          //failed to remove message
                          $_SESSION['remove-failed'] = "<div class='error'>Failed to Remove the  Current  Image.</div>";  
     
                          // Redire  to add category page
                           header('location:'.SITEURL.'admin/manage-food.php');
                              die();// stop the proess
                           }
                       }
           }
           else
           {
            $image_name = $current_image ;// default emage when image is not selected
           }
      }
      else
      {
          $image_name = $current_image ;  // default image when the button is not clicked
      }


               //4.Update food in the database
           $sql3 ="UPDATE table_food SET 
                  title = '$title',
                   description = '$description',
                   price = $price,
                   image_name = '$image_name',
                   category_id= '$category',
                   featured = '$featured',
                   active = '$active'
                   WHERE id=$id
                "; 


             //execute the sql quary
            $res3 =mysqli_query($conn,$sql3);


            //Redire to manage food with session message
            //check whether the query is executed or not
            if($res3==true)
           {
            //Query executed  food updated
            
           $_SESSION['up-date'] = "<div class='success'>Food Updated Successfully.</div>";  

           // Redire  to add category page
          header('location:'.SITEURL.'admin/manage-food.php');
       
          }
          else
          {
          //food updated
          $_SESSION['up-date'] = "<div class='error'>Failed To Update Food.</div>";  

          // Redire  to add category page
          header('location:'.SITEURL.'admin/manage-food.php');
       
           }

 
}
?>

<?php include('partials/footer.php'); ?>
