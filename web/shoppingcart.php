<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>

<!-- NAVBAR -->


  <!-- the cart design -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">


      <!-- if click on remove item it will dispaly message box
    it will go to action.php and excute the code -->
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert']; //display the message box

} else {//else 
  echo 'none';


} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) 
           // if click on remove item it will dispaly message Item removed from the cart!
           //it will go to action.php and excute the code 
          {
  echo $_SESSION['message'];  //print Item removed from the cart!

} unset($_SESSION['showAlert']); ?></strong>
        </div>


        <div class="table-responsive mt-2">    <!--responive table margin top =2 --> 
          <table class="table table-bordered table-striped text-center">  <!-- table-striped (lines) table m5atat -->
            <thead>
              <tr>
                <td colspan="7">
                    <!-- dipaly text product on your cart -->
                  <h4 class="text-center text-warning bg-dark m-0">Products in your cart!</h4> <!-- (text-info) color of text will be blue , m = margin zero -->
                </td>
              </tr>
              <tr>
                 <!--names of first row in cart -->
                <!-- heading of colums name -->
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
               
                <th>
                    <!-- anchor tag for removing all the items (clear cart) -->
                  <a href="action.php?clear=all" class="btn btn-outline-danger p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                   <!--will go to action.php and excute the code for method  $_GET['clear']  -->
                  <!--  onclick hatal3 meassage box when click on clear cart  -->
                  <!-- &nbsp; to give space -->
                  <!-- p-1 for the size -->
               
                </th>
              </tr>
            </thead>  
            <!-- end of head first row -->
            
            <tbody>
                <!-- fetch product details from cart table -->
              <?php
                require 'db.php';
             
                $grand_total = 0;
                session_start();
                //creates a session or resumes the current one based on a session identifier passed via a GET or POST request
                $conn = mysqli_connect('127.0.0.1', 'root','', 'metro1');
                if(mysqli_connect_errno()){
                  echo 'Failed to connect';
                }	
                $CID = $_SESSION['USER_ID'];
                $stmt = 'SELECT O_ID FROM orders WHERE O_Done = 0 AND C_ID = ' .$CID. '';
                $stmt_e = mysqli_query($conn, $stmt);
                $stmt_r = mysqli_fetch_assoc($stmt_e);
                $pids = 'SELECT DISTINCT P_ID FROM orders_products WHERE O_ID = '.$stmt_r['O_ID'].'';
                $pids_e = mysqli_query($conn, $pids);
                while($pids_r = mysqli_fetch_array($pids_e, MYSQLI_ASSOC)):   
               //while loop to print the items select from the database id , name ,iamge ,price,total , clear icon  (from (db))  row by row 
               $lastquery = 'SELECT * FROM products WHERE P_ID = '.$pids_r['P_ID'].'';
               $lastquery_e = mysqli_query($conn, $lastquery);             
               $lastquery_r = mysqli_fetch_assoc($lastquery_e); //fetch_assoc() Fetches one row of data from the result set and returns it as an associative array?>
            
            <tr>
                <!-- display the ID of each product -->
                <td><?= $lastquery_r['P_ID'] ?></td> 


                <input type="hidden" class="pid" value="<?= $lastquery_r['P_ID'] ?>">


                <?php echo '<td><img src="data:P_Image/png;base64,' .base64_encode($lastquery_r['P_Image']). '" width="50"></td>'; ?>  <!--display the images from database-->
               



                
                <!-- display the name of the product -->
                <td><?= $lastquery_r['P_FName'] ?></td> <!--  $row['product_name'] get the name of product from database by (product_name) -->
                <td>
                <!-- number_format convert number from 900000 to 90,000,00 -->
                  <i class=""></i>&nbsp;&nbsp;<?= number_format($lastquery_r['P_Price'],2); ?> <!--display the images from database-->  <!-- &nbsp; to give space -->
                </td>
           
                
                <input type="hidden" class="pprice" value="<?= $lastquery_r['P_Price'] ?>">
               
              
              
                <td> 
                <!-- display quantity  -->
                  <?php  $quan = 'SELECT COUNT(*) FROM orders_products WHERE P_ID = ' .$lastquery_r['P_ID'].'';
                  $quan_e = mysqli_query($conn, $quan);
                  $quan_r = mysqli_fetch_assoc($quan_e)['COUNT(*)'];
                  ?>
                  <input type="number" class="form-control itemQty" value="<?= $quan_r ?>" style="width:75px;">    <!--  $row['qty'] get the quantity from database by (qty) --> 
               </td>



                <!-- diaplay the total price for every product -->
                 <!-- number_format convert number from 900000 to 90,000,00 -->
                <td><i class=""></i>&nbsp;&nbsp;<?= number_format($lastquery_r['P_Price'] * $quan_r,2); ?></td>   <!--  $row['total_price'] get the totlal price from database by (total_price) -->
              


                <!-- remove icon for every product -->
                <td>
                     <!-- remove icon for every product -->   <!--  onclick hatal3 meassage box when click on clear icon  -->
                  <a href="action.php?remove=<?= $lastquery_r['P_ID'] ?>" class="btn btn-outline-warning" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
               <!-- remove=<//?= $row['id']  remove the produt using its ID 
                   remove = id and  will sent to action.php -->
               
                </td>
              </tr>

              <!-- calculate the total price by the id of every product -->
              <?php $grand_total += $lastquery_r['P_Price']; ?>

              <?php endwhile; ?>    <!-- end of while loop -->
              <tr>
                <!-- creating continue shopping button -->
                <td colspan="3">
                  <a href="metro1.php" class="btn btn-outline-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                     <!-- &nbsp; to give space -->
               </td>
               
               <!-- dispaly (as text) the total price -->
                <td colspan="2"><b>Total price </b></td>

                <!-- diaplay the total price for all the products -->
                <td><b><i class=""></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
             
                <td>
                    <!-- checkout button -->
                  <a href="order_confirmation.php" class="btn btn-outline-dark <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                <!-- ($grand_total > 1) ? '' : 'disabled'  if the total price less than or equal zero checkout button will be disabled can not be use -->
                </td>


              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity

    // this function will send the ID and number of quantity of each product to the server
    //and from the server it will update the cart with total price the quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();         //get the product id from database by find method 
      var pprice = $el.find(".pprice").val();   //get the product price from database by find method 
      var qty = $el.find(".itemQty").val();     //get the product quabtity from database by find method 
      location.reload(true);                    //reload the data of the page (price)
    
    
      $.ajax({   //send a request to the server using ajax
        url: 'action.php',  //go to action.php
        method: 'post',
        cache: false,
        data: {
          qty: qty, //send the quantity(qty) to qty in the server (action.php)
          pid: pid, //send the product ID(pid) to pid in the server(action.php)
          pprice: pprice  //send the product price(pprice) to ppeice in the server(action.php)
          

        },
        success: function(response) {
          console.log(response);
        }
      });
    });






    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("shoppingcart.php-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>