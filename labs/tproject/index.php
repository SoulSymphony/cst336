


<?php

include 'dbConnection.php';
$dbConn = getDatabaseConnection("project");

// function displayCategories() { 
//     global $dbConn;
    
//     $sql = "SELECT * FROM proj_movies ORDER BY genName";
//     $stmt = $dbConn->prepare($sql);
//     $stmt->execute();
//     $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     //well update!!!
    
//     foreach ($records as $record) {
//         echo "<option value='".$record['catId']."'>" . $record['catName'] . "</option>";
//     }
// }


function displayGenres() { 
    global $dbConn;
    
    $sql = "SELECT * FROM proj_genres ORDER by genName";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<option value='".$record['genreId']."'>" . $record['genName'] . "</option>";
    }
}

function filterProducts() {
    global $dbConn;
    $movie = $_GET['movieName'];
    
    if(isset($_GET['searchForm'])) {
    
    echo "<h3>Products Found: </h3>";
    
    $namedParameters = array();
    //$product = $_GET['productName'];
    
    //This SQL works but it doesn't prevent SQL injection (due to single quotes)
    //$sql = "SELECT * FROM om_product 
    //       WHERE productName LIKE '%$product%'";
    
    $sql = "SELECT * FROM proj_movies WHERE 1"; //Getting all records from database
    
    if(!empty($product)){
        //This SQL prevents SQL INJECTION by using a named parameter 
        $sql .= " AND title LIKE :movie 
                  OR actors LIKE :movie";
        $namedParameters[':movie'] = "%$movie%";
    }
    
    if(!empty($_GET['genre'])){
        //This SQL prevents SQL INJECTION by using a named parameter
        $sql .= " AND genreId = :genre";
        $namedParameters[':genre'] = $_GET['genre'];
    }
    
    if (isset($_GET['orderBy'])) {
        
        if($_GET['orderBy'] == "nameOrder") {
            $sql .= " ORDER BY title";
        } else {
            $sql .= " ORDER BY year";
        }
        
    }
    
    
    
     
    if (isset($_GET['orderBya'])) {
        
        if ($_GET['orderBya'] == "A-Z") {
            
        $sql .= " ORDER BY title";
        echo "works";
        } 
        
        else
        {
        // $sql .= "ORDER BY productName DESC";
       $sql= "SELECT * FROM proj_movies ORDER BY title DESC";
        //if i need to do
        
        }
        
        
    }
    
    
    
    
    
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    
    
    foreach($records as $record){
        
        // echo "<a href='movieInfo.php?movId=".$record['movId']."'>";
        echo $record['title'];
        // echo "</a> ";
        // echo $record['director'] . " " . $record['actors'] . "<br>";
        // echo "<br>";
        
    }
    
    }
    
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Ottermart Product Search</title>
        
        <style>
            @import url("css/styles.css");
        </style>
        
        
    </head>
    <body>
        
        <h1> Ottermart </h1>
        <h2> Product Search </h2>
        
        <form>
            
            Product: <input type="text" name="productName" placeholder="Product keyword" /> <br />
            
            Category: 
            <select name="category">
               <option value=""> Select one </option>  
               <?= displayGenres() ?>
            </select>
            
            Price: From: <input type="text" name="priceFrom"  /> 
             To: <input type="text" name="priceTo"  />
            <br>
            Order By:
            A-Z <input type="radio" name="orderBya" value="A-Z">
            Z-A <input type="radio" name="orderBya" value="Z-A">
            <br>
            <input type="submit" name="searchForm" value="Search!"/>
        </form>
        <br>
        <hr>
        
        <?= filterProducts() ?>
        
  


    </body>
</html>