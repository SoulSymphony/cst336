<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>

        <?php
        
        function displaySymbol($random_value1)
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
        }
        
        
        
        /*switch case would be more useful possibly*/
        
       
        
        
        
        echo "<img src=\"img/$symbol.png\" alt='$symbol' title='".ucfirst($symbol)."'/>";
        
        }
        
        
        $random_value1 = rand(0,2);
        
         
         
        
        
        displaySymbol($random_value1);
         $random_value2 = rand(0,2);
        displaySymbol($random_value2);
     $random_value3 = rand(0,2);
        displaySymbol($random_value3);
        
       
         
        
        ?>



    



    </body>
</html>