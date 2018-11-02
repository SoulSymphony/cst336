<?php 
function getDatabaseConnection(){
    $host = "localhost";
    $username = "alex";
    $password = "testpw";
    $dbname = "c9";
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
  }
?>