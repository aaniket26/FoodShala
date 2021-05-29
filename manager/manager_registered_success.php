<html>

  <head>
    <title> FoodShala </title>
      <link rel="stylesheet" type = "text/css" href ="../css/bootstrap.min.css">
      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  </head>

  <body>

  

  <?php
     include 'navbar.php';
     ?>

<?php

require '../connection.php';
$conn = Connect();
$fullname = $conn->real_escape_string($_POST['fullname']);
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$contact = $conn->real_escape_string($_POST['contact']);
$password = $conn->real_escape_string($_POST['password']);

$query = "INSERT into manager(fullname,username,email,contact,password) VALUES('" . $fullname . "','" . $username . "','" . $email . "','" . $contact . "','" . md5($password) ."')";
$success = $conn->query($query);

if (!$success){
  echo "Please try again or maybe user already registerd.";
} 

$conn->close();

?>


<div class="container">
	<div class="jumbotron" style="text-align: center;">
		<h2> <?php echo "Welcome $fullname!" ?> </h2>
		<h1>Your account has been created.</h1>
		<p>Login Now from <a href="index.php">HERE</a></p>
	</div>
</div>

    </body>
</html>