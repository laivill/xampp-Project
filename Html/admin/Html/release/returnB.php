<?php
include "../../../login/DBuser.php";
session_start();
$id=$_GET['id'];

$sql = "select * from book_borrow where B_id='$id'";
$result= mysqli_query($con, $sql);
$rows=mysqli_fetch_assoc($result);

if($rows['status']==="Borrowed"){
$sql="update book_borrow set date_in=now(),status='Returned' where B_id=$id";
$result=$con->query($sql);

$book_id=$rows['book_id'];
$sql = "select * from tbl_book where id='$book_id'";
$result= mysqli_query($con, $sql);
$rows=mysqli_fetch_assoc($result);

$title=$rows['title'];
$status=$rows['status'];
if($status='Borrowed'){
$sql = "select * from tbl_countb where book_title='$title'";
$result= mysqli_query($con, $sql);
$rows=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)===1){ 
    $sql="update tbl_unreturnb set count=count-1 where book_title='$title';";
    $result=$con->query($sql);
}
}

if($rows['fine']==='0'){
    $sql="update book_borrow set fine='100' where B_id=$id and date_in>=date_due;";
    $result=$con->query($sql);
}
}

header('Location:bookR.php');
exit;
?>