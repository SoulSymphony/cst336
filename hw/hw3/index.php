<html>
    <head>
        <title>Something form</title>
        
        <?php
        include 'inc/functions.php';
    ?>
        <meta charset="utf-8" />
        
       <link href="css/styles.css" rel="stylesheet" type="text/css" />
       
       
       
       
    </head>
    <body>

        <div>
            <h1> Something form </h1>
        </div>
        <div id="wrapper">
            
            
            
            <form action="#" method="post">
<select name="Color[]" multiple> // Initializing Name With An Array
<option value="goku.png">goku</option>
<option value="veg.jpg">vegeta</option>
<input type="radio" name="radiooooo" value="goku.png">Normal
<input type="radio" name="radiooooo" value="gokus.png">Super
</select>
<input type="submit" name="submit" value="Char" />
</form>
<?php



if (empty($_POST['submit'])) {
    echo "Put in correct input"; 


    
    
}


if(isset($_POST['submit'])){
    
    if(isset($_POST['radio']))
    {
    
    
// As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
foreach ($_POST['Color'] as $select)
{
// echo "You have selected :" .$select; // Displaying Selected Value


//  echo "<img src='img/$select' title='".ucfirst("Goku")."'width='100' />";
// echo "You have selected :".$_POST['radio'];

if($select=="goku.png")
{
    if($_POST['radio']=="goku.png")
    {
       echo "<img src='img/$select' title='".ucfirst("Goku")."'width='100' />"; 
    }
    else if($_POST['radio']=="gokus.png")
    {
        echo "<img src='img/gokus.png' title='".ucfirst("Goku")."'width='100' />";
    }
    
    
}


if($select=="veg.jpg")
{
    if($_POST['radio']=="goku.png")
    {
       echo "<img src='img/veg.jpg' title='".ucfirst("Goku")."'width='100' />"; 
    }
    else if($_POST['radio']=="gokus.png")
    {
        echo "<img src='img/Vegeta.png' title='".ucfirst("Goku")."'width='100' />";
    }
    
    
}








}

}





}






?>



            <form action="#" method="post">
<select name="Color[]" multiple> // Initializing Name With An Array
<option value="Frieza.png">Frieza</option>

<input type="radio" name="radioo" value="fr.png">Normal
<input type="radio" name="radioo" value="Frieza.png">Final
</select>
<input type="submit" name="submitt" value="Villain" />
</form>
<?php


if (empty($_POST['submitt'])) {
    echo "Put in correct input"; 


    
    
}

if(isset($_POST['submitt'])){
    
    if(isset($_POST['radioo']))
    {
    
    
// As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
foreach ($_POST['Color'] as $select)
{
// echo "You have selected :" .$select; // Displaying Selected Value


//  echo "<img src='img/$select' title='".ucfirst("Goku")."'width='100' />";
// echo "You have selected :".$_POST['radio'];

if($select=="Frieza.png")
{
    if($_POST['radioo']=="Frieza.png")
    {
       echo "<img src='img/Frieza.png' title='".ucfirst("Goku")."'width='100' />"; 
    }
    else if($_POST['radioo']=="fr.png")
    {
        echo "<img src='img/fr.png' title='".ucfirst("Goku")."'width='100' />";
    }
    
    
}










}






}

}






?>


            </div>
        
               
    

</body></html>