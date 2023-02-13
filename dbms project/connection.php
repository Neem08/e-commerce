[11:39 am, 11/02/2023] Rashmi: <?php      
    $host = "localhost";  
    $user = "root";  
    $password = 'A5122a@3';  
    $db_name = "project";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>
