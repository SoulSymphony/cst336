<!--<!DOCTYPE html>-->
<!--<html>-->
<!--    <head>-->
<!--        <title> Admin Login </title>-->
<!--    </head>-->
<!--    <body>-->

<!--        <h1> Ottermart - Admin Login </h1>-->
        
<!--        <form method="post" action="loginProcess.php">-->
<!--          Username:  <input type="text" name="username"/> <br>-->
<!--          Password:  <input type="password" name="password"/> <br>-->
<!--          <input type="submit" value="Login">-->
<!--        </form>-->

<!--    </body>-->
<!--</html>-->


<?php

 session_start();
    
    //include 'inc/dbConnection.php';
    include 'inc/functions.php';
    
    
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    if(isset($_POST['itemName'])) {
        //Storing the POST values into an array for later use
        $newItem = array();
        $newItem['name'] = $_POST['itemName'];
        $newItem['year'] = $_POST['itemYear'];
        $newItem['director'] = $_POST['itemDirector'];
        $newItem['actors'] = $_POST['itemActors'];
        $newItem['rating'] = $_POST['itemRating'];
        $newItem['image'] = $_POST['itemImage'];
        $newItem['id'] = $_POST['itemId'];
        
        //Checking to see if this is already in our cart
        //We use &$item to pass by reference
        foreach($_SESSION['cart'] as &$item) {
            if ($newItem['id'] == $item['id']) {
                $item['quantity'] += 1;
                $found = true;
            }
        }
        
        if ($found != true) {
            $newItem['quantity'] = 1;
            array_push($_SESSION['cart'], $newItem);
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <title>Mini Pokedex</title>
        <!--<link rel="stylesheet" href="css/styles.css" type="text/css" />-->
        <style>
            h1, form{
                text-align:center;
            }
            footer {
                text-align: center;
                padding: 10px;
                margin-top: 250px;
            }
        </style>
    </head>
        
        
        <?php
        session_start();
        function wrongI(){
            if(isset($_SESSION['loginError']))
            {
   echo 'Wrong Username or password';
   unset($_SESSION['loginError']);
   
   
}
          
        } 
            
        ?>
        
        
         
        
        
        
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />-->
    </head>
    <body>
        
           <!-- Bootstrap Navagation Bar -->
        <nav class='navbar navbar-default - navbar-fixed-top'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand' href='#'>Mini Pokedex</a>
                </div>
                  <ul class='nav navbar-nav'>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='logi.php'> Login</a></li>
                   
                </ul>
            </div>
        </nav>
        <br /> <br /> <br />
        
        
        
      
        
        
        
        
        
        
        
        
        
        
        
        <div class='text-center'>
            
        
            <h1>Admin Login</h1>
            
            <br />
            
            <form method="POST" action="loginProcess.php">
                Username: <input type="text" name = "username"/> <br /> <br />
                Password: <input type="password" name="password"/> <br /> <br />
                <input type="submit" name="submitBtn" value = "Login"/> <br />
                
            </form>
            
            <figure>
             <?php wrongI(); ?>
            <img src="bv.png" alt="" />
            </figure>
                     
        </div>
        
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
       
        
        
         

    </body>
</html>