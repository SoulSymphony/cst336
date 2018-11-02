<?php
    include_once 'functions.php';
    if(!isset($_POST['text']) || !isset($_POST['author'])){
        $isPost = false;
        //Not a post.
    } else {
        //POST occurred.
        $isPost = true;
        $isErr = false;
        $error = "<div class='error'><ul>";
        if($_POST['text'] == ''){
            $isErr = true;
            $error .= "<li>Text must not be empty.</li>";
        }
        if($_POST['author'] == ''){
            $isErr = true;
            $error .= "<li>Author must not be empty.</li>";
        }
        $error .= "</ul></div>";
        if($isErr == false){
            //Success, Add quote.
            addQuote($_POST['text'], $_POST['author']);
            header("Location: ./index.php"); /* Redirect browser */
            exit;
        }
        

    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="./css/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        
        <h1>Create a new quote: </h1>
            <?php
                echo $error;
            ?>    
        <form method="post">
            Text: <input type="text" name="text"> <br/><br/>
            Author: <input type="text" name="author"> <br/><br/>
            <input name="create-quote" type="submit">
        </form>
        
        <br/>
        <br/>
        <br/>
        
    </body>
</html>