<?php
   session_start();
   require 'connection.php';
   $conn = Connect();
   if(!isset($_SESSION['login_user2'])){
   header("location: customerlogin.php"); 
   }
   if(isset($_SESSION['login_user1'])){
     header('Location: manager/myrestaurant.php');
   }
   ?>
<html>
   <head>
      <title> Payment | FoodShala </title>
   </head>
   <link rel="stylesheet" type = "text/css" href ="css/payment.css">
   <link rel="stylesheet" type = "text/css" href ="css/index.css">
   <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <body>
   <?php
     include 'navbar.php';
     ?>
      <?php
         $gtotal = 0;
           foreach($_SESSION["cart"] as $keys => $values)
           {
         
             $F_ID = $values["food_id"];
             $foodname = $values["food_name"];
             $quantity = $values["food_quantity"];
             $price =  $values["food_price"];
             $total = ($values["food_quantity"] * $values["food_price"]);
             $R_ID = $values["R_ID"];
             $username = $_SESSION["login_user2"];
             $order_date = date('Y-m-d');
             
             $gtotal = $gtotal + $total;
         
         
              $query = "INSERT INTO orders (F_ID, foodname, price,  quantity, order_date, username, R_ID) 
                       VALUES ('" . $F_ID . "','" . $foodname . "','" . $price . "','" . $quantity . "','" . $order_date . "','" . $username . "','" . $R_ID . "')";
                      
         
                       $success = $conn->query($query);         
         
               if(!$success)
               {
                 ?>
      <div class="container">
         <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
         </div>
      </div>
      <?php
         }
         
         }
         
           ?>
      <div class="container">
         <div class="jumbotron">
            <h2>Choose your payment option</h2>
         </div>
      </div>
      <br>
      <h1 class="text-center">Grand Total: &#8377;<?php echo "$gtotal"; ?>/-</h1>
      <h5 class="text-center">including all service charges. (no delivery charges applied)</h5>
      <br>
      <h1 class="text-center">
         <a href="cart.php"><button class="btn btn-warning"><span class="fa fa-arrow-left"></span> Go back to cart</button></a>
         <a href="onlinepay.php"><button class="btn btn-success"><span class="fa fa-credit-card"></span> Pay Online</button></a>
         <a href="COD.php"><button class="btn btn-success"><span class="fa fa-money"></span> Cash On Delivery</button></a>
      </h1>
      <br><br><br><br>
      <?php
     include 'fotter.php';
     ?>
   </body>
</html>