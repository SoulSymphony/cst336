<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("fproject");

function displayGenres() { 
    global $dbConn;
    
    $sql = "SELECT * FROM proj_sel ORDER by genType";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<option value='".$record['chooseId']."'>" . $record['genType'] . "</option>";
        echo $record['genType'];
    }
}


function filterMovies() {
    global $dbConn;
    $movie = $_GET['movieName'];
    
    if(isset($_GET['searchForm'])) {
        
        echo "<h3>Pokemon Found: </h3>";
        
        $namedParameters = array();
        //$product = $_GET['productName'];
        
        //This SQL works but it doesn't prevent SQL injection (due to single quotes)
        //$sql = "SELECT * FROM om_product 
        //       WHERE productName LIKE '%$product%'";
        
        $sql = "SELECT * FROM proj_rec WHERE 1"; //Getting all records from database
        
        if(!empty($movie)){
            //This SQL prevents SQL INJECTION by using a named parameter 
            $sql .= " AND (name LIKE :movie 
                      OR evolution LIKE :movie
                      OR legendary LIKE :movie)";
            $namedParameters[':movie'] = "%$movie%";
        }
        
        if(!empty($_GET['types'])){
            //This SQL prevents SQL INJECTION by using a named parameter
            $sql .= " AND type = :types";
            $namedParameters[':types'] = $_GET['types'];
        }
        
        if (isset($_GET['searchBy'])) {
            
            if($_GET['searchBy'] == "nameOrder") {
                $sql .= " ORDER BY name";
            } else if($_GET['searchBy'] == "weightOrder") {
                $sql .= " ORDER BY weight";
            } else {
                $sql .= " ORDER BY year";
            }
            
            if (isset($_GET['orderBy'])) {
            
                if($_GET['orderBy'] == "dc") {
                    $sql .= " DESC";
                } else {
                    $sql .= " ASC";
                }
                
            }
            
        }
        
        //}
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($records);
        
        
        //Creating a table
        echo "<table class='table'>";
        
        foreach($records as $record){
            
            // echo "<a href='movieInfo.php?movId=".$record['movId']."'>";
            // echo $record['title'];
            // echo "</a> ";
            // echo "<br>";
            // echo "Director: " . $record['director'] . "<br> Starring: " . $record['actors'] . "<br>";
            // echo "<br>";
            
            
            //Putting them in variables to avoid having to concatenate strings later
            $itemName = $record['name'];
            $itemDirector = $record['legendary'];
            $itemActors = $record['evolution'];
            $itemImage = $record['image'];
            $itemId = $record['pId'];
            $itemRating = $record['weight'];
            $itemYear = $record['year'];
            $itemType = $record['type'];
            
            //Displaying things as a table
            echo "<tr>";
            echo "<td> <img src='$itemImage' width=50> </td>";
            echo "<td> <h4> <a href='movieInfo.php?movId=".$record['movId']."'> $itemName </a> </h4> </td>";
            echo "<td> <h4>Type: $itemType</h4> </td>";
            echo "<td> <h4>Year: $itemYear</h4> </td>";
            echo "<td> <h4>Legendary: $itemDirector</h4> </td>";
            echo "<td> <h4>Evolution Stage: $itemActors</h4> </td>";
            echo "<td> <h4>Weight: $itemRating lbs</h4> </td>";
            
            
            //Hidden elements
            echo "<form method='POST'>";
            echo "<input type='hidden' name='itemName' value='$itemName'>";
            echo "<input type='hidden' name='itemType' value='$itemType'>";
            echo "<input type='hidden' name='itemDirector' value='$itemDirector'>";
            echo "<input type='hidden' name='itemActors' value='$itemActors'>";
            echo "<input type='hidden' name='itemRating' value='$itemRating'>";
            echo "<input type='hidden' name='itemImage' value='$itemImage'>";
            echo "<input type='hidden' name='itemYear' value='$itemYear'>";
            echo "<input type='hidden' name='itemId' value='$itemId'>";
            
            //Check to see if the item we added is the most recent POST itemId
            //and change button accordingly
            // if ($_POST['itemId'] == $itemId) {
            //     echo "<td> <button class='btn btn-success'> Added </button> </td>";
            // } else {
            //     echo "<td> <button class='btn btn-warning'> Add </button> </td>";
            // }
            echo "</form>";
            
            
            echo "</tr>";
            
        }
        
        echo "</table>";
    
    }
    
}



