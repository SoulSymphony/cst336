<?php
       
      function getLuckyNumber()
      {
      
      $x=rand(1,10);
      
      if($x!=4)
      {
          echo $x;
      }
       
      }
      
      
      function getRandomColor()
      {
           echo "color: rgba(".rand(0,255)."","".rand(0,255)."","".rand(0,255)."","".(rand(1,10)/10)."");"";
      }
      
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
        <meta char="utf-8" />
        <title> Michael Velasquez: Personal Portfolio</title>
        
        <style>
        
        body{
            
            <?php
            
            $red = rand(0,255);
            
            echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(1,10)/10).");";
            ?>
            /*correct one*/
           
            
        }
        
        
        h1{
             <?php
            
            $red = rand(0,255);
            
            echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(1,10)/10).");";
            getRandomColor();
           
            ?>
        }
        
          h2{
             <?php
            
          background color: <?php getRandomColor(); ?>
            
           
            
           
            ?>
        }
        
        
        </style>
        
    
    </head>

    <body>
      
      <h1>
       my lucky number is:
       
       <?php
       getLuckyNumber();
       ?>
       
       
       </h1>
       
    </body>
    <!-- closing body check -->

</html>