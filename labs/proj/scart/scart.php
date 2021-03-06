<?php
    session_start();
    include 'functions.php';
    
    //Unset an item if it has the same ID as the item we want to remove
    if(isset($_POST['removeId'])) {
        //The '=>' syntax makes $itemKey equal to the current variable's key
        //If we just used $item, we'd only affect the copy
        foreach($_SESSION['cart'] as $itemKey => $item) {
            if ($item['id'] == $_POST['removeId']) {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    //Change the quantity of an item
    if(isset($_POST['updateId'])) {
        //We need to pass by reference here
        foreach($_SESSION['cart'] as &$item) {
            if ($item['id'] == $_POST['updateId']) {
                $item['quantity'] = $_POST['update'];
            }
        }
    }
?>
    //look above
    
    
    
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Shopping Cart</title>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                
                <!-- Bootstrap Navagation Bar -->
                <nav class='navbar navbar-default - navbar-fixed-top'>
                    <div class='container-fluid'>
                        <div class='navbar-header'>
                            <a class='navbar-brand' href='#'>Shopping Land</a>
                        </div>
                        <ul class='nav navbar-nav'>
                            <li><a href='index.php'>Home</a></li>
                            <li><a href='scart.php'>
                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>
                            </span> Cart: <?php displayCartCount(); ?> </a></li>
                        </ul>
                    </div>
                </nav>
                <br /> <br /> <br />
                <h2>Shopping Cart</h2>
                <!-- Cart Items -->
                
                <?php displayCart(); ?>
            </div>
        </div>
    </body>
</html>   
    
    
    
    