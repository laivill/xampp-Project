<?php
$sname= "localhost";
$db_name= "library";
$admin="admin";
$pass="Meljay04";

try{
    $conn=mysqli_connect($sname, $admin, $pass, $db_name);
}catch(mysqli_sql_exception $e){
    header("Location: LogIn.php?error=Incorrect username and password!");
    exit();
}