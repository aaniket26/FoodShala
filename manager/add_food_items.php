<?php
   include('session_m.php');
   
   if(!isset($login_session)){
   header('Location: managerlogin.php'); // Redirecting To Home Page
   }
   
   ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard | FoodShala</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <div class="wrapper d-flex align-items-stretch">
    <?php
     include 'navbar1.php';
     ?>

                 <div class="col-xs-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="add_food_items1.php" method="POST" enctype="multipart/form-data">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW FOOD ITEM HERE </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Food name" required="">
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="price" name="price" placeholder="Your Food Price (INR)" required="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="description" name="description" placeholder="Your Food Description" required="">
          </div>

          <div class="form-group">
                          <select name="category_name" id="category_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option>--Select Category--</option>
                                                 <?php $ssql ="select * from category";
                          $cat=mysqli_query($conn, $ssql); 
                          while($row=mysqli_fetch_array($cat))  
                          {
                                                       echo' <option value="'.$row['c_name'].'">'.$row['c_name'].'</option>';;
                          }  
                                                 
                          ?> 
                           </select>
                                                </div>

          <div class="form-group">
            <label>Food Image</label>
            <input type="file" class="form-control" name="images_path" required="">
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> ADD FOOD </button>    
      </div>
        </form>

        
        </div>
      
    </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>