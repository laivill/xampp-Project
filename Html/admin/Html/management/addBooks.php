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
    <header>
        <div class="box1">Books</div>
    </header><hr>
    <div class="bookInput">
        <form action="adding.php" method="post">
            <br><h1>ADD Book Details</h1>
            <?php if (isset($_GET['error'])) {?>
                 <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="container">
                <div class="inputName">
                    <p>Title: </p>
                    <p>Date Publish:</p>
                    <p>Author:</p>
                </div>
                <div class="inputbox">
                    <input type="text" name="title" required class="title" placeholder="Snow Whiter"><br>
                    <input type="date" name="date" class="dateP" placeholder="2000-00-00"><br>
                    <input type="text" name="author" class="Author" placeholder="Drawf"><br>
                </div>
            </div>
            
            <button class="cancel"><a href="bookM.php" class="can">CANCEL</a></button>
            <button class="save">SAVE</button>
        </form>
    </div>      
</body>
</html>