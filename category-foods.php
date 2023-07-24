<?php include('partials-front/menu.php'); ?>


           <?php 
           
           //Check whether the id is passed or not
           if(isset($_GET['category_id']))
           {
            // category Id is set
              $category_id =$_GET['category_id'];

              //GET the category tititle based on the category id
              // No use of * since we need only the title
              $sql = "SELECT title FROM table_category WHERE id=$category_id";

              //Executen the query
              $res =mysqli_query($conn,$sql);

              //get the value from the database
              $row = mysqli_fetch_assoc($res);

              //Get the title
              $category_title = $row['title'];


           }
           else
           {
            //Category Not Passed
            //REdirect to the page security
            header('location:'.SITEURL);
           }
           
           
           
           ?>


       <!--FOOD SEARCH starts from here-->
   <section class="food-search text-center " >
   <h2 class="text-center">Foods on <a href="#" class="text-white">"<?php echo $category_title?>"</a></h2>
    <div class="container">
      
    </div> 

   </section>
      <!--FOOD SEARCH ends from here--> 




  
     <!--FOOD MENU starts from here  -->
  <section class="food-menu">
    
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

          <?php 
              //sql query to get food based on category
              //we are to use the category id from above tha we obtained in the category in the home page sourse code

              $sql2 = "SELECT *FROM table_food WHERE category_id=$category_id";
              
              //execute the query
              $res2 =mysqli_query($conn,$sql2);

              //count the rows
              $count2 =mysqli_num_rows($res2);

              //Check whether the food is available or not

              if($count2>0)
              {
                //food is not available
                while($row2 = mysqli_fetch_assoc($res2))
                {
                  $id  =  $row2['id'];
                  $title = $row2['title'];
                  $price = $row2['price'];
                  $description = $row2['description'];
                  $image_name = $row2['image_name'];
                  $title = $row2['title'];

                  ?>
              <div class="food-menu-box">    
                 <div class="food-menu-img">

                   <?php 
                     if($image_name =='')
                     {
                      // inage is no availabe
                      echo "<div class='error'>Image  Not Available.</div>";
                     }
                     else
                     {
                      //image is available
                      ?>
                      
                      <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Meatball"  class=" imgresponse img-curve  ">

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
                 echo "<div class='error'>Food Not Available.</div>";
              }



          
          ?>

        
           
           <div class="clearfix"></div>
        
       
       
        
    </div>

  </section>
      <!--FOOD MENU ends from here--> 



      <?php include('partials-front/footer.php'); ?>