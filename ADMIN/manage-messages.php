<?php include('partials/menu.php'); ?>
<!-- main content section starts -->
<div class="main-content">
       <div class="wrapper">
       

 <form action="" method="POST">
  <div class="column is-offset-4 is-5-desktop">

  <div class="field">
 <h2 class="has-text-centered has-text-weight-semibold is-size-4 pt-4">SEND A MESSAGE</h2>
 <hr>

       <?php
       if(isset($_POST['submit']))
       {
        echo '<div class="success">messege sent successfully. </div>';
       }

       
       ?>

 <label class="has-text-weight-bold is-size-4">Write your Message</label>
  <p class="control has-icons-left has-icons-right ">
    <textarea class="textarea" name="message" id="" cols="30" rows="10" placeholder="Enter the message to the clients"> </textarea>

    <span class="icon is-small is-left">
    <!-- <i class="fa fa-envelope-o" ></i> -->

    </span>
    <span class="icon is-small is-right">
    <i class="fa fa-envelope-o" ></i>
    </span>
  </p>
</div>



   <table class="table-full">
       <tr>
        <th>S.N.</th>
        <th>Checked</th>
        <th>Fullname</th>
        
        <th>Phone Number</th>
       </tr>

         <?php 
         $sql ="SELECT * FROM table_order";
         $res =mysqli_query($conn,$sql);
         $count =mysqli_num_rows($res);
          

         $sn=1; 

         if($count>0)
         {
            //cheching the all rows of data in the database
            while($row=mysqli_fetch_assoc($res))
            {
              $id =$row['id'];
              $customer_name =$row['customer_name'];
              $customer_contact =$row['customer_contact'];
            }
         }
         ?>
          
       
       <tr>
       <td><?php echo $sn++; ?></td> 
        <td>                                                        
          <input class="checkbox" type="checkbox" name=" customer_contact[]" value="<?php echo $customer_contact;?>">
        </td>
        <td><?php echo $customer_name ; ?></td>
        
        <td><?php echo $customer_contact ; ?></td>
         
      </tr>

      
   </table>
   <td colspan="4">
<input type="submit" class="has-text-bold button btn is-primary is-fullwidth mt-6" value="SUBMIT" >
<td >
</table>
</div>

</form>

<div class="clearfix"></div>

</div>
</div>
<!-- main content section ends -->

<?php
          if(isset($_POST['submit']))
              $customer_contact =mysqli_real_escape_string($conn, $_POST['customer_contact']);
              $message =mysqli_real_escape_string($conn, $_POST['message']);
              $encodedmessage =urlencode($message);

              $contact =implode('',$customer_contact);
              $arr =str_split($contact, '10');
             // print_r($arr) ; // get the contact in form of an array
             $numbers = implode('',$arr);
             $authkey ="";
             $senderId ="";
             $route = "";  // the empty 3 are provided by the  api provider u pay some money

             $postData= array(
              'authkey' =>$authkey,
              'cuctomer_contact' =>$cuctomer_contact,
              'message' =>$encodedmessage,
              'sender' =>$senderId,
              'route' =>$route

             );
             $url ="http:api.msg91.com/api/sendhttp.php";

             $ch =curl_init();
             curl_setopt_array($ch,array(
                 CURLOPT_URL => $url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_POST => true,
                 CURLOPT_POSTFIELDS => $postData
             ));

             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);

             $response = curl_exec($ch);
             if($response == TRUE)
             {
              $msg = "Message sent successfully.";
             }
             if(curl_errno($ch))
             {
              echo 'error:' . curl_error($ch);
             }
             curl_close($ch);
             


?>

<?php include('partials/footer.php'); ?>
