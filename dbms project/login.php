<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Miniproject</title>
  </head>
  <body  style="background-color: #a6d5cb;" >
  <nav class="navbar navbar-light" style=" background-color: #16a083 ;">
  <a class="navbar-brand" href="#" font-color:#0d9455 >Online grocery shopping</a>
 

  <span class="navbar-text">
  <span class="navbar-text">
            <a href="http://localhost/forphp/main.html">Main page&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a href="http://localhost/forphp/login.html">Log-in&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a href="http://localhost/forphp/register.html">Sign-up&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a href="http://localhost/forphp/payment.html">Order&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </span>

</nav>

<div class="container mt-4">
<h3>Please Login Here:</h3>
<hr>

<form action="/forphp/login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
  </div>
  <!--
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
   -->
  <button type="submit" class="btn" style=" background-color:#0d9455 ;">Submit</button>
</form>
</body>
</html>



<?php
   include("connection.php");  
   $username = $_POST['username'];  
   $password = $_POST['password'];  
     
       //to prevent from mysqli injection  
       $username = stripcslashes($username);  
       $password = stripcslashes($password);  
       $username = mysqli_real_escape_string($con, $username);  
       $password = mysqli_real_escape_string($con, $password);  
     
       $sql = "select * from customer where username = '$username' and password = '$password'";  
       $result = mysqli_query($con, $sql);  
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
       $count = mysqli_num_rows($result);  
         
       if($count == 1){  
           echo "<h1><center> Login successful </center></h1>"; 
           header('Location: common.html');
       }  
       else{  
           echo "<h1> Login failed. Invalid username or password.</h1>";  
       }     
?>