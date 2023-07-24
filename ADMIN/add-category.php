<?php include('partials/menu.php') ; ?>
   <!-- main content section starts -->
   <div class="main-content">
       <div class="wrapper">
       <!-- <h1>Add Category</h1>
            
       <br><br> -->
       <?php
       if(isset($_SESSION['add-cat']))
       {
        echo $_SESSION['add-cat'];
        unset( $_SESSION['add-cat']);
       }
       if(isset($_SESSION['upload']))
       {
        echo $_SESSION['upload'];
        unset( $_SESSION['upload']);
       }

       ?>
       <br><br>

       <!--Add Category form sterts here-->
       <form action="" method="POST" enctype="multipart/form-data"> <!-- enctype property will all us to upload the image-->
           <table class="table-30">
            
           <tr>
                <td>Title:</td>
                <td><input type="text" name="title" placeholder="Category Title "></td>
            </tr>

            <tr>
                <td>Select image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                 </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                 </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">

                </td>
            </tr>
 
           
           </table>
       </form>
            
       <!--Add Category form sterts here-->


       <div class="clearfix"></div>

</div>
</div>
<!-- main content section ends -->

<?php 
if(isset($_POST['submit']))
{
   //1. echo "Button Clicked";
   //2.get the value from the form
   $title =mysqli_real_escape_string($conn, $_POST['title']);

   //for radio input type we need to check whether the button is clicked or not
   if(isset($_POST['featured']))
   {
      // Get the value from the form 
       $featured =$_POST['featured'];
   }
   else
   {
    // set the defuelt value
    $featured ="No";

   }

   if(isset($_POST['active']))
   {
    //Get the value from the form
      $active =$_POST['active'];
   } 
   else
   {
    //set the defualt value
    $active="No";
   }

   //check whethe the image is selected or not and set the value of image name  accordingly 
 // print_r($_FILES['image']);  // message expected Array ( [name] => bitch.jpg [full_path] => bitch.jpg [type] => image/jpeg [tmp_name] => C:\xamppMEEE\tmp\phpA232.tmp [error] => 0 [size] => 742682 )

  // die(); //Break the code .   Do print_r and die first to check the array of the array constisting tmp_name

  if(isset($_FILES['image']['name']))
  {
    //Upload the image
    // to upload the image we need image name , source path and destination path
    $image_name =$_FILES['image']['name'];
    
    //Upload the image only if image is selected 
      if($image_name !='')  
      {
    
      
    // to rename our image
    //get the extension of the image (jpg,png,gif,etc) eg " food1.jpg"
    //us explode to break the image name and end will get the last value .jpg 

    $ext = end(explode('.',$image_name));
    // to cater for lower cases
   // $ext = strtolower (end(explode('.',$image_name)));


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
        header('location:'.SITEURL.'admin/add-category.php');
        
        //stop the proccess
        die();
     }
   }

  }
  else
  {
    //Dont upload the image and set the image name as blank
    $image_name="";
  }


   //creat sql query to insert database
   $sql= "INSERT INTO table_category SET
   title='$title',
   image_name='$image_name',
   featured='$featured',
   active='$active'
   ";

   //execute thr query and save in the database
   $res = mysqli_query($conn,$sql);

   //check whether the query is executed or not
   if($res==true)
   {
    //query executed and category added 
      $_SESSION['add-cat'] = "<div class='success'>Category Added Succussfully. </div>";
    //Redirect it to manage admin
    header('location:'.SITEURL.'admin/manage-category.php');
   }
   else
   {
    // failed to add category
    $_SESSION['add-cat'] = "<div class='error'>Failed to Add Category . </div>";
    //Redirect it to manage admin
    header('location:'.SITEURL.'admin/add-category.php');

   }
  } 
?>

<?php include('partials/footer.php') ; ?>
