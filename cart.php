<?php
   session_start();
   require 'connection.php';
   $conn = Connect();
   if(isset($_SESSION['login_user1'])){
     header('Location: manager/myrestaurant.php');
   }                
   
   ?>
<html>
   <head>
      <title> Cart | FoodShala </title>
   </head>
   <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
   <link rel="stylesheet" type = "text/css" href ="css/index.css">
   <link rel="stylesheet" type = "text/css" href ="css/cart.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <body>
   <?php
     include 'navbar.php';
     ?>
      <?php
         if(!empty($_SESSION["cart"]))
         {
           ?>
      <div class="container">
         <div class="jumbotron">
            <h3>Your Cart</h3>
         </div>
      </div>
      <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
         <table class="table table-striped">
            <thead class="thead-dark">
               <tr>
                  <th width="20%">Food Image</th>
                  <th width="20%">Food Name</th>
                  <th width="10%">Quantity</th>
                  <th width="15%">Price Details</th>
                  <th width="15%">Order Total</th>
                  <th width="10%">Remove</th>
               </tr>
            </thead>
            <?php  
               $total = 0;
               foreach($_SESSION["cart"] as $keys => $values)
               {
               ?>
            <tr>
               <td><img src="manager/<?php echo $values["images_path"]; ?>" class="img-responsive" style="width: 100px; height: 75px"></td>
               <td><?php echo $values["food_name"]; ?></td>
               <td><?php echo $values["food_quantity"] ?></td>
               <td>&#8377; <?php echo $values["food_price"]; ?></td>
               <td>&#8377; <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
               <td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php 
               $total = $total + ($values["food_quantity"] * $values["food_price"]);
               }
               ?>
            <tr>
               <td colspan="4" align="right">Total</td>
               <td colspan="1" align="right">&#8377; <?php echo number_format($total, 2); ?></td>
            </tr>
         </table>
         <?php
            echo '<a href="cart.php?action=empty"><button class="btn btn-danger"><span class="fa fa-trash"></span> Empty Cart</button></a>&nbsp;<a href="index.php"><button class="btn btn-warning">Continue Shopping</button></a>&nbsp;<a href="payment.php"><button class="btn btn-success pull-right"><span class="fa fa-share-alt"></span> Check Out</button></a>';
            ?>
      </div>
      <br><br><br><br><br><br><br>
      <?php
         }
         if(empty($_SESSION["cart"]))
         {
           ?>
      <div class="container cart-empty-body">
         <div class="row">
            <div class="col-md-12">
               <div class="card mt-100">
                  <div class="card-body cart">
                     <div class="col-sm-12 empty-cart-cls text-center">
                        <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4>
                        <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
      <?php
         }
         ?>
      <?php
         if(isset($_POST["add"]))
         {
         if(isset($_SESSION["cart"]))
         {
         $item_array_id = array_column($_SESSION["cart"], "food_id");
         if(!in_array($_GET["id"], $item_array_id))
         {
         $count = count($_SESSION["cart"]);
         
         $item_array = array(
         'food_id' => $_GET["id"],
         'images_path' => $_POST["hidden_img"],
         'food_name' => $_POST["hidden_name"],
         'food_price' => $_POST["hidden_price"],
         'R_ID' => $_POST["hidden_RID"],
         'food_quantity' => $_POST["quantity"]
         );
         $_SESSION["cart"][$count] = $item_array;
         echo '<script>window.location="cart.php"</script>';
         }
         else
         {
         echo '<script>alert("Products already added to cart")</script>';
         echo '<script>window.location="cart.php"</script>';
         }
         }
         else
         {
         $item_array = array(
         'food_id' => $_GET["id"],
         'images_path' => $_POST["hidden_img"],
         'food_name' => $_POST["hidden_name"],
         'food_price' => $_POST["hidden_price"],
         'R_ID' => $_POST["hidden_RID"],
         'food_quantity' => $_POST["quantity"]
         );
         $_SESSION["cart"][0] = $item_array;
         }
         }
         if(isset($_GET["action"]))
         {
         if($_GET["action"] == "delete")
         {
         foreach($_SESSION["cart"] as $keys => $values)
         {
         if($values["food_id"] == $_GET["id"])
         {
         unset($_SESSION["cart"][$keys]);
         echo '<script>alert("Food has been removed")</script>';
         echo '<script>window.location="cart.php"</script>';
         }
         }
         }
         }
         
         if(isset($_GET["action"]))
         {
         if($_GET["action"] == "empty")
         {
         foreach($_SESSION["cart"] as $keys => $values)
         {
         
         unset($_SESSION["cart"]);
         echo '<script>alert("Cart is made empty!")</script>';
         echo '<script>window.location="cart.php"</script>';
         
         }
         }
         }
         
         
         ?>
      <?php
         ?>
      <?php
     include 'fotter.php';
     ?>
   </body>
</html>