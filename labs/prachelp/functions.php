<?php
include_once 'database.php';
$dbConn = getDatabaseConnection();

function getQuotes($keyword, $category, $isAtoZ){
    
    $dbConn = $GLOBALS['dbConn'];
    if($isAtoZ){
      $order = "ASC";
    } else {
      $order = "DESC";
    }
    $sql = "SELECT * FROM `p1_quotes` WHERE `category`='".$category."' AND `quote` LIKE '%".$keyword."%' ORDER BY `quote` ".$order.";";
    $statement = $dbConn->prepare($sql); 
    $result = $statement->execute(); 
    
    if (!$result) {
      return null; 
    }
    return ($records = $statement->fetchAll()); 
}

function getCategories(){
    $dbConn = $GLOBALS['dbConn'];
    $sql = "SELECT DISTINCT(category) FROM `p1_quotes`;";
    $statement = $dbConn->prepare($sql); 
    $result = $statement->execute(); 
    
    if (!$result) {
      return null; 
    }
    return ($records = $statement->fetchAll()); 
}


?>

