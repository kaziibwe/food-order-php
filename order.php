<?php include('partials-front/menu.php'); ?>
<?php 
ob_start();

       
       //check whether the food id is set or Not
       if(isset($_GET['food_id']))
       {
           //get the food id and the details of of the selected food
              $food_id =$_GET['food_id'];

              //GET the details of the seleccted food
              $sql = "SELECT * FROM table_food WHERE id = $food_id";

              //create the query
              $res = mysqli_query($conn,$sql);

              //count the rows
              $count = mysqli_num_rows($res);

              //check whether the data is available or normalizer_get_raw_decomposition
              if($count ==1)
              {
                //data is availabe
                //get the data from th data bse 
                  $row = mysqli_fetch_assoc($res);

                  $title =$row['title'];
                  $price =$row['price'];
                  $image_name =$row['image_name'];
                  
              }
              else
              {
                //no data availabe
                //redirect to home page
                header('location:'.SITEURL);
              }
       }
       else
       {
         //redirect to the home page
          header('location:'.SITEURL);
       }
       ?> 






<section class="session forms">
        <div class="form login">
           <div class="form-content">
            <header>Order Here</header>

            <form action="" method="POST">


            <div class="bigpicture ">

            <div class="field input-field"> 
              <div class="bigpicture">
            <!-- <div class="order-here">    
            <div class="food-selected"> -->

               <?php 
               

               //chech thether the image i availabe or not
               if($image_name=='')
               {
                //image not available
                echo "<div class='error'>Image not available.</div>";
               }
               else
               {
                //image not available
                ?>
                   <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="campbells"  class=" imgresponse img-curve  ">

                <?php             
               } 
               ?> 
                  
        </div>
         <br>
         
           <div class="food-menu-desc  ">
            <h4><?php echo $title;?></h4>
            <input type="hidden" name="food" value="<?php echo $title; ?>">
          <br><br>

           <p class="food-price">$<?php echo $price;?></p>
           <input type="hidden" name="price" value="<?php echo $price; ?>">                             
            <br>
            </div> 
          <!-- <p>Quantity</p>
            <input type="number" name="quantity" placeholder="Enter number of dishes"> -->
                            
            </div>
             <div class="clearfix"></div> 
             </div>

            
            
               <div class="field input-field">
                <p>Quantity</p>
                <input type="number" name="quantity" placeholder="Enter number of dishes"  class="input"> 
                </div><br>

                <div class="field input-field">
                <p>Fullname</p>
                <input type="text" name="full_name" placeholder="Enter Username" required>
                </div><br>

                <div class="field input-field">
                <p>Phone Number</p>
                <input type="tel" name="contact" placeholder="Eg 07*******" required>
                </div><br><br>

                <p>Email</p>
                <input type="email" name="email"  placeholder="alf23@gmail.com" required>

                <p>Address</p><br>
                <textarea name="address" id="textarea" cols="30" rows="5" placeholder="Eg. Street, City , House Number" required></textarea><br><br>

<!--                
               <div class="form-link">
                <a href="#" class="forget-pass">Forget password?</a>
                </div> -->
                    

                <input type="submit" name="submit" value="Confirm Order">
                <input type="hidden" name="food" value="<?php echo $title; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <div class="field feild-button">
                        
                    
                </div>

                <!-- <div class="form-link">
                     <span>Already have an account?<a href="#" class="signup-link">Signup</a> </span>  
                <div> -->


                
               
            </form>
           </div>
        </div>

    </section>



    <?php 

    
//check whether submit button is clicked or not
 if(isset($_POST['submit']))
 {
     
    //Get the details from th form
    $food =mysqli_real_escape_string($conn, $_POST['food']);
    $price = $_POST['price'];
    $quantity	= $_POST['quantity'];

    $total = $price * $quantity ;//totl is price * quantity
    
    $order_date = date("Y-m-d h:i:sa"); //orderdate

    $status = "ordered"; //order ,on delivery , delivered , cancalled

    $customer_name = mysqli_real_escape_string($conn,$_POST['full_name']);
    $customer_contact = mysqli_real_escape_string($conn,$_POST['contact']);
    $customer_email = mysqli_real_escape_string($conn, $_POST['email']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['address']);

    //creat qsl to save the data in the databse

    $sql2 = " INSERT INTO table_order SET
        food = '$food',
        price= $price,
        quantity = $quantity,
        total = $total,
        order_date = '$order_date',
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address'

    ";
    // echo $sql2 ; die();
    //Execute th query
    $res2 =mysqli_query($conn,$sql2);

    //check whether the query executed successfully or not or not

    if($res2 ==true)
    {
      //Query executed and query saved
      $_SESSION['order'] = "<div class='text-center success'>Food Ordered Successfully.<?div>";
      header('location:'.SITEURL);
    }
    else
    {
      //failed to execute the Query
      $_SESSION['order'] = "<div class='text-center error'>Failed To Order Food.</div>";
      header('location:'.SITEURL);
    }



 }

 ob_end_flush();

?>

 

  <?php include('partials-front/footer.php'); ?>
