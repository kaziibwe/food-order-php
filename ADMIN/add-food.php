<?php include('partials/menu.php'); ?>

<!-- main content section starts -->
<div class="main-content">
       <div class="wrapper">
       <h1>Add Food</h1>

       <br><br>

       <?php
       
       if(isset($_SESSION['uploaded']))
       {
        echo $_SESSION['uploaded'];
        unset( $_SESSION['uploaded']);
       }
       ?>
       <br><br>

       <form action="" method="POST" enctype="multipart/form-data"> <!-- enctype property will all us to upload the image-->
           <table class="table-30">
            
           <tr>
                <td>Title:</td>
                <td><input type="text" name="title" placeholder="Food Title "></td>
            </tr>

            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description"  cols="30" rows="5" placeholder="Desciption of Food  "></textarea>
                </td>
            </tr>

            <tr>
                <td>Price:</td>
                <td><input type="number" name="price" placeholder="price "></td>
            </tr>

            <tr>
                <td>Select Image:</td>
                <td><input type="file" name="image" ></td>
            </tr>

            <tr>
                <td>Category:</td>
                <td>
                <select name="category" >

                    <?php 
                       //creat code to display category from the databe
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
                                $id =$row['id'];
                                $title =$row['title'];
                                ?>

                                <option value="<?php echo $id;?>"><?php echo $title;?></option>

                                <?php
                            }
                        }
                        else
                        {
                          //  we dont have categories
                             ?>
                             <option value="0">No Category Found</option>


                             <?php
                        }


                       //2. Display on drop down


                    ?>

                   


                </select>
                    
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
                 //check eheter the button is clicked or not
          //echo "Button Clicked";

          //1. Get the data from the form and insert it to data base
               $title = mysqli_real_escape_string($conn,$_POST['title']);
               $description =mysqli_real_escape_string($conn, $_POST['description']);
               $price = $_POST['price'];
               $category = $_POST['category'];
                //check the radio button for featured or active are checked or not
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else{
                    $featured ="No"; // default value
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else{
                    $active ="No";  // default value
                }
           //2. upload the image if selected
           //check whether selected button is selected or not and upload the image only when the image is selected
           if(isset($_FILES['image']['name'])) 
           {
            //Get the details of the selected image
                $image_name =$_FILES['image']['name'];
                //check whether the image is selected or not and upload image only if the image is selected
                if($image_name !='')
                {
                     //image is seleced 
                     //A. Rename the image
                     //get the extension of the image (jpg ,png ,gig, etc)
                     $ext = end(explode('.',$image_name));

                     //Rename the image  this can also be used to uniquely identified with time
                    //eg our food name will be <food_category_ #34.jpg
                    $image_name ="food-Name-".rand(0000, 9999).'.'.$ext;
   


                     $src =$_FILES['image']['tmp_name'];

                     $dst ="../images/food/". $image_name;  //concatinate

                   //upload the image
                    $upload=move_uploaded_file($src,$dst);

                   //check whether the image is uploaded or not
                    // if the image is not upload we will stop the procces and redirect with the error message
                      if($upload==false)
                         {
                    //set amessage
                    $_SESSION['uploaded'] = "<div class='error'>Failed to Upload the Image.</div>";  

                    // Redire  to add category page
                    header('location:'.SITEURL.'admin/add-food.php');
        
                     //stop the proccess
                      die();
                         }
                }
           }     
           else
           {
             $image_name=""; //selecting defualt value as black
           }

            //3.insert into the database

            //create the sql query to save  or Add food
            // for Numerical we do not need to pass value quotes  ' ' But for string value it is compulsory to add quotes
            $sql2 ="INSERT INTO table_food SET 
             title = '$title',
             description = '$description',
             price = $price,
             image_name = '$image_name',
             category_id = $category,
             featured = '$featured',
             active = '$active'
             ";

             // Execute the Query 
             $res2 = mysqli_query($conn,$sql2);
             //check whether data is insented or not 
            //4. Redirect to the manage food  

             if ($res2==true)
             {
                //datais inserted successfully
                $_SESSION['add'] = "<div class='success'>Food Added Successfully..</div>";  
                header('location:'.SITEURL.'admin/manage-food.php');

             }
             else
             {
                   //failed to insert data
                   $_SESSION['add'] = "<div class='error'>Failed to Add Food..</div>";  
                   header('location:'.SITEURL.'admin/manage-food.php');
   

             }
       }   

             
?>


<?php include('partials/footer.php'); ?>