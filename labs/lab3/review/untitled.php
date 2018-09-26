<?php

session_start();

session_destroy();


$_SESSION['heads']=0;
$_SESSION['TAILS']=0;


IF(!isset($_SESSION['heads']))
{
    $_SESSION['heads']=0;
    $_SESSION['tails']=0;
    $_SESSION['tossHistory']=array();


if(rand(0,1)==0)
{
    $_SESSION['heads']++;
    $_SESSION['tossHistory'][]="H"; //adds element to array
}

else{
    $_SESSION['TAILS']++;
     $_SESSION['tossHistory'][]="T"; //adds element to array
}


}

print_r()


?>






<!DOCTYPE html>
<html>
<!--

First Website
and comment
in html
(comments can span multiple lines)

-->

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <meta char=”utf-8” />
        <title> Coin Flipping</title>
        
        
       
       <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    

    <body>
    
        <h2> Heads: </h2>
        <h2> Tails: </h2>
        
    </body>
    

</html>