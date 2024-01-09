<?php
session_start();
include "../../../login/DBadmin.php";

//input validation for string
if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    
    $uname=validate($_POST['uname']);
    $pass=validate($_POST['password']);

    $sql = "select role from account where user_name='$uname'";
    $result= mysqli_query($conn, $sql);
    $rows=mysqli_fetch_assoc($result);
    
    if($rows['role']==="Administrator"){
    if($uname===$_SESSION['user_name'] && $pass===$_SESSION['password']){
        header("Location: user.php");
                exit();
    }else{
        header("Location: login.php?error=Incorrect username and password!");
        exit(); 
    }
    }else{
        header("Location: login.php?error=Incorrect username and password!");
        exit(); 
    }

}else{
    header("Location: login.php");
}

                