<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("fproject");
include 'inc/logifunctions.php';
validateSession();

if (isset($_GET['Id'])) {

  $productInfo = getProductInfo($_GET['pId']);    
  //print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Info </title>
    </head>
    <body>
    
    <h3><?=$productInfo['name']?></h3>
     <?=$productInfo['description']?><br>
     <img src='<?=$productInfo['image']?>' height='75'/>
 
    </body>
</html>