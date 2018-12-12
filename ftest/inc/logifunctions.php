<?php

function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}


function displayAllProducts(){
    global $dbConn;
    
    $sql = "SELECT * FROM proj_rec ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    
    

    foreach ($records as $record) {
        echo "<a class='btn btn-primary' role='button' href='updateProduct.php?pId=".$record['pId']."'>Update</a>";
        //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
        echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='pId' value='".$record['pId']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        
        echo "[<a 
        
        onclick='openModal()' target='productModal'
        href='productInfo.php?pId=".$record['pId']."'>".$record['name']."</a>]  ";
        echo $record[description]   . "<br><br>";
        
    }
}

function getCategories() {
    global $dbConn;
    
    $sql = "SELECT * FROM proj_sel ORDER BY genType";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    // echo $records [1];
    //print_r($records);
    
    return $records;
    
}

function getProductInfo($pId) {
     global $dbConn;
    
    $sql = "SELECT * FROM proj_rec WHERE pId = $pId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
    
}

?>