<?php 
include('../config/constants.php');
// echo "delete page ";
//check whether the id and image name is set or not
if(isset($_GET['id']) AND isset($_GET['image_name'])) 
{
    //get the value and delete
    //echo "Get value and delete";
 $id =$_GET['id'];
 $image_name =$_GET['image_name'];

 //remove the physical image file available
  if($image_name!='')
  {
     //image is avaible. So remove it
     $path= "../images/category/".$image_name;
     //remove the image
     $remove =unlink($path);

     //if failed to remove the image add error message and stop the proccess 
     if($remove==false)
      {
        //set the session message
        $_SESSION['remove'] =" <div class='error'>Failed to remove category</div>";
        //Redirect to the manage category page
        header('location:'.SITEURL.'admin/manage-admin.php');
        //stop the process
        die();
      }


  }
 //delete the data from the databe
 //sql query to delete data from the database 
   $sql ="DELETE FROM table_category WHERE id=$id";

   //execute the query
   $res =mysqli_query($conn,$sql);

   // check whether the data is deleted from the database  or not 
   if($res==true)
   {
    //Set the Success Message 
    $_SESSION['delete-cat'] = "<div class='success'>Category Deleted Successfully.</div>";

    //Redirect to Category Page
    header('location:'.SITEURL.'admin/manage-category.php');

   }
   else
   {
        //Set the fail Message and redirect to the manage  category page
        $_SESSION['delete-cat'] = "<div class='error'>Failed to delete Category.</div>";

        //Redirect to Category Page
        header('location:'.SITEURL.'admin/manage-category.php');
    
   }





}
else
{
    //redirect to manage category page 
    //this else can stop hackers to go delete when the dont no the image name image eg id=28&image_name=bitch.jpg
    header('location:'.SITEURL.'admin/manage-category.php');
}
?>