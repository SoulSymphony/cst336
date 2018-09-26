<?php

function ballCup($inn)
{

for($i=0;$i<4;$i++)
{
    if($inn[$i]==2)
    {
        return 0;
    }
    
    else{
        return 1;
    }
    
}


}



function displayCups($inn, $choice)
{
    
    array_pop($inn);
  
   
    
   array_push($inn, 2);
   
   


shuffle($inn);




for($i=0;$i<4;$i++)
{
    

    
      if($inn[$i]==0)
                 {
                     $tpic="rc1";
                      echo "<img src='img/$tpic.jpg' title='".ucfirst("cup")."'width='300' />";
                 }
                 else if($inn[$i]==1)
                 {
                     $tpic="mys";
                      echo "<img src='img/$tpic.jpg' title='".ucfirst("cup")."'width='300' />";
                 }
                 
                 else{
                     $tpic="blueb";
                     echo "<img src='img/$tpic.jpg' title='".ucfirst("cup")."'width='300' />";
                 }
                 
}

// print_r($inn);
        if($inn[$choice]==2)
{
    echo "You won!";
}
// echo $choice;
       
    
    
    
  
    





   
}





?>


<!DOCTYPE html>
<html>
    <head>
        
        
        <meta charset="utf-8" />
        
        
        
        
       
       <link href="h2styles.css" rel="stylesheet" type="text/css" />
        <title> Michael Velasquez: HW 2</title>
        
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

  
    
                 
                 
                
                 
                 $init=0;
                 
                //  function dif($changer, $check)
                //  {
                //      $changer=1;
                //      creator($changer);
                //      $changer=0;
                //  }
                 
                 
                 
                
                 
           
              
                   
                   
                   
              
                 
                 for($i=0;$i<4;$i++)
                 {
                     $containerr[$i]=rand(0,1);
                 }
                 
                for($i=0;$i<4;$i++)
                {
                 
               
                 $tpic;
                
                
                
                //  /cst336/hw/hw2/img/blueb.jpg
                 if($containerr[$i]==0)
                 {
                     $tpic="rc1";
                      echo "<img src='/cst336/hw/hw2/img/$tpic.jpg' title='".ucfirst("cup")."'width='300' />";
                 }
                 else if($containerr[$i]==1)
                 {
                     $tpic="mys";
                      echo "<img src='/cst336/hw/hw2/img/$tpic.jpg' title='".ucfirst("cup")."'width='300' />";
                 }
                 
                 
                }
                
                   
                   
                echo "Before Ball";
                 
                
                 
               
               
                
                 
                
                 
                 
                 
                
                
            
  
  
  
 
 if (!empty($_GET['act'])) {
    displayCups($containerr, 0);
    
    
 }
 
  else if (!empty($_GET['2'])) {
    displayCups($containerr, 1);
     
  } 
  
   else if (!empty($_GET['3'])) {
    displayCups($containerr, 2);
     
  } 
  
   else if (!empty($_GET['4'])) {
    displayCups($containerr, 3);
    
  } 
  
  
  else {
?>


<form style="text-align:center;" action="h2p1.php" method="get">
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
           
           
           
           
           
    
           
       </main>
   

    </body>
</html>