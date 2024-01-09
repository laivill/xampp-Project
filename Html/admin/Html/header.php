<?php
session_start();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>head</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            background-color: #0069B8;
            display: flex;
        }
        img{
            padding-top:0.5% ;
            padding-bottom:0.5%;
            width: 20%;
            margin-left: 1%;
        }
        .profileBox{
            display: flex;
            margin-left:40%;
            width: 50%;
        }
        .profileBox i{
            color: white;
            font-size: 70px;
        }
        .profileBox .contain{
            font-size: 15px;
            color: white;
            font-family:sans-serif;
            font-weight: 100;
            text-align: right;
            width:85%;
            margin-top:4%;


        }
        p{
            margin: 0;
            margin-right:10px;
        }
    </style>
</head>
<body>
    <img src="head.png" alt="">
    <div class="profileBox">
        <div class="contain">
            <p><?php echo $_SESSION['user_name'];?></p>
            <p><?php echo $_SESSION['role'];?></p>
        </div>
        <a href="logOut.php" target="home"><i class='bx bx-user-circle'></i></a><br> 
    </div>
</body>
</html>

