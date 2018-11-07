<?php
    
    
    include 'dbConnection.php';
    include 'functions.php';
$dbConn = getDatabaseConnection("project");

session_start();
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    if(isset($_POST['itemName'])) {
        //Storing the POST values into an array for later use
        $newItem = array();
        $newItem['name'] = $_POST['itemName'];
        $newItem['price'] = $_POST['itemPrice'];
        $newItem['image'] = $_POST['itemImage'];
        $newItem['id'] = $_POST['itemId'];
        
        //Checking to see if this is already in our cart
        //We use &$item to pass by reference
        foreach($_SESSION['cart'] as &$item) {
            if ($newItem['id'] == $item['id']) {
                $item['quantity'] += 1;
                $found = true;
            }
        }
        
        if ($found != true) {
            $newItem['quantity'] = 1;
            array_push($_SESSION['cart'], $newItem);
        }
    }
    
    
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
        echo "<br>";
        
        
        
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Products Page</title>
    </head>
    <body>
    <div class='container'>
        <div class='text-center'>
            
            <!-- Bootstrap Navagation Bar -->
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>Shopping Land</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='scart.php'>
                        <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>
                        </span> Cart: <?php displayCartCount(); ?> </a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
            
            <!-- Search Form -->
            <form enctype="text/plain">
                <div class="form-group">
                    <label for="pName">Product Name</label>
                    <input type="text" class="form-control" name="query" id="pName" placeholder="Name">
                </div>
                <input type="submit" value="Submit" class="btn btn-default">
                <br /><br />
            </form>
            
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
            
            
            
            
            
            <!-- Display Search Results -->
                  <?php filterProducts(); ?>   
                 <?php displayCart(); ?>
                       
                        
        </div>
    </div>
    </body>
    
    
    
  
 <figure>
                <img src="img/bv.png" alt="Buddy Badge" />
                
            </figure>
 
 

    
    
    
</html>
    