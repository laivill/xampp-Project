<?php
include "../../../login/DBuser.php";
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
    $status="Available";

    $sql = "insert into tbl_book (title,author,Date_pub,status) values ('$title','$author','$date','$status')";
    $result= $con->query($sql);
    header("Location: bookM.php");
    
}