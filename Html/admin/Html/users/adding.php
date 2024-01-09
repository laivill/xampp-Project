<?php
include "../../../login/DBadmin.php";
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role']) ){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $uname=validate($_POST['username']);
    $pass=validate($_POST['password']);

    $pass=password_hash($pass, PASSWORD_DEFAULT);

    $role=validate($_POST['role']);
    $status="Active";

    $sql = "select * from account where user_name='$uname'";
    $result= mysqli_query($conn, $sql);
 
    if(mysqli_num_rows($result)===1){
        header("Location: add.php?error=Username is already taken!");
        exit();   
    }else{
        $sql = "insert into account (user_name,password,role,status) values ('$uname','$pass','$role','$status')";
        $result= $conn->query($sql);
        header("Location: user.php");
    }

    
}