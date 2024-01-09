<?php
include "../../../login/DBuser.php";
session_start();
if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['date']) ){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $title=validate($_POST['title']);
    $author=validate($_POST['author']);
    $date=$_POST['date'];
    $id=$_SESSION['id'];

    $sql = "select * from tbl_book where id='$id'";
    $result= mysqli_query($con, $sql);
    $rows=mysqli_fetch_assoc($result);
        if($rows['title']!=$title){
            $sql="update tbl_book SET title='$title' WHERE tbl_book.id=$id;";
            $result= $con->query($sql);
            header("Location: bookM.php");
            exit;
        }elseif($rows['author']!=$author){
            $sql="update tbl_book SET author='$author' WHERE tbl_book.id=$id;";
            $result= $con->query($sql);
            header("Location: bookM.php");
            exit;
        }elseif($rows['Date_pub']!=$date){
            $sql="update tbl_book SET Date_pub='$date' WHERE tbl_book.id=$id;";
            $result= $con->query($sql);
            header("Location: bookM.php");
            exit;
        }else{
            header("Location: bookM.php");
            exit;
        }
    

    
}