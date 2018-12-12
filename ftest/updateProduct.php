<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("fproject");
include 'inc/logifunctions.php';
validateSession();


if (isset($_GET['updateProduct'])){  //user has submitted update form
    $name = $_GET['name'];
    $description = $_GET['description'];
    $attack =  $_GET['attack'];
    $type =  $_GET['type'];
    $image = $_GET['image'];
    $legendary = $_GET['legendary'];
    $weight = $_GET['weight'];
    $evolution = $_GET['evolution'];
    
    
    
     $np = array();
        $np[":name"] = $name;
        $np[":description"] = $description;
        $np[":image"] = $image;
        $np[":attack"] = $attack;
        $np[":type"] = $type;
    
    $sql = "UPDATE proj_rec 
            SET name= :name,
               description = :description,
               attack = :attack,
               type = :type,
               image = :image
            WHERE pId = " . $_GET['pId'];
            
   
            
$stmt=$dbConn->prepare($sql);
$stmt->execute($np);

header("Location: admin.php");
         
    
}


if (isset($_GET['pId'])) {

  $productInfo = getProductInfo($_GET['pId']);    
  
 // print_r($productInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products! </title>
    </head>
    <body>

        <h1> Updating a Product </h1>
        
        <form>
            <input type="hidden" name="pId" value="<?=$productInfo['pId']?>">
           Product name: <input type="text" name="name" value="<?=$productInfo['name']?>"><br>
           Description: <textarea name="description" cols="50" rows="4"> <?=$productInfo['description']?> </textarea><br>
           Price: <input type="text" name="attack" value="<?=$productInfo['attack']?>"><br>
           Category: 
           <select name="chooseId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['chooseId']==$productInfo['chooseId'])?"selected":"";
                  echo " value='".$category['chooseId']."'>" . $category['genType'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="image" value="<?=$productInfo['image']?>"><br>
           <input type="submit" name="updateProduct" value="Update Product">
        </form>
        
        
    </body>
</html>