function displayCart(){
    if(isset($_SESSION['cart'])) {
        
        echo "<table class='table'>";
        foreach ($_SESSION['cart'] as $item) {

            $itemId = $item['id'];
            $itemQuant = $item['quantity'];
            
            echo "<tr>";
            
            //display data for item
            echo "<td><img src ='" .$item['img']. "'></td>";
            echo "<td><h4> <a href='movieInfo.php?movId=".$item['id']."'> ".$item['name']." </a> </h4></td>";
            echo "<td><h4>" .$item['director']. "</h4></td>";
            echo "<td><h4>" .$item['actors']. "</h4></td>";
            echo "<td><h4>" .$item['rating']. " Stars</h4></td>";
            
            //update for this item
            echo '<form method = "post">';
            echo "<input type ='hidden' name='itemId' value ='$itemId'>";
            echo "<td><input type='text' name ='update' class = 'form-control' placeHolder= '$itemQuant'></td>";
            echo '<td><button class = "btn btn-danger">Update</button></td>';
            echo '</form>';
            
            //deletion
            echo "<form method = 'post'>";
            echo "<input type = 'hidden' name='removeId' value = '$itemId'>";
            echo "<td><button class = 'btn btn-danger'>Remove</button></td>";
            echo '</form>';
        
            echo '</tr>';
        }
        echo "</table>";
        
        //delete all
        echo "<form method = 'post'>";
        echo "<input type = 'hidden' name='removeAll' value = '1'>";
        echo "<button class = 'btn btn-danger'>Remove All</button>";
        echo '</form>';
    }
}



function displayCartCount() {
    //echo count($_SESSION['cart']);
    
    $cartTotal = 0;
    
    if(isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $cartTotal += $item['quantity'];
        }
    }
    
    echo $cartTotal;
}



function addRemove() {
    //if rmoveId sent, search cart for itemId
    if (isset($_POST['removeId'])) {
        foreach ($_SESSION['cart'] as $itemKey => $item){
            if($item['id'] == $_POST['removeId']) {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    if(isset($_POST['itemId'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $_POST['itemId']) {
                $item['quantity'] = $_POST['update'];
            }
        }
    }
    
    if (isset($_POST['removeAll'])) {
        if($_POST['removeAll'] == 1) {
            $_SESSION['cart'] = array();
            unset($_POST['removeAll']);
        }
    }
}



function displayProductInfo(){
    global $dbConn;
    
    
    $movId = $_GET['pId'];
    $sql = "SELECT *
            FROM proj_rec
            WHERE pId = $pId";
    //NATURAL RIGHT JOIN om_product
    
    //$np = array();
    //$np[$movId] = $movId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetchAll returns an Array of Arrays
    
    //echo $records[0]['productName'] . "<br>";
    echo "<img src='" . $records[0]['image'] . "'  width='200'/><br>";
    
    foreach ($records as $record) {
        echo "<br><br>";
        echo "<strong>Title:</strong>";
        echo "<br>";
        echo $record[title];
        echo "<br><br>";
        echo "<strong>Year:</strong>";
        echo "<br>";
        echo $record[year]; 
        echo "<br><br>";
        echo "<strong>Directed by:</strong>"; 
        echo "<br>";
        echo $record[director]; 
        echo "<br><br>";
        echo "<strong>Starring:</strong>"; 
        echo "<br>";
        echo $record[actors]; 
        echo "<br><br>";
        echo "<strong>Rating:</strong>";
        echo "<br>";
        echo $record[ratingId];
        echo " Stars <br><br>";
        echo "<br><br>";
    }
    
    // echo "<table>";
    // echo "<tr>";
    // echo "<th>Title </th><th>Year </th><th>Actors</th>";
        
    // foreach ($records as $record) {
    //     echo "<tr>";    
    //     echo "<td>" . $record[title] . "</td>";
    //     echo "<td>" . $record[year] . "</td>";
    //     echo "<td>" . $record[actors] . "</td>";
    //     echo "</tr>";
    // }
    // echo "</table>";
    
    
    //print_r($records);
}

?>