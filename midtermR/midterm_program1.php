<!DOCTYPE html>
<html>
    <head>
        <title> Winter Vacation Planner</title>
     

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
        	@import url("css/styles.css");
        </style>
    </head>
    <body>

        <div class="jumbotron">
            <h1> Superhero Team Generator! </h1>
        </div>
        <div id="wrapper"></div>
        
        <form action="#" method="post">
            Team Size: &nbsp;
            
            <input type="text" name="teamSize">
            
            <!--<select name="month">-->
            <!--    <option value>Select</option>-->
            <!--    <option>November</option>-->
            <!--    <option>December</option>-->
            <!--    <option>Januaray</option>-->
            <!--    <option>Feburaury</option>-->
                
            <!--    </select>-->
                
            <!--    <a href="#" data-toggle="tooltip" title="USA is selected by default.">-->
            <!--    <img src="img/info.png" width="15">-->
            <!--</a>-->
                
                <br>
                <br>
                
            Team Gender: &nbsp;
            
            <input type="radio" name="gender" value="female" id="female">
            <label for="13">female</label>
            &nbsp;&nbsp;
           <input type="radio" name="gender" value="male" id="male">
            <label for="13">male</label>
            &nbsp;&nbsp;
           <input type="radio" name="gender" value="coed" id="coed">
            <label for="13">coed</label>
            &nbsp;&nbsp;
            

          
             <br>
                <br>
                Display team members in alphabetical order:&nbsp;
                <input type=radio name="order" value="asc" id="order_asc">
                <label for="order_asc">A-Z</label>
                &nbsp;
                <input type=radio name="order" value="desc" id="order_desc">
                <label for="order_desc">Z-A</label>
                &nbsp;
        
           
            <br>
            <br>
            <input type="checkbox" name="displayImage">
            Display Images
            
            <br>
            <br>
            <input type="submit" name ="submit" value="Generate team">
           
               
         
            
            
    
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
        
        
        //  if (empty($_POST['teamSize'])) {
             
        //      echo "<h2> you need to have at least 1!<h2>";
        //      $check=1;
        //  }
         
         
        //   if (empty($_POST['locationsNumber'])) {
             
        //      echo "<h2> you need to put in number of locations!!!<h2>";
        //      $check=1;
        //  }
         
         
         
         
         if ($_POST['teamSize']>=1)
         {
             
            //  echo "at least 1";
             
         }
             
             else
             {
                 $check=1;
                  echo "Needs to have at least one!";
                  echo "<br>";
             }
             
             
             if (empty($_POST['gender']))
             {
                 echo "no gender selected";
                  echo "<br>";
                 $check=1;
             }
             
             
              if ($_POST['teamSize']>5 && $_POST['gender'] !="coed" || $_POST['teamSize']>10 && $_POST['gender']=="coed")
              {
                  echo "coed is either greater than 5 and is not coed or size is greater than 10 and gender is coed";
                  echo "<br>";
                  $check=1;
              }
              
              
              
               if (empty($_POST['order']))
               {
                   
                   
                   
                   
                   
                   
                   
                   
                   
                if($check==0)
              {
              
              $maless=array("goku", "leo", "mario", "spiderman", "monte");
              $females=array("xena", "blossom", "wonderwoman", "rey", "gamora");
              
              shuffle($maless);
              shuffle($females);
               
               $showing=$_POST['teamSize'];
               
               $rc=$_POST['gender'];
               
              
               
               
              
              for($i=0;$i<$_POST['teamSize'];$i++)
              {
                  if($rc=="male")
                 {
                  echo array_pop($maless);
                  
                 }
                 
                 
                 if($rc=="female")
                 {
                     echo array_pop($females);
                 }
                 
                 
                 if($rc=="coed" && $i<1)
                 {
                     echo array_pop($females);
                 }
                 
                 else
                 {
                     echo array_pop($maless);
                 }
                 
                 echo "<br>";
                 
                 
                 
                 
              }
              
              }
               }
             
           
           
          
               if($_POST['order']=="asc")
               {
                 
                 
                        
                if($check==0)
              {
              
              $maless=array("goku", "leo", "mario", "spiderman", "monte");
              $females=array("xena", "blossom", "wonderwoman", "rey", "gamora");
              
            //   shuffle($maless);
            //   shuffle($females);
              
              rsort($maless);
              rsort($females);
              
               
               $showing=$_POST['teamSize'];
               
               $rc=$_POST['gender'];
               
              
               
               
              
              for($i=0;$i<$_POST['teamSize'];$i++)
              {
                  if($rc=="male")
                 {
                  echo array_pop($maless);
                  
                 }
                 
                 
                 if($rc=="female")
                 {
                     echo array_pop($females);
                 }
                 
                 
                 if($rc=="coed" && $i<1)
                 {
                     echo array_pop($females);
                 }
                 
                 else if($rc=="coed" && $i>1)
                 {
                     echo array_pop($maless);
                 }
                 
                 echo "<br>";
                 
                 
                 
                 
              }
              
              }
                 
                 
                 
                 
                 
                 
                 
                 
               }
           
           
           
           
           
           
           
           
           
           
            if($_POST['order']=="desc")
               {
                 
                 
                        
                if($check==0)
              {
              
              $maless=array("goku", "leo", "mario", "spiderman", "monte");
              $females=array("xena", "blossom", "wonderwoman", "rey", "gamora");
              
            //   shuffle($maless);
            //   shuffle($females);
              
              sort($maless);
              sort($females);
              
               
               $showing=$_POST['teamSize'];
               
               $rc=$_POST['gender'];
               
              
               
               
              
              for($i=0;$i<$_POST['teamSize'];$i++)
              {
                  if($rc=="male")
                 {
                  echo array_pop($maless);
                  
                 }
                 
                 
                 if($rc=="female")
                 {
                     echo array_pop($females);
                 }
                 
                 
                 if($rc=="coed" && $i<1)
                 {
                     echo array_pop($females);
                 }
                 
                 else if($rc=="coed" && $i>1)
                 {
                     echo array_pop($maless);
                 }
                 
                 echo "<br>";
                 
                 
                 
                 
              }
              
              }
                 
                 
                 
                 
                 
                 
                 
                 
               }
           
           
             
             
         }
        
         
         
        
        
    

  
         
         
        // echo "The page includes the form elements as the Program Sample: checkbox, radio buttons, etc.	5";
        // echo "<br>";
        // echo "Error is displayed if team gender is not submitted.	5";
        // echo "<br>";
        
        
   


    
        
        
        
        ?>
        
        
        
        
        
        
        
        

                <script src="js/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>