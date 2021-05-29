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
        <h2 class="mb-4">My Restaurant</h2>
                  <?php
                     // Storing Session
                     $user_check=$_SESSION['login_user1'];
                     $sql = "SELECT * FROM restaurants r WHERE r.M_ID='$user_check'";
                     $result = mysqli_query($conn, $sql);
                     if (mysqli_num_rows($result) > 0) {
                     
                     while ($row1 = mysqli_fetch_array($result))
                     {
                     
                       ?>
                       <div class="row">
                          <div class="col-lg-6">
                            <b>Restaurant Name <span class="float-right">:</span></b>
                          </div>
                           <div class="col-lg-6">
                            <?php echo $row1["name"]; ?>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-lg-6">
                            <b>Email <span class="float-right">:</span></b>
                          </div>
                           <div class="col-lg-6">
                            <?php echo $row1["email"]; ?>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-lg-6">
                            <b>Contact <span class="float-right">:</span></b>
                          </div>
                           <div class="col-lg-6">
                            <?php echo $row1["contact"]; ?>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-lg-6">
                            <b>Address <span class="float-right">:</span></b>
                          </div>
                           <div class="col-lg-6">
                            <?php echo $row1["address"]; ?>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-lg-6">
                            <b>Manager username <span class="float-right">:</span></b>
                          </div>
                           <div class="col-lg-6">
                            <?php echo $row1["M_ID"]; ?>
                          </div>
                       </div>
                       

                  <br>
                  <?php } } else {
                    echo "<div style='color: red; font-size: 18px'>Please add restaurant now. <a href='add_restaurant.php' style='color: #499D44'>click here</a></div>";
                  } 
                  ?>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>