<?php
 $server = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'LRS_system';



 $conn = mysqli_connect($server, $username, $password, $database);


 if (!$conn) {
     echo die("con filed" . mysqli_connect_errno());
 } 


?>