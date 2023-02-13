<?php
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      $server = "localhost";
      $user = "root";
      $pass = "A5122a@3";
      $db = "project";
      
      $conn = new mysqli($server, $user, $pass, $db);
      
      if($conn -> connect_errno)
      {
         echo "Database connection failed!<BR>";
         echo "Reason: ", $conn->connect_error;
         exit();
      }
      else
      {
        $username = $_POST["username"];
        $uname = $_POST["uname"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $pincode = $_POST["pincode"];
        $ph_no = $_POST["ph_no"];
      
         $sql = "INSERT INTO `customer`(`username`, `uname`, `password`,`address`, `city`, `state` , `pincode` , `ph_no`)
            VALUES (  '$username', '$uname', '$password' , '$address', '$city', '$state' , '$pincode' , '$ph_no' )";
         
         $qry = $conn -> query($sql);
         if($qry)
         {
            echo "Registration done successfully!";
            header('Location: common.html');
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            // block of code, to process further...
         }
         else
         {
            //echo "Something went wrong while registration!<BR>";
            //echo "Error Description: ", $conn -> error;
            echo "<h1>Registration failed. Invalid username.</h1>";
         }
      }
   }
   $conn -> close();
?>