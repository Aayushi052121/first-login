<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>my login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
      
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

   
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" action="index.php">

  <?php if (isset($loginMessage)) echo $loginMessage ; ?>

        <h2 class="text-center">Login</h2>
        <label for="inputName" class="sr-only">Name</label>
        <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required>
        <span class="text-danger"><?php if (isset($errEmailMessage)) echo $errEmailMessage; ?></span>
        
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
        <span class="text-danger"><?php if (isset($errEmailMessage)) echo $errEmailMessage; ?></span>
        
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <span class="text-danger"><?php if (isset($errPassMessage)) echo $errPassMessage; ?></span>
         <button name="submit" class="btn btn-success btn-block" type="submit">Login</button>
      </form>
        
    </div> <!-- /container -->
    
    <script src="js/bootstrap.js"></script>
  </body>
</html>

<?php
      $LoginE;
 if (isset($_POST["submit"])) 
    {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errName = false;
            $errEmail = false;
            $errPassword = false;
        
        
            if (!$_POST['name'] || !filter_var($_POST['name'],)) {
                  $errNameMessage = "Please Enter a Valid Email.";
            }

            if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $errEmailMessage = "Please Enter a Valid Name.";
        }

            if (!$_POST['password'] || strlen($_POST['password']) < 5 ) {
                $errPassMessage = "Password should be minimum 5 characters.";
            }



    if (isset($errEmailMessage) || isset($errPassMessage) )
        {
            $loginMessage=  '<div class="container"><div class="alert alert-danger">check a wrong email or password</div></div>';

        }
        else 
            {
             $loginMessage=  '<div class="alert alert-success"> you are log-in</div>'; 
            }
 }

ob_start();

    $conn = new mysqli('localhost','root','', 'aayu');
    if($conn->connect_error)
    {
      die("connection failed: " . $conn->connect_error);
    }
    else
    {
      $stmt = $conn->prepare("insert into login(name , email, password)values(?, ?, ?)");
      $stmt->bind_param("sss", $name, $email, $password);
      $stmt->execute();
      $stmt->close();
      $conn->close();
    }

    if($name !=''&& $email !=''&& $password !='')
    {
      header("Location: second.php");
    }
    else{
        echo "Please fill all fields.....!!!!!!!!!!!!";
    }
?>