
<?php
    include_once './functions.php';
    include_once './database.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="./css/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php // generate quote
            if(isset($_POST['submit'])) {       
                $q = getQuotes($_POST['keyword'], $_POST['category'], $_POST['sortMethod']);
                foreach ($q as $i) {
                    echo "<h1>".$i['quote']."</h1><br>";
                    echo "<h2>".$i['author']."</h2><br>";
                }
            }
        ?>
        <form method="post">
            Keyword: <input type="text" name="keyword"> <br/><br/>
            Category: 
            <?php
            $cArr = getCategories();
            ?>
            <select>
                <?php
                    foreach($cArr as $c){
                        echo "<option value='".$c['category']."'>".$c['category']."</option>";                    
                    }
                ?>
            </select>
            Sort :
            A to Z<input type="radio" name="sortMethod" value="1">
            Z to A<input type="radio" name="sortMethod" value="0">
            <input type="submit" name="submit">
        </form>
        <br/>
        <br/>
        <br/>
        <a href="create.php">Create</a>
    </body>
</html>