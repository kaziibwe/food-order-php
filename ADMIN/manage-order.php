<?php include('partials/menu.php'); ?>

<!-- main content section starts -->
<div class="main-content">
       <div class="wrapper">
       <h1>Manage Order</h1>
       <br><br>
        <?php 
         if(isset($_SESSION['order']))
         {
          echo $_SESSION['order'];
          unset( $_SESSION['order']);
         }
  

        ?>
       <br><br>

 <!-- no need of the button coz orders are made by customers-->

 <table class="table-full">
    <tr>
     <th>S.N.</th>
     <th>Food</th>
     <th>Price</th>
     <th>Quantity</th>
     <th>Total</th>
     <th>Order Date</th>
     <th>Status</th>
     <th>Customer Name</th>
     <th>Custumer Contact</th>
     <th>Email</th>
     <th>Address</th>
     <th>Actions</th>

    </tr>

    <?php 
     //create the sql Query  to get all the orders from the databe
     $sql = "SELECT * FROM table_order ORDER BY id DESC "; //desplay latest order at first

     //create the query
     $res =mysqli_query($conn,$sql);

     //count rows
     $count = mysqli_num_rows($res);

     //creat serial numbers SN valiabe and assign value to one
     $sn=1;


     // check whether we have the data in the database or not
     if($count>0)
     {
      //Order is available
       //we have data in the database
        //get the data data and display
        while($row=mysqli_fetch_assoc($res))
        {
          $id = $row['id'];
          $food = $row['food'];
          $price = $row['price'];
          $quantity = $row['quantity'];
          $total = $row['total'];
          $order_date = $row['order_date'];
          $status = $row['status'];
          $customer_name = $row['customer_name'];
          $customer_contact = $row['customer_contact'];
          $customer_email = $row['customer_email'];
          $customer_address = $row['customer_address'];

          ?>
          
    <tr>
     <td><?php echo $sn++?></td>
     <td><?php echo $food?></td>
     <td><?php echo $price?></td>
     <td><?php echo $quantity?></td>
     <td><?php echo $total?></td>
     <td><?php echo $order_date?></td>

     <td>
        <?php
             //ordered on delivery ,deliverd ,cancelled
            if($status=="ordered")
        {
            echo  "<label>$status</label>";
        }
        elseif($status=="on_delivery")
        {
          echo  "<label style='color:orange'>$status</label>";
        }
        elseif($status=="deliverd")
        {
          echo  "<label style='color:green'>$status</label>";
        }
        elseif($status=="cancelled")
        {
          echo  "<label style='color:red'>$status</label>";
        }



        ?>
    </td>


     <td><?php echo $customer_name?></td>
     <td><?php echo $customer_contact?></td>
     <td><?php echo $customer_email?></td>
     <td><?php echo $customer_address?></td>
     <td>
       <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id ;?>" class="btn-secondary">Update order</a>
     </td>
    </tr>

          
          
          <?php

        }

     }
     else 
     {
      //Order not available
       echo " <tr><td colspan='12' class='error' >Orders Not Available</td></tr>";
     }
    ?>
   
  
        
</table>  
         <div class="clearfix"></div>



       </div>
     </div>
     <!-- main content section ends -->


<?php include('partials/footer.php'); ?>