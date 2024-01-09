<?php
include "../../../login/DBadmin.php";
session_start();
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role']) ){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $uname=validate($_POST['username']);
    $pass=validate($_POST['password']);
    $role=validate($_POST['role']);

    $id=$_SESSION['id'];

    $sql = "select * from account where id='$id'";
    $result= mysqli_query($conn, $sql);
    $rows=mysqli_fetch_assoc($result);
    $id=$rows['id'];
    $_SESSION['id2']=$id;

    $sql="update account SET role='$role' WHERE account.id=$id;";
    $result= $conn->query($sql);
    
    if($rows['password']===$pass){
    }else{
        $pass=password_hash($pass, PASSWORD_DEFAULT);
        $sql="update account SET password='$pass' WHERE account.id=$id;";
        $result= $conn->query($sql);
    }

    if($rows['user_name']!==$uname){
         $sql="update account SET user_name='$uname' WHERE account.id=$id;";
        $result= $conn->query($sql);
    }
    
        header("Location: user.php");
        exit;
    
}