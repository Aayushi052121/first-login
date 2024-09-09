<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="first.css">
    <link rel="database" href="login.php"> 
</head>
<body>
    <section>
        <div class="box">
        <div class="form">  
            <h1> Login </h1>
            <form>
                 <label>Name</label>
                 <div class = inputBox>
                   <input type="text" >
                 </div>
               
                 <label>Email</label>
                 <div class = inputBox>
                   <input type="text" >
                 </div>

                 <label>Password</label>
                 <div class = inputBox>
                   <input type="text" >
                 </div>  
               <input type= submit>
            <form>
            </div>
    </section>
</body>
</html>

<?php
ob_start();

if(isset($_POST)){
    $_Username = $_POST['username'];
    $_Password = $_POST['password'];

    $_conn = new mysqli('localhost', 'root', 'Aayu');
    if($_conn->connect_error)
    {
      die("connection failed: " . $conn->connect_error);
    }
    else
    {
      $stmt = $conn->prepare("insert into login( Name , Email, Password)values(?, ?)");
      $stmt->bind_param("ss",$Name, $Email, $Password);
      $stmt->execute();
      $stmt->close();
      $conn->close();
    }
    if($Name !=''&& $Email !=''&& $Password !='')
    {
      header("Location:second.php");
    }
    else{
        echo "Please fill all fields.....!!!!!!!!!!!!";
    }

}
?>