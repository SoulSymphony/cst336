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


<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        
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
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
    </head>
    <body>
        
        <div class='text-center'>
        
            <h1> Ottermart - Admin Login</h1>
            
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