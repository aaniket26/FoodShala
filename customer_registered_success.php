<html>
   <head>
      <title> Registered successfully | FoodShala </title>
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
         require 'connection.php';
         $conn = Connect();
         
         $fullname = $conn->real_escape_string($_POST['fullname']);
         $username = $conn->real_escape_string($_POST['username']);
         $email = $conn->real_escape_string($_POST['email']);
         $contact = $conn->real_escape_string($_POST['contact']);
         $category = $conn->real_escape_string($_POST['category']);
         $address = $conn->real_escape_string($_POST['address']);
         $password = $conn->real_escape_string($_POST['password']);
         
         $query = "INSERT into customer(fullname,username,email,contact,category,address,password) VALUES('" . $fullname . "','" . $username . "','" . $email . "','" . $contact . "','" . $category . "','" . $address ."','" . md5($password) ."')";
         $success = $conn->query($query);
         
         if (!$success){
          die("Couldnt enter data: ".$conn->error);
         }
         
         $conn->close();
         
         ?>
      <div class="container">
         <div class="jumbotron" style="text-align: center;">
            <h2> <?php echo "Welcome $fullname!" ?> </h2>
            <h1>Your account has been created.</h1>
            <p>Login Now from <a href="customerlogin.php">HERE</a></p>
         </div>
      </div>
      <?php
     include 'fotter.php';
     ?>
   </body>
</html>