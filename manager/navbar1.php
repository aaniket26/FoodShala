<nav id="sidebar">
            <div class="p-4 pt-5">
               <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.png);"></a>
               <ul class="list-unstyled components mb-5">
                  <li>
                     <a href="myrestaurant.php">Dashboard</a>
                  </li>
                  <li>
                     <a href="view_food_items.php">View Food Items</a>
                  </li>
                 
                        <li>
                           <a href="add_food_items.php">Add Food Items</a>
                        </li>
                        
                  <li >
                     <a href="add_food_category.php">Add Food Category</a>
                  </li>
                  <li>
                     <a href="view_order_details.php">View Order Details</a>
                  </li>
               </ul>
            </div>
         </nav>
         <!-- Page Content  -->
         <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="container-fluid">
                  <button type="button" id="sidebarCollapse" class="btn btn-primary">
                  <i class="fa fa-bars"></i>
                  <span class="sr-only">Toggle Menu</span>
                  </button>
                  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-bars"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="myrestaurant.php">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Welcome <?php echo $login_session; ?> </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="logout_m.php">Log Out </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>