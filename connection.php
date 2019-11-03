<?php
$username = 'root';
$password =  '';
$dsn = 'mysql:host=localhost; dbname=login';

try{
  $conn = new PDO($dsn, $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Failed to connect to database".$e->getMessage();
}
?>