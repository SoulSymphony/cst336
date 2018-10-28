<?php




?>





<!DOCTYPE html>
<html>
    <head>
        <title> Winter Vacation Planner</title>
        <?php include 'functions.php'; ?>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
        	@import url("css/styles.css");
        </style>
    </head>
    <body>

        <div class="jumbotron">
            <h1> Winter Vacation Planner ! </h1>
        </div>
        <div id="wrapper"></div>
        
        <form action="#" method="post">
            Select Month: &nbsp;
            
            
            
            <select name="month">
                <option value>Select</option>
                <option>November</option>
                <option>December</option>
                <option>Januaray</option>
                <option>Feburaury</option>
                
                </select>
                
                <a href="#" data-toggle="tooltip" title="USA is selected by default.">
                <img src="img/info.png" width="15">
            </a>
                
                <br>
                <br>
                
            Number of locations: &nbsp;
            
            <input type="radio" name="locationsNumber" value="3" id="13">
            <label for="13">Three</label>
            &nbsp;
            <input type="radio" name="locationsNumber" value="4" id="14">
            <label for="14">Four</label>
            &nbsp;
            <input type="radio" name="locationsNumber" value="5" id="15">
            <label for="15">Five</label>
           &nbsp;
            
            Select Country:&nbsp;
            <select name="country">
                
                <option>USA</option>
                <option>Mexico</option>
                <option>France</option>
                
            </select>
            
            <a href="#" data-toggle="tooltip" title="USA is selected by default.">
                <img src="img/info.png" width="15">
            </a>
            
             <br>
                <br>
                Visit locations in alphabetical order:&nbsp;
                <input type=radio name="order" value="asc" id="order_asc">
                <label for="order_asc">A-Z</label>
                &nbsp;
                <input type=radio name="order" value="desc" id="order_desc">
                <label for="order_desc">Z-A</label>
                &nbsp;
        
            <a href="#" data-toggle="tooltip" title="Users can leave it blank. If checked, the random loc ordered randomly">
               
            </a>
            
            <input type="submit" name ="submit" value="Create Itinerary">
           
               
            </a>
            
            
    
        </form>
        
        
        <?php
        
//         //  if (!empty($_POST['submiter'])) {
             
//         //      echo "submitted";
             
             
             
//                   if (empty($_POST['month'])) {
//     echo "<h2>You need to put in a month<h2>"; 
    
//     foreach ($_POST['month'] as $select)
// {
    
// if($select=="")
    
    
// }
  

 if (isset($_POST['submit'])) {
        
        $check=0;
        
        
         if (empty($_POST['month'])) {
             
             echo "<h2> you need to put in a month!!!<h2>";
             $check=1;
         }
         
         
          if (empty($_POST['locationsNumber'])) {
             
             echo "<h2> you need to put in number of locations!!!<h2>";
             $check=1;
         }
         
         
         
         
         if (isset($_POST['month']) && $check==0)
         {
             
             echo "<br>";
             echo "<br>";
             
           if($_POST['month']=="November")
           {
               echo "November";
               echo "<br>";
               
               echo "Visiting ", $_POST['locationsNumber'], "in the ", $_POST['country'];
               
           }
           
           
           if($_POST['month']=="Feburaury")
           {
               echo "Feburaury";
               echo "<br>";
               
               echo "<table border= '1'>";
               echo "<tr style='text-align:center'>";
     
      for($i=1;$i<29;$i++)
     {
         echo "<td>", $i;
         
         if($i==7)
         {
             echo "</tr>";
             echo "<tr>";
         }
         
     }
       
       
        echo "</tr>";
        
        
        echo "<table>";
               
               
               
           }
           
           
           
           
           
           
             
             
         }
        
         
         
        
        
    }

  
         
         
        
        
   


    
        
        
        
        ?>
        
        
        
        
        
        
        
        

                <script src="js/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>
