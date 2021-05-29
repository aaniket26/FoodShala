<?php
   include('login_u.php'); 
   
   if(isset($_SESSION['login_user2'])){
   header("location: index.php"); 
   }
   ?>
<!DOCTYPE html>
<head>
   <title> User Login | FoodShala </title>
</head>
<link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
<link rel="stylesheet" type = "text/css" href ="css/index.css">
<link rel="stylesheet" type = "text/css" href ="css/cart.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<?php
     include 'navbar.php';
     ?>
   <div class="container">
      <div class="text-center">
         <h3>Kindly LOGIN to continue.</h3>
      </div>
   </div>
   <div class="container" style="margin-top: 2%; margin-bottom: 2%;">
      <div class="col-md-5 col-md-offset-4">
         <label style="margin-left: 5px;color: red;"><span> <?php echo $error;  ?> </span></label>
         <div class="panel panel-primary">
            <div class="panel-heading">Customer Login </div>
            <div class="panel-body">
               <form action="" method="POST">
                  <div class="row">
                     <div class="form-group col-xs-12">
                        <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
                        <div class="input-group">
                           <span class="input-group-btn">
                           <label class="btn btn-primary"><span class="fa fa-user" aria-hidden="true"></label>
                           </span>
                           </span>
                           <input class="form-control" id="username" type="text" name="username" placeholder="Username" required="" autofocus="">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-xs-12">
                        <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
                        <div class="input-group">
                           <span class="input-group-btn">
                           <label class="btn btn-primary"><span class="fa fa-lock" aria-hidden="true"></span></label>
                           </span>
                           <input class="form-control" id="password" type="password" name="password" placeholder="Password" required="">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-xs-4">
                        <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Submit</button>
                     </div>
                  </div>
                  <label style="margin-left: 5px;">or</label> <br>
                  <label style="margin-left: 5px;"><a href="customersignup.php">Create a new account.</a></label>
               </form>
            </div>
         </div>
      </div>
   </div>
   <?php
     include 'fotter.php';
     ?>
</body>
</html>