
<?php 

//incude constants.php file here
include('../config/constants.php');
// 1.get the ID to be deleted
 $id = $_GET['id'];

//2.creat the valuable sql query to delete admin
$sql = "DELETE FROM table_admin WHERE id=$id";      // id is obtained by GET method fron the  manage admin on delete source code

//Execute the query
$res =mysqli_query($conn, $sql);

//check wheck whether then query is executed successfully of not
if($res==true)
{
    // Query Executed Successfully and admi deleted
   // echo "Admin deleted";
   //cerate sesion valiable to desplay message
   $_SESSION['delete'] = "<div class='success'>Admin Deleted sucessfuly.</div>";
   //Redirect  to  Manage Admin page
   header("location:".SITEURL.'admin/manage-admin.php');
}
else
{
    //Failed to delete Admin
   // echo "Failed to deleted Admin";
   $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div> ";
   header("location:".SITEURL.'admin/manage-admin.php');

}
// 3.Redifect to the Manage-Admin page with the message (succes/error)

?>