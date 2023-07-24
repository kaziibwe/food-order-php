<?php 
// include constant page
include('../config/constants.php');

// echo "delete page ";
//check whether the id and image name is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))  //use && or and
{
    //get the value and delete
    //echo "Get value and delete";
    //1. Get the food and image name
    $id =$_GET['id'];
    $image_name =$_GET['image_name'];

    //2. Remove the image if available
    //check whether the massage is available or not
    if($image_name!='')
    {
        //it has the image and need ro remove from the folder
        //get the image path
        $path= "../images/food/".$image_name;
        
        //Remove image file from the folder
        $remove =unlink($path);

    //check whether the image is removed or not

    if($remove==false)
      {
        //Failed to remove the image
        $_SESSION['fail-remove-image'] =" <div class='error'>Failed to remove Image File</div>";
        //Redirect to the manage category page
        header('location:'.SITEURL.'admin/manage-food.php');
        //stop the process
        die();
      }  


    }


    //3.Delete food from Database
    //sql query to delete data from the database 
      $sql ="DELETE FROM table_food WHERE id=$id";

      //execute the query
      $res =mysqli_query($conn,$sql);

      //Check whether the query is executed or not and set the session message respectively

          //4. Redirect to manage food page with session massages

      if($res==true)
         {
         //Set the Success Message 
         $_SESSION['del-food'] = "<div class='success'>Food Deleted Successfully.</div>";

        //Redirect to food Page
         header('location:'.SITEURL.'admin/manage-food.php');

       }
       else
       {
          //Set the fail Message and redirect to the manage  category page
          $_SESSION['del-food'] = "<div class='error'>Failed to delete Food.</div>";

        //Redirect to Category Page
        header('location:'.SITEURL.'admin/manage-food.php');
    
       }



}
else
{
     //redirect to manage food page
    //echo "redirect";
    //if no id and image name it is redirected to manage food page also form of security
    $_SESSION['unauthorized'] = "<div class='error'>Unauthorised Access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');

}


?>