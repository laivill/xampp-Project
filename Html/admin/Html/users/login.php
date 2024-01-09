<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?> ">
</head>
<body>
    <br>
    <div class="bookInput">
        <div class="container">
            <form action="validation.php" method="post">
                <h2>CONFIRM USER TO CONTINUE</h2>

                <?php if (isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>   

                <div class="input-box">
                    <input type="text" required name="uname" placeholder="Username">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box2">
                    <input type="password" required name="password"  placeholder="Password">
                    <i class='bx bxs-lock'></i>
                </div>
    
                <button class="btn" >LOGIN</button>
            </form>
        </div>
        
    </div>      
</body>
</html>