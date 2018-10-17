
<?php
$backgroundImage = "img/sea.jpg";



//API call dont forget it goes here
if(isset($_GET['keyword']))
{
    echo "You searched for: " . $_GET['keyword'];
    include 'api/pixabayAPI.php';
    $imageURLs=getImageURLs($_GET['keyword']);
    $backgroundImage = $imageURLs[array_rand($imageURLs)];
   
     print_r($imageURLs);
    
    
}


?>

<!DOCTYPE html>

<html>
    <head>
        <title>Image Carousel</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <style>
        @import url("css/styles.css");
        body
        {
        background-image: url('<?=$backgroundImage ?>');
        
        
        
        }
        
        </style>
        
    </head>
    <body>
        
        <br/> <br />
        
        <?php
        
        if(!isset($imageURLs))
        {
            echo "<h2> Type a keywword to display a slideshow <br /> with random images from Pixabay.com </h2>";
        }
        else
        {
            //display carousel
            // for($i=0;$i<5; $i++)
            // {
            //     echo "<img src='" . $imageURLs[rand(0, count($imageURLs))] . "' width='200'>";
            // }
            
            
            for($i = 0; $i <5; $i++)
            {
                do
                {
                    $randomIndex = rand(0,count($imageURLs));
                }
                
                while(!isset($imageURLs[$randomIndex]));
                
                echo "<img src='" . $imageURLs[$randomIndex] . "' width='200' >";
                unset($imageURLs[randomIndex]);
                
            }
            
            
            
        
        
        ?>
        
        
        <h1>I'm a regular HTML tag inside the PHP else statement!</h1>
        
        <?php
        }
        ?>
        
        
        <form>
            <input type="text" name="keyword" placeholder="Keyword">
            <input type="submit" value="Submit" />
        </form>
        
        
        <br/> <br />
        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    </body>
</html>