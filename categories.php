<?php include('partials-front/menu.php'); ?>


        

           
           <!-- cartegory section starts from here-->
   <section class="categories">

<div class="container">
    <h2 class="text-center">Explore Food</h2>  <!--     searching categories us h2 not h1 for search engine optimising purpose  h1 is used one time in the html page -->

   <?php 
   
           //creat sql to display categories for the database
           $Sql = "SELECT * FROM table_category  WHERE active='Yes'  ";

              //Execute Query
               $res =mysqli_query($conn,$Sql);

              //count rows to check whether the category is available or not
                  $count = mysqli_num_rows($res);

    
                    // check whether we have the data in the database or not
                    if($count>0)
                       {
                        //Categories Available or not
                   while($row=mysqli_fetch_assoc($res))
                   {
                      $id = $row['id'];
                      $title = $row['title'];
                      $image_name = $row['image_name'];

                        ?>
                   <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
                  <div class="box-3 float-container">
              
                   <?php 

                    //check whether the image is availabe or not
                             if($image_name =="")
                                {
                            //display Message
                           echo "<div class='error'>Image is not availabe.</div>";
                           }
                              else
                           {
                              //image available
                              ?>
                               <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="Snap" class="imgresponse img-curve">
                               <?php
                           }
                           ?>

                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                       </div>
                         </a>

                    <?php
                     }
                    }
                      else
                    {
                 //categories not availabe
                  echo "<div class='error'>Category Not Added.</div>";
                    }


                     ?>
    

  <!--Cartegory secction ends from here -->
    
      <div class="clearfix"></div>  <!--create spacing btn the containers -->

    </div>

</section>
  <!--Cartegory secction ends from here -->

  <?php include('partials-front/footer.php'); ?>