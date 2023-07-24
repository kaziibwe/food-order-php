<?php include('partials-front/menu.php'); ?>



       <!--FOOD SEARCH starts from here-->
   <section class="food-search text-center " >

   <div class="title text-white">  WELCOME TO</div>
    <div class="titlez text-white"> FOOD ORDER WEBSITE RESTAURANT</div>
    <div class="title text-white">  ENJOY</div>


    <div class="container" >
      <form action="<?php echo SITEURL;?>food-search.php" method="POST">
        <input type="search" name="search" placeholder="seach for food...">
        <input type="submit" name="submit" value="search" class="btn btn-primary">
      </form>
        
    </div> 

   </section>
      <!--FOOD SEARCH ends from here--> 

       <?php
       
       if(isset($_SESSION['order']))
       {
        echo $_SESSION['order'];
        unset( $_SESSION['order']);
       }
       ?>


           <!-- cartegory section starts from here-->
           

   <section class="categories  display1">

    <div class="container">
        <h2 class="text-center">Explore Food</h2>  <!--     searching categories us h2 not h1 for search engine optimising purpose  h1 is used one time in the html page -->

       <?php 
       
          //creat sql to display categories for the database
          $Sql = "SELECT * FROM table_category  WHERE active='Yes' AND featured='Yes' LIMIT 3";

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
         <div class="center">

          <div class="box-3 float-container">
                  
                <?php 

                //check whether the image is availabe or not
                if($image_name =="")
                {
                  //display Message
                  echo "<div class='error'>Image  Not availabe.</div>";
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
        

        
          <div class="clearfix"></div>  <!--create spacing btn the containers -->
 
        </div>

   </section>
      <!--Cartegory secction ends from here -->

      </div>





      








  
     <!--FOOD MENU starts from here  -->
  <section class="food-menu">
    
    <div class="container">
        <h2 class="text-center">Food Menu</h2>


           <?php 
           
           //creat sql to display food for the database
          $Sql2 = "SELECT * FROM table_food  WHERE active='Yes' AND featured='Yes' LIMIT 4";

             //Execute Query
            $res2 = mysqli_query($conn,$Sql2);

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
               <!-- we have already obtained the id from the above and id passed from the belew with valiable food_id-->
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

      
  
 
 <script scr="Js/script.js"></script>
 <script >
//   $('.center').slick({
//     slidesToShow:1,
//     slidesToScroll: 1,
//     autoplay: true,
//     autoplaySpeed: 2000
   
//   });

// </script>


      <?php include('partials-front/footer.php'); ?>


      

