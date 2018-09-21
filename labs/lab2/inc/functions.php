<?php

      function displayPoints($randomValue1, $randomValue2, $randomValue3)
        {
            echo "<div id='output'>";
            if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3)
            {
                switch($randomValue1)
                {
                    case 0: $totalPoints= 1000;
                    echo "<h1>Jackpot!</h1>";
                    break;
                    
                     case 1: $totalPoints= 500;
                     break;
                     
                     case 2: $totalPoints= 250;
                     break;
                     
                       case 3: $totalPoints= 900;
                     break;
                }
                
                
                echo "<h2>You won $totalPoints points!</h2>";
                
            }
            
            else
            {
                echo "<h3> Try Again! </h3>";
            }
            
            echo "</div>";
            
            
            
            
            
        }
        
        
        function displaySymbol($random_value, $pos)
        {
        
         $symbol = "seven";
        
        
       // $random_value = rand(0,2); //generates a random number from 0 to 2
        
        // if ($random_value == 0)
        // {
        //     $symbol = "seven";
        // }
        // else if ($random_value == 1)
        // {
        //     $symbol = "orange";
        // }
        // else
        // {
        //     $symbol="cherry";
        // }
        
        
        switch ($random_value)
        {
            case 0: $symbol = "seven";
            break;
            case 1: $symbol = "orange";
            break;
            case 2: $symbol= "cherry";
            break;
            case 3: $symbol="grapes";
            break;
        }
        
        
        
        /*switch case would be more useful possibly*/
        
       
     
        
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."'width='70' />";
        // echo "<img id='reel$pos' src=\'img/$symbol.png\' alt='$symbol' title='".ucfirst($symbol)."'width='70'/>";
        
        }
        
        
        function play() {
         for($i=1; $i<4;$i++)
        {
            ${"randomValue" . $i } = rand(0,3);
            displaySymbol(${"randomValue" . $i}, $i);
        }
        
       displayPoints($randomValue1, $randomValue2, $randomValue3);
        }
        
        
        

?>