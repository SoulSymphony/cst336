<?php

function ballCup($inn)
{

shuffle($inn);








}



function displayCups($inn, $choice)
{
    
    $inn_pop();
    
    for($i=0;$i<4;$i++)
    {
        echo $inn[$i];
    }
    
    
//      echo "original position";
// for($i=0;$i<4;$i++)
// {
//     if($inn[$i]==0)
//     {
// echo"<img id='reel$pos' src='/cst336/hw/hw2/img/rc1.jpg' alt='$symbol' title='".ucfirst("cup")."'width='70' />";
// echo $inn[$i];
// }

// else
// {
//     echo"<img id='reel$pos' src='/cst336/hw/hw2/img/blueb.jpg' title='".ucfirst("cup")."'width='70' />";
//     echo $inn[$i];
// }




   
}


// ballCup($inn);



?>


<!DOCTYPE html>
<html>
    <head>
        
        
        <meta charset="utf-8" />
        
        
        
        
       
       <link href="h2styles.css" rel="stylesheet" type="text/css" />
        <title> Michael Velasquez: HW 2</title>
        
         <?php
        include 'inc/functions.php';
    ?>
        
    </head>
    <body>
        
           <header>
            <h1>Ball Cup Game</h1>
            
        </header>
       

       <br /><br />
       <br /><br />
       <br /><br />
       <main>
           
           
           
                  
            <?php
 
  $threec=array(0,0,0,1);
 
 if (!empty($_GET['act'])) {
    displayCups($containerr, 1);
    
 }
 
  else if (!empty($_GET['2'])) {
    displayCups($threec, 2);
  } 
  
   else if (!empty($_GET['3'])) {
    displayCups($threec, 3);
  } 
  
   else if (!empty($_GET['4'])) {
    displayCups($threec, 4);
  } 
  
  
  else {
?>

<form style="text-align:center;" action="h2p2.php" method="get">
  <input type="hidden" name="act" value="run">
  <input type="submit" class="1" value="Cup 1">
  
  <input type="hidden" name="2" value="run">
  <input type="submit" class="2" value="Cup 2">
  
  <input type="hidden" name="3" value="run">
  <input type="submit" class="3" value="Cup 3">
  
  <input type="hidden" name="4" value="run">
  <input type="submit" class="4" value="Cup 4">
  
  
</form>
<?php
  }
?>
           
           
             <figure id="me">
                 
                 <?php
                 
                 
                displayCups();
                
                 
                 
                 ?>
                
                
            </figure>
           
           
    
           
       </main>
   

    </body>
</html>