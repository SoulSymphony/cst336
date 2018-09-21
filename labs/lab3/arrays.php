<?php

    function displayArray($symbols)
    {
        echo "<hr>";
        print_r($symbols);
        for($i=0;$i<count($symbols);$i++)//count() returns size of the array
        {
            echo $symbols[$i] . ", ";
        }
    }
    

    $symbols= array("seven");
    print_r($symbols); //displays array content
    
    array_push($symbols, orange);
   
    
    $symbols[] = "cherry";
    print_r($symbols);
    
    displayArray($symbols);
    sort($symbols);
     displayArray($symbols);
     
     rsort($symbols);
     
     unset($symbols[2]);
     
     
     $symbols = array_values($symbols);
     displayArray($symbols);
     
     $random= rand(0,count($symbols)-1);
     
     //echo "Random item : " . $symbols[ rand(0, count($symbols)-1)];
    echo "<img src='../lab2/img/" . $symbols[ rand(0, count($symbols))] . ".png'>";
    
    

?>



<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>