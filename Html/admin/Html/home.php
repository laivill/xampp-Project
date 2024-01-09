<?php
session_start();
if($_SESSION['role']==="Administrator"){
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
         frame{
            border: 1px solid #ddd
        }
    </style>
</head>
<frameset rows="12%,*" border="0" name="home">
    <frame noresize, scrolling="no", src="header.php", frameborder="0" >
        <frameset cols="15%,85%" border="2">
            <frame src="option.php", frameborder="1">
            <frame name="main" src="management/bookM.php",  frameborder="0">    
        </frameset>
        </frameset>
<body>
    
</body>
</html>

<?php
}else{
header("Location: logOut.php");
}
?>