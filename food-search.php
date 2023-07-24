<?php include('partials-front/menu.php'); ?>



       <!--FOOD SEARCH starts from here-->
   <section class="food-search text-center " >

    <div class="container">
      <?php
      
      //Get the search hey word
      //$search =( $_POST['search']);  vurnalable to hackers the below (mysqli_real_escape_string) make the in put to be the sting

      $search =mysqli_real_escape_string($conn, $_POST['search']);
                
      
      ?>
    <h2 class="text-center">Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>
    </div> 

   </section>
      <!--FOOD SEARCH ends from here--> 




  
     <!--FOOD MENU starts from here  -->
  <section class="food-menu">
    
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

            <?php
            
            
            //sql query to get foodbased on the search key word
            //$search = burgar'; DROP database name;
            // "SELECT * FROM table_food WHERE title LIKE '%$burgar'%' OR description LIKE '%$burgar'%' ";
            $sql = "SELECT * FROM table_food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

            //Execute the query
           $res = mysqli_query($conn,$sql);

           //count Rows
           $count = mysqli_num_rows($res);

           //check wherher the food is available
           if($count>0)
           {
              //food available
              while($row=mysqli_fetch_assoc($res))
              {
                  //Get the details
                  $id = $row['id'];
                  $title = $row['title'];
                  $price = $row['price'];
                  $description = $row['description'];
                  $image_name = $row['image_name'];
                    

                    ?>

                  <div class="food-menu-box">    
                     <div class="food-menu-img">
                         
                          <?php 
                          
                               //check whether the imge is available or not
                                if($image_name =="")
                                {
                                  //Image Not Available
                                    echo "<div class='error'>Image Not Available.</div>";
                                }
                                else
                                {
                                  //image Available
                                   ?>

                                   <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Meatball"  class=" imgresponse img-curve  ">
                                           
                                   <?php

                                }

                          ?>

                       
                     </div>
        
                      <div class="food-menu-desc  ">
                       <h4><?php echo $title;?></h4>
                        <p class="food-price">$<?php echo $price;?></p>
                        <p class="food-detail">
                         <?php echo $description; ?>
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
                  //Food Not available
                   echo "<div class='error'>Food Not available.</div>";


                   }


                    ?>

        
       
      
                       <div class="clearfix"></div>
                     
                   </div>

                   </section>
                  <!--FOOD MENU ends from here--> 



      <?php include('partials-front/footer.php'); ?>
