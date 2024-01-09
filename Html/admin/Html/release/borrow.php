<?php
include "../../../login/DBuser.php";
session_start();
$stud_id=$_SESSION['stud_id'];
$book_id=$_SESSION['book_id'];
if(!empty($book_id)){
$sql="insert INTO book_borrow (stud_id, book_id,date_out,status,date_due,fine) VALUES ('$stud_id', '$book_id', now(),'Borrowed',DATE_ADD(CURDATE(), INTERVAL 2 DAY),'0');";
$result=$con->query($sql);

$sql = "select * from tbl_book where id='$book_id'";
$result= mysqli_query($con, $sql);
$rows=mysqli_fetch_assoc($result);

$title=$rows['title'];
$sql = "select * from tbl_countb where book_title='$title'";
$result= mysqli_query($con, $sql);
$rows=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)===1){ 
    $sql="update tbl_countb set count=count+1 where book_title='$title';";
    $result=$con->query($sql);
    $sql="update tbl_unreturnb set count=count+1 where book_title='$title';";
    $result=$con->query($sql); 
}else{
    $sql="insert INTO tbl_countb (book_title,count) VALUES ('$title',1);";
    $result=$con->query($sql);
    $sql="insert INTO tbl_unreturnb (book_title,count) VALUES ('$title',1);";
    $result=$con->query($sql);
}
}

header('Location:bookR.php');
exit;
?>