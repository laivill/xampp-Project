<?php
session_start();
include "../../../login/DBuser.php";
$id=$_GET['id'];
$_SESSION['id']=$id;
$sql="select * from tbl_book where id=$id;";
$result=$con->query($sql);
$rows=mysqli_fetch_assoc($result);
?>
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
        <form action="editing.php" method="post">
            <br><h1>Edit Book Details</h1>
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
                    <input type="text" name="title" class="title" value="<?php echo $rows['title']?>"><br>
                    <input type="date" name="date" class="dateP" value="<?php echo $rows['Date_pub']?>"><br>
                    <input type="text" name="author" class="Author" value="<?php echo $rows['author']?>"><br>
                    </div>
            </div>
            
            <button class="del"><a href="bookD.php" class="can">Delete</a></button>
            <button class="cancel"><a href="bookM.php" class="can">CANCEL</a></button>
            <button class="save">SAVE</button>
        </form>
    </div>      
</body>
</html>