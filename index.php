<?php
   session_start();
   if(isset($_SESSION['login_user1'])){
   header('Location: manager/myrestaurant.php');
   }
   ?>
<html>
   <head>
      <title> HOME | FoodShala </title>
   </head>
   <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
   <link rel="stylesheet" type = "text/css" href ="css/index.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <body>
   <?php
     include 'navbar.php';
     ?>
      <!-- Display banner image -->
      <div class="banner-image">
         <div class="banner-text">
            <h1>FoodShala</h1>
            <p>We offer a highly seasonal and continuously</br>
             evolving tasting menu experience</p>
            <a href="#foodlist"><button>VIEW MENU</button></a>
         </div>
      </div>
      <div class="container allfoodlist" id="foodlist">
         <div class="text-center recommend-food">
            <h3>Seasonal Food Items</h3>
            <p class="text-dark">Order what do you like !</p>
         </div>
         <!-- Display all Food from food table -->
         <?php
            require 'connection.php';
            $conn = connect();

            $sql = "SELECT * FROM food WHERE options = 'ENABLE' LIMIT 16";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0)
            {
              $count=0;
            
              while($row = mysqli_fetch_assoc($result)){
                if ($count == 0)
                  echo "<div class='row'>";
            
            ?>
         <div class="col-md-4">
            <form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
               <div class="main">
                  <ul class="cards">
                     <li class="cards_item">
                        <div class="card">
                           <div class="card_image"><img src="manager/<?php echo $row["images_path"]; ?>" class="img-responsive" style="height: 175px; width: 100%"></div>
                           <div class="card_content">
                              <div class="row">
                                 <div class="col-lg-6 col-md-6">
                                    <h2 class="card_title"><?php echo $row["name"]; ?> <span>(<?php echo $row["category_name"]; ?>)</span></h2>
                                 </div>
                                 <div class="col-lg-6 col-md-6">
                                    <p class="card_text text-dark blue" style="float: right;"><?php echo $row["R_Name"]; ?></p>
                                 </div>
                              </div>
                              <p class="card_text text-center"><?php echo $row["description"]; ?></p>
                              <p class="card_text text-center">Price: &#8377; <?php echo $row["price"]; ?>/-</p>
                              <h5 class="text-info quantity text-center">
                                 <p>Quantity:</p>
                                 <input type="number" min="1" max="20" name="quantity" class="form-control" value="1" style="width: 60px;"> 
                              </h5>
                              <input type="hidden" name="hidden_img" value="<?php echo $row["images_path"]; ?>">
                              <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                              <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                              <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
                              </br>
                              <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </form>
         </div>
         <?php
            $count++;
            if($count==3)
            {
              echo "</div>";
              $count=0;
            }
            }
            ?>
      </div>
      <?php
         }
         else
         {
           ?>
      <div class="container">
         <div class="jumbotron">
            <center>
               <label style="margin-left: 5px;color: red;">
                  <h1>Oops! No food is available.</h1>
               </label>
               <p>Stay Hungry...!</p>
            </center>
         </div>
      </div>
      <?php
         }
         
         ?>
      </div>
      <div class="container allfoodlist" id="foodlist">
         <div class="text-center recommend-food">
            <h3>Famous Restaurant near us</h3>
            <p class="text-dark">Order food from your favourite restaurants!</p>
         </div>
         <!-- Display all Food from food table -->
         <?php
            $sqm = "SELECT * FROM restaurants ORDER BY RAND()";
            
            $results = mysqli_query($conn, $sqm);
            
            if (mysqli_num_rows($results) > 0)
            {
              $count=0;
            
              while($row = mysqli_fetch_assoc($results)){
                if ($count == 0)
                  echo "<div class='row'>";
            
            ?>
         <div class="col-md-3">
            <form method="post" action="dishs.php?R_ID=<?php echo $row["R_ID"]; ?>">
               <div class="main">
                  <ul class="cards">
                     <li class="cards_item">
                        <div class="card">
                           <div class="card_image"><img src="manager/<?php echo $row["res_img"]; ?>"></div>
                           <div class="card_content">
                              <h2 class="card_title"><?php echo $row["name"]; ?></h2>
                              <p class="card_text"><?php echo $row["address"]; ?></p>
                              <div class="rating">
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="clock"> <i class="fa fa-motorcycle"></i> 30 min</span>
                              </div>
                              <button class="btn card_btn">View Restaurant</button>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </form>
         </div>
         <?php
            $count++;
            if($count==4)
            {
              echo "</div>";
              $count=0;
            }
            }
            ?>
      </div>
      <?php
         }
         else
         {
           ?>
      <div class="container">
         <div class="jumbotron">
            <center>
               <label style="margin-left: 5px;color: red;">
                  <h1>Oops! No Restaurant is available.</h1>
               </label>
               <p>Stay Hungry...!</p>
            </center>
         </div>
      </div>
      <?php
         }
         
         ?>
      </div>
      <!-- Site footer -->
      <?php
     include 'fotter.php';
     ?>

   </body>
</html>