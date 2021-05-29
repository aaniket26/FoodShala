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

            <div class="col-lg-12">
      <div class="form-area">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> YOUR FOOD ITEMS LIST </h3>


<?php




// Storing Session
$user_check=$_SESSION['login_user1'];
$sql = "SELECT * FROM food f WHERE f.R_ID IN (SELECT r.R_ID FROM restaurants r WHERE r.M_ID='$user_check') ORDER BY F_ID";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0)
{

  ?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>Food Image  </th>
        <th> Food ID </th>
        <th> Food Name </th>
        <th> Price </th>
        <th> Description </th>
        <th> Restaurant ID </th>
      </tr>
    </thead>

    <?php
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <img src="<?php echo $row["images_path"]; ?>" width="70px"> </td>
      <td><?php echo $row["F_ID"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["price"]; ?></td>
      <td><?php echo $row["description"]; ?></td>
      <td><?php echo $row["R_ID"]; ?></td>
    </tr>
  </tbody>
  
  <?php } ?>
  </table>
    <br>


  <?php } else { ?>

  <h4><center>0 RESULTS</center> </h4>
  <div style='color: red; font-size: 18px'>Add food now. <a href='add_food_items.php' style='color: #499D44'>click here</a></div>

  <?php } ?>

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