<?php
include "../../../login/DBuser.php";
session_start();
$id=$_SESSION['id'];
$sql="delete FROM tbl_book where id= '$id' ";
$result= mysqli_query($con, $sql);
header("Location: bookM.php");