<?php

	#  https://www.w3schools.com/php/php_mysql_select.asp
 
    $host = 'mysql-server'; // tên mysql server
    $user = 'root';
    $pass = 'root';
    $db = 'users'; // tên databse

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die('Không thể kết nối database: ' . $conn->connect_error);
    }

	
    
	$sql = "SELECT * from user";
    $sql = "SELECT * from account";
    $run = mysqli_query($conn,$sql);
    
?>
