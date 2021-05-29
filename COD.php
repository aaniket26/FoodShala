<?php
   session_start();
   require 'connection.php';
   $conn = Connect();
   if(isset($_SESSION['login_user1'])){
     header('Location: manager/myrestaurant.php');
   }
   if(!isset($_SESSION['login_user2'])){
   header("location: customerlogin.php"); 
   }
   
   unset($_SESSION["cart"]);
   ?>
<html>
   <head>
      <title> Cart | FoodShala </title>
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
      <div class="container">
         <div class="jumbotron">
            <h2 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Order Placed Successfully.</h2>
         </div>
      </div>
      <br>
      <h2 class="text-center"> Thank you for Ordering! The ordering process is now complete.</h2>
      <?php 
         $num1 = rand(100000,999999); 
         $num2 = rand(100000,999999); 
         $num3 = rand(100000,999999);
         $number = $num1.$num2.$num3;
         ?>
      <h3 class="text-center" style="margin-bottom: 10%"> <strong>Your Order Number:</strong> <span style="color: blue;"><?php echo "$number"; ?></span> </h3>
      <?php
     include 'fotter.php';
     ?>
   </body>
</html>