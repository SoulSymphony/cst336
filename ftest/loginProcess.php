<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("fproject");

$username = $_POST['username'];
$password = sha1($_POST['password']);

//This SQL does NOT prevent SQL Injection (because of the single quotes)
// $sql = "SELECT * FROM om_admin
//                  WHERE username = '$username' 
//                  AND  password = '$password'";
                 
$sql = "SELECT * FROM om_admin
                 WHERE username = :username 
                 AND  password = :password ";                 
$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);

if (empty($record)) {
    
//   $message = "wrong answer";
// echo "<script type='text/javascript'>alert('$message');</script>";
        
// echo '<script type="text/javascript">'; 
// echo 'window.location.href = "index.php";';

// echo 'alert("Wrong Username or Password");'; 
// echo '</script>';

 $_SESSION['loginError'] = true;
header('Location: logi.php');
     
} else {
   
   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
   header('Location: admin.php'); //redirects to another program
    
}


?>