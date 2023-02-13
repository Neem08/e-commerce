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
        $method = isset($_POST['method']);
        $orderid = $_POST["order_id"];
        $amount = $_POST["amount"];
        $dop = $_POST["date"];
        $status = $_POST["status"];
      
         $sql = "INSERT INTO `corder`(`orderid` , `amount`,`dop`)  VALUES (  '$orderid', '$amount', '$dop')";
         $qry = $conn -> query($sql);

         $sql = "INSERT INTO `payment`( `orderid`, `method`,`status`)  VALUES ( '$orderid', '$amount', '$status')";
         $qry = $conn -> query($sql);

         if($qry )
         {
            echo "Payment done successfully!";
            header('Location: common.html');
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            // block of code, to process further...
         }
         else
         {
            //echo "Something went wrong while registration!<BR>";
            //echo "Error Description: ", $conn -> error;
            echo "<h1>Order failed. Invalid orderid.</h1>";
         }
      }
   }
   $conn -> close();
?>