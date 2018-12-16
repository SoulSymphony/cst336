


<?php
function startConnection($dbName) {
$host = "localhost";
$dbname = $dbName;
$username = "root";
$password = "";
//checks whether the URL contains "herokuapp" (using Heroku)
if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
   $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
   $host = $url["host"];
   $dbname = substr($url["path"], 1);
   $username = $url["user"];
   $password = $url["pass"];
}


  $host ="us-cdbr-iron-east-05.cleardb.net";
   $dbname = "heroku_7c4fa413429fa60";
   $username = "baa2ea58b03b5b";
   $password = '9b51e14f';

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
return $dbConn;
}
?>