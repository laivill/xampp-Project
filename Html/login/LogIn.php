<?php
include "DBuser.php";
$sql="create database if not exists library;";
$result=$con->query($sql);
$sql="create table if not exists account(id tinyint primary key auto_increment,user_name varchar(50),password varchar(255),role enum('Administrator', 'Librarian', 'Student'),status enum('Active', 'Inactive'));";
$result=$con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?> ">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="logoBox">
        <img class="logoBig" src="logoBig.png">
    </div>
    <div class="container">
        <form action="validation.php" method="post">
            <h1>Welcome Back!</h1><br>
            <h3>Login to continue</h3>

            <?php if (isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <div class="input-box">
                <input type="text" name="uname" required placeholder="Username">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" required placeholder="Password">
                <i class='bx bxs-lock'></i>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>

</body>
</html>