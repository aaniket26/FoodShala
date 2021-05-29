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
      <style type="text/css">
         .card {
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
         max-width: 400px;
         margin: 50px auto;
         text-align: center;
         font-family: arial;
         padding: 10px;
         }
         .float-right {
         float: right;
         }
         .form-area {
             background-color: #FAFAFA;
             padding: 10px !important;
             margin: 0px 0px 50px;
             border: 1px solid #3C6F9B;
             opacity: 0.9;
         }
      </style>
      <link rel="stylesheet" type = "text/css" href ="css/payment.css">
      <link rel="stylesheet" type = "text/css" href ="css/payment.css">
      <link rel="stylesheet" type = "text/css" href ="css/index.css">
      <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
   <?php
     include 'navbar.php';
     ?>
      <div class="card">
         <?php
            // Storing Session
            $user_check=$_SESSION['login_user2'];
            $sql = "SELECT * FROM customer c WHERE c.username='$user_check'";
            $result = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_array($result))
            {
            
              ?>
         <img src="manager/images/logo.png" alt="John" style="width:30%">
         <div class="row" style="margin-top: 20px">
            <div class="col-lg-6 col-md-6 col-sm-6">
               <b> Name <span class="float-right">:</span></b>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
               <?php echo $row["fullname"]; ?>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
               <b>Username <span class="float-right">:</span></b>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
               <?php echo $row["username"]; ?>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
               <b>Email <span class="float-right">:</span></b>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
               <?php echo $row["email"]; ?>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
               <b>Contact <span class="float-right">:</span></b>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
               <?php echo $row["contact"]; ?>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
               <b>Address <span class="float-right">:</span></b>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
               <?php echo $row["address"]; ?>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
               <b>Category <span class="float-right">:</span></b>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
               <?php echo $row["category"]; ?>
            </div>
         </div>
         <br>
         <?php }  ?>
      </div>

      <section class="container">
      <div class="col-lg-12">
         <div class="form-area">
            <form action="" method="POST">
               <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> My Orders</h3>
               <?php
                  // Storing Session
                  $user_check=$_SESSION['login_user2'];
                  $sql = "SELECT * FROM orders o WHERE o.username='$user_check' ORDER BY F_ID";
                  $result = mysqli_query($conn, $sql);
                  
                  
                  if (mysqli_num_rows($result) > 0)
                  {
                  
                    ?>
               <table class="table table-striped">
                  <thead class="thead-dark">
                     <tr>
                        <th> Food ID </th>
                        <th> Food Name </th>
                        <th> Price </th>
                        <th> Quantity </th>
                        <th> Order Date </th>
                     </tr>
                  </thead>
                  <?PHP
                     //OUTPUT DATA OF EACH ROW
                     while($row = mysqli_fetch_assoc($result)){
                     ?>
                  <tbody>
                     <tr>
                        <td><?php echo $row["F_ID"]; ?></td>
                        <td><?php echo $row["foodname"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["order_date"]; ?></td>
                     </tr>
                  </tbody>
                  <?php } ?>
               </table>
               <br>
               <?php } else { ?>
               <h4 style="color: red">
                  <center>No Orders Yet.</center>
               </h4>
               <?php } ?>
            </form>
         </div>
      </div>
   </section>



   <?php
     include 'fotter.php';
     ?>
   </body>
</html>