<?php include('partials-front/menu.php'); ?>



       <!--FOOD SEARCH starts from here-->
   <section class="food-search text-center " >

    <div class="container">
      <form action="<?php echo SITEURL;?>food-search.php" method="POST">
        <input type="search" name="search" placeholder="seach for food...">
        <input type="submit" name="submit" value="search" class="btn btn-primary">
      </form>
        
    </div> 

   </section>
      <!--FOOD SEARCH ends from here--> 




        

  
     <!--FOOD MENU starts from here  -->
  <section class="food-menu">
    
    <div class="container">
        <h2 class="text-center">Food Menu</h2>


           <?php 
           
           //creat sql to display food for the database
          $Sql2 = "SELECT * FROM table_food  WHERE active='Yes' ";

             //Execute Query
            $res2 =mysqli_query($conn,$Sql2);

         //count rows to check whether the food is available or not
              $count2 = mysqli_num_rows($res2);

                
              // check whether we have the data in the database or not
             if($count2>0)
             {
              // food available
              while($row=mysqli_fetch_assoc($res2))
              {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

                ?>
                  <div class="food-menu-box">    
                    <div class="food-menu-img">
                       

                    <?php
                    
                         //check whether the image is available or not
                         //check whether the image is availabe or not
                         if($image_name =="")
                          {
                          //display Message image not avaailable
                           echo "<div class='error'>Image  Not Availabe.</div>";
                          }
                              else
                          {
                          //image available
                            ?>
                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Snap" class="imgresponse img-curve">
                           <?php
                           }
                          
                    ?>
                       
                   </div>
        
                      <div class="food-menu-desc  ">
               <h4><?php echo $title;?></h4>
               <p class="food-price">$<?php echo $price;?></p>
               <p class="food-detail">
               <?php echo $description;?>
               </p>
               <br>
               <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">OrderNow</a> 

            </div>
          </div>    

               

                <?php
              }
             }
             else
             {
                //food not available
                echo "<div class='error'>Food Not Found.</div>";

             }


           ?>
        
            <div class="clearfix"></div>
          </div>

    
  </section>
      <!--FOOD MENU ends from here-->



      <?php include('partials-front/footer.php'); ?>
