<?php
include "../../../login/DBuser.php";
session_start();
$id=$_GET['id'];

$sql = "select * from book_borrow where B_id='$id'";
$result= mysqli_query($con, $sql);
$rows=mysqli_fetch_assoc($result);

if($rows['fine']==="100"){
    $sql="update book_borrow set fine='Paid'  where B_id=$id";
    $result=$con->query($sql);
}

header('Location:bookR.php');
exit;
?>