<?php
$dbhost ='localhost';
$dbname= 'cursosphp';
$dbuser= 'root';
$dbpassword='';
 try{
$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (Exception $e){
  echo $e->getMessage();
 }

?>
