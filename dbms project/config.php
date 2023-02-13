<?php


define('DB_SERVER', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'miniproject');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}


/*

//This script will handle login
session_start();

//echo "Connecting front end to database<br>" ;

$servername="localhost:3307";
$username = "root@" ;
$password = "" ;
$database = "miniproject";


$conn = mysqli_connect($servername, $username , $password , $database  );

if(!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "connection successfull";
}

*/


?>