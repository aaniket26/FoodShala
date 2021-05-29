<?php
   session_start();
   if(isset($_SESSION['login_user1'])){
   header('Location: manager/myrestaurant.php');
   }
   ?>
<html>
   <head>
      <title> DISHES | FoodShala </title>
   </head>
   <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
   <link rel="stylesheet" type = "text/css" href ="css/index.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <body>
   <?php
     include 'navbar.php';
     ?>
      <!-- start: Inner page hero -->
      <?php
         require 'connection.php';
         $conn = connect();
          $ress= mysqli_query($conn,"SELECT * from restaurants where R_ID='$_GET[R_ID]'");
                          $rows=mysqli_fetch_array($ress);
                         
                         ?>
      <section class="inner-page-hero bg-image">
         <div class="profile">
            <div class="container">
               <div class="row">
                  <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                     <div class="image-wrap">
                        <figure><?php echo '<img src="manager/'.$rows['res_img'].'" alt="Restaurant logo">'; ?></figure>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                     <div class="pull-left right-text white-txt">
                        <h6><a href="#"><?php echo $rows['name']; ?></a></h6>
                        <p><?php echo $rows['address']; ?></p>
                        <ul class="nav nav-inline" style="display: inline-flex;">
                           <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min $ 100</a> </li>
                           <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i> 30 min</a> </li>
                           <li class="nav-item ratings">
                              <a class="nav-link" href="#"> <span>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                              </span> </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="container" style="margin: 50px auto;">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <!-- end:Widget menu -->
         <div class="menu-widget" id="2">
            <div class="widget-heading">
               <h3 class="widget-title text-dark">
                  POPULAR ORDERS Delicious hot food!</h3>
            </div>
            <div>
               <?php  // display values and item of food/dishes
                  $stmt = $conn->prepare("SELECT * from food where R_ID='$_GET[R_ID]'");
                  $stmt->execute();
                  $items = $stmt->get_result();
                  if (!empty($items)) 
                  {
                  foreach($items as $item)
                    {
                  
                          
                           
                           ?>
               <div class="food-item">
                  <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <form method="post" action="cart.php?action=add&id=<?php echo $item["F_ID"]; ?>">
                        <div class="rest-logo pull-left">
                           <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="manager/'.$item['images_path'].'" alt="Food logo">'; ?></a>
                        </div>
                        <!-- end:Logo -->
                        <div class="rest-descr">
                           <h6><a href="#"><?php echo $item['name']; ?></a></h6>
                           <p> <?php echo $item['description']; ?></p>
                        </div>
                        <!-- end:Description -->
                     </div>
                     <!-- end:col -->
                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right item-cart-info"> 
                        <span class="price pull-left" >&#8377; <?php echo $item['price']; ?></span>
                        <input class="b-r-0" type="number" name="quantity" max="30"  style="margin-left:30px; width: 70px" value="1" size="2" />
                        <input type="submit" name="add" class="btn theme-btn" style="margin-left:40px;" value="Add to cart" />
                        <input type="hidden" name="hidden_img" value="<?php echo $item["images_path"]; ?>">
                            <input type="hidden" name="hidden_name" value="<?php echo $item["name"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $item["price"]; ?>">
                            <input type="hidden" name="hidden_RID" value="<?php echo $item["R_ID"]; ?>">
                     </div>
                     </form>
                  </div>
                  <!-- end:row -->
               </div>
               <!-- end:Food item -->
               <?php
                  }
                  }
                  
                  ?>
            </div>
         </div>
      </div>
      </section>
      <!-- Site footer -->
      <?php
     include 'fotter.php';
     ?>
   </body>
</html>