<?php
session_start();
if($_SESSION['role']==="Librarian"){
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Page</title>
</head>
<frameset rows="12%,*" border="0" name="body">
    <frame noresize, scrolling="no", src="header.php", frameborder="0">
        <frameset cols="15%,85%" border="2">
            <frame src="option.php", frameborder="1">
            <frame name="main" src="../admin/Html/management/bookM.php",  frameborder="0">    
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