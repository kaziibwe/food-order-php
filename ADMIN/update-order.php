<?php include('partials/menu.php'); ?>
<!-- main content section starts -->
<div class="main-content">
       <div class="wrapper">
       <h1>Update Order</h1>

       <br><br>
         <?php 
            //check wher id is set or not
            if(isset($_GET['id']))
            {
                // Get the order details
                $id=$_GET['id'];

                //GET THE DETAILS BASESD ON THIS ID
                //sql query to get details
                $sql = "SELECT * FROM table_order WHERE id=$id";
                
                //execute tthe query

                $res = mysqli_query($conn,$sql);
                
                //count rows
                $count =mysqli_num_rows($res);

                if($count==1)
                {
                    //detais available
                    $row = mysqli_fetch_assoc($res);

                    $food =$row['food'];
                    $price =$row['price'];
                    $quantity =$row['quantity'];
                    $status =$row['status'];
                    $customer_name =$row['customer_name'];
                    $customer_contact =$row['customer_contact'];
                    $customer_email =$row['customer_email'];
                    $customer_address =$row['customer_address'];

                }
                else
                {

                //redirect redirect to manage order page
                header("location:".SITEURL.'admin/manage-order.php');
                    
                }
            }
            else
            {
                //redirect redirect to manage order page
                header("location:".SITEURL.'admin/manage-order.php');

            }
         ?>
           
          <form action="" method="POST">
            <table>
             <tr>
                <td>Food Name</td>
                <td><b><?php echo $food; ?></b></td>
             </tr>

             <tr>
                <td>Price</td>
                <td>$<?php echo $price; ?></td>
             </tr>
             <tr>
             <tr>
                <td>Quantity</td>
                <td>
                    <input type="number" name="quantity" value="<?php echo $quantity; ?>">
                </td>
             </tr>
             <tr>
                <td>Status</td>

                <td>
                    <select name="status" id="">
                          <option <?php if($status=="orderd"){echo"selected";}?> value="ordered">ordered</option>
                          <option <?php if($status=="on_delivery"){echo"selected";}?> value="on_delivery">On Delivery</option>
                          <option <?php if($status=="deliverd"){echo"selected";}?> value="deliverd">Deliverd</option>
                          <option <?php if($status=="cancelled"){echo"selected";}?> value="cancelled">Cancelled</option>
                    </select>
                </td>
             </tr>

             <tr>
                <td>Customer Name</td>
                <td>
                    <input type="text" name="customer_name"  value="<?php echo $customer_name;?>">
                </td>
             </tr>
             <tr>
                <td>Customer Contact</td>
                <td>
                    <input type="tel" name="customer_contact" value="<?php echo $customer_contact;?>">
                </td>
             </tr>
             <tr>

                <td>Customer Email</td>
                <td>
                    <input type="email" name="customer_email" value="<?php echo $customer_email;?>">
                </td>
             </tr>
             <tr>
                <td>Customer Address</td>
                <td>
                    <textarea name="customer_address" id="" cols="30" rows="5"> <?php echo $customer_address;?></textarea>
                </td>
             </tr>

             <tr>
                <td colspan="12">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="hidden" name="price" value="<?php echo $price?>">
                    
                   <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                </td>

             </tr>
             </table>
          </form>

       <div class="clearfix"></div>
</div>
</div>
<!-- main content section ends -->
    
        <?php
        
        
    //check whether submit button is clicked or not
     if(isset($_POST['submit']))
     {
         //echo "Clicked";
        //Get the details from th form
        $id = $_POST['id'];
        $price = mysqli_real_escape_string($conn,$_POST['price']);
        $quantity = $_POST['quantity'];

        $total = $price * $quantity ;//totl is price * quantity
        
        $status = $_POST['status']; //order ,on delivery , delivered , cancalled

        $customer_name =mysqli_real_escape_string($conn, $_POST['customer_name']);
        $customer_contact =mysqli_real_escape_string($conn, $_POST['customer_contact']);
        $customer_email = mysqli_real_escape_string($conn,$_POST['customer_email']);
        $customer_address = mysqli_real_escape_string($conn,$_POST['customer_address']);

       //creat qsl to save the data in the databse

       $sql2 = " UPDATE  table_order SET
        price= $price, 

       quantity = $quantity,
       total = $total,
       status = '$status',
       customer_name = '$customer_name',
       customer_contact = '$customer_contact',
       customer_email = '$customer_email',
       customer_address = '$customer_address'

       WHERE id=$id
   ";

   //Execute th query
   $res2 = mysqli_query($conn,$sql2);

    //check whether the query executed successfully or not or not

    if($res2 ==true)
    {
      //order updated successfuly
      $_SESSION['order'] = "<div class='text-center  '>Order Updated Successfully.<?div>";
      header('location:'.SITEURL.'admin/manage-order.php');
    }
    else
    {
      //failed to execute the Query
      $_SESSION['order'] = "<div class='text-center '>Failed To Update Order.</div>";
      header('location:'.SITEURL.'admin/manage-order.php');
    }




     }
        ?>


<?php include('partials/footer.php'); ?>
