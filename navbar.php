<nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php">FoodShala</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li class="active" ><a href="index.php">Home</a></li>
                  <li><a href="cart.php"><span class="fa fa-shopping-cart"> Cart</span>
                     (<?php
                        if(isset($_SESSION["cart"])){
                        $count = count($_SESSION["cart"]); 
                        echo "$count"; 
                        }
                        else
                          echo "0";
                        ?>)
                     </a>
                  </li>
               </ul>
               <?php
                  if (isset($_SESSION['login_user2'])) {
                   ?>
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="profile.php"><span class="fa fa-user"></span> <?php echo $_SESSION['login_user2']; ?> </a></li>
                  <li><a href="logout_u.php"><span class="fa fa-sign-out"></span> Log Out </a></li>
               </ul>
               <?php        
                  }
                  else {
                  
                    ?>
               <ul class="nav navbar-nav navbar-right">
                  <li> <a href="customerlogin.php">Login</a></li>
                  <li> <a href="customersignup.php">Sign up</a></li>
                  <li><a href="manager/index.php">Rest. Login</a></li>
                  <li><a href="manager/managersignup.php">Rest. Signup</a></li>
                  
               </ul>
               <?php
                  }
                  ?>
            </div>
         </div>
      </nav>