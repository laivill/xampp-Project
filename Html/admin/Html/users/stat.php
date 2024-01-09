<?php
include "../../../login/DBadmin.php";

$id=$_GET['id'];
$sql="select status from account where id=$id;";
$result=$conn->query($sql);
$rows=mysqli_fetch_assoc($result);

    if($rows['status']==="Active"){
    $sql="update account SET status='Inactive' WHERE account.id=$id;";
    $result= $conn->query($sql);
    header("Location: user.php");
    }else{
    $sql="update account SET status='Active' WHERE account.id=$id;";
    $result= $conn->query($sql);
    header("Location: user.php");
    }


