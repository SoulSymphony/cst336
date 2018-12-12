<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("fproject");
include 'inc/logifunctions.php';
validateSession();

$sql = "DELETE FROM proj_rec WHERE pId = " . $_GET['pId'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");



?>