<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("fproject");
include 'inc/logifunctions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
     $name = $_GET['name'];
    $description = $_GET['description'];
    $attack =  $_GET['attack'];
    
    $image = $_GET['image'];
    $legendary = $_GET['legendary'];
    $weight = $_GET['weight'];
    $evolution = $_GET['evolution'];
    $region = $_GET['region'];
    $year = $_GET['year'];
    
    
    $sql = "INSERT INTO proj_rec (name, description, image,attack, legendary, weight, evolution, region, year) 
            VALUES (:name, :description, :image, :attack, :legendary, :weight, :evolution, :region, :year);";
    $np = array();
        $np[":name"] = $name;
        $np[":description"] = $description;
        $np[":image"] = $image;
        $np[":attack"] = $attack;
        // $np[":type"] = $type;
        $np[":legendary"] = $legendary;
        $np[":weight"] = $weight;
        $np[":evolution"] = $evolution;
        $np[":region"] = $region;
        $np[":year"] = $year;
        
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Pokemon was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
    </head>
    <body>
        
        <h1> Adding New Product </h1>
        
        <form>
           Name: <input type="text" name="name"><br>
           Description: <textarea name="description" cols="50" rows="4"></textarea><br>
           Legendary: <input type="text" name="legendary"><br>
           Region: <input type="text" name="region"><br>
           Attack: <input type="text" name="attack"><br>
           Evolution: <input type="text" name="evolution"><br>
           Weight: <input type="text" name="weight"><br>
           Year: <input type="text" name="year"><br>
           Category: 
           <select name="chooseId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option value='".$category['chooseId']."'>" . $category['genType'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="image"><br>
           <input type="submit" name="addProduct" value="Add Product">
        </form>

    </body>
</html>