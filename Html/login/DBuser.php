<?php
$sname= "localhost";
$db_name= "library";
$user_name="user";
$pass="Meljay04";

try{
$con=mysqli_connect($sname, $user_name, $pass, $db_name);
}catch(mysqli_sql_exception $e){
header("Location: LogIn.php?error=user Problem!");
exit();
}