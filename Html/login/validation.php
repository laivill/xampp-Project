<?php
include "DBuser.php";
include "DBadmin.php";
session_start();
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
   /* $pass=password_hash($pass, PASSWORD_DEFAULT);
    $sql="update account SET password='$pass' WHERE user_name='$uname';";
    $result= $conn->query($sql);*/


    $sql = "select * from account where user_name='$uname'";
    $result= mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result)===1){
            $rows=mysqli_fetch_assoc($result);
            
            if($rows['user_name']=== $uname && password_verify($pass,$rows['password'])===true){
                if($rows['role']==="Administrator" && $rows['status']==="Active"){
                        $_SESSION['user_name']=$rows['user_name'];
                        $_SESSION['role']=$rows['role'];
                        $_SESSION['password']=$pass;
                        header("Location: ../admin/Html/home.php");
                        exit();
                    }elseif($rows['role']==="Librarian" && $rows['status']==="Active"){
                        $_SESSION['user_name']=$rows['user_name'];
                        $_SESSION['role']=$rows['role'];
                         header("Location: ../librarian/home.php");
                         exit();
                    }elseif($rows['role']==="Student" && $rows['status']==="Active"){
                        $_SESSION['user_name']=$rows['user_name'];
                        $_SESSION['role']=$rows['role'];
                         header("Location: ../Studlogin/home.php");
                         exit();
                    }else{
                        header("Location: LogIn.php?error=ACCOUNT NOT ACTIVE!");
                        exit(); 
                    }
            }else{
                header("Location: LogIn.php?error=Incorrect username and password!");
                exit(); 
            }

    }else{
    header("Location: LogIn.php?error=Incorrect username and password!");
    exit();
    }

}else{
    header("Location: LogIn.php");
    exit();
}