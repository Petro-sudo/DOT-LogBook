<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "wilms";
    $con=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$con){
          die('Could not Connect the DataBase:'.mysql_err());
        }
?>