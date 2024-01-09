<?php
include "../../../login/DBuser.php";
session_start();
$id="0";
$enteredQRCode='';
if(isset($_GET['qr_code'])){
$enteredQRCode= $_GET['qr_code'];
$id=$enteredQRCode;
$sql = "select * from student where S_id='$enteredQRCode'";
    $result= mysqli_query($con, $sql);
        
    if(mysqli_num_rows($result)===1){
        $_SESSION['id']=$id;
        header("Location: bookR.php");
    }else{
        header("Location: scanner.php?error=No result!");
        exit();
    }
}
if(isset($_POST['id'])){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $id=validate($_POST['id']);

    $sql = "select * from student where S_id='$id'";
    $result= mysqli_query($con, $sql);
        
    if(mysqli_num_rows($result)===1){
        $_SESSION['id']=$id;
        header("Location: bookR.php");
    }else{
        header("Location: scanner.php?error=No result!");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>scanner</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    }
    body{
    background-color: rgb(240, 240, 232);
    text-align: center;
    }
    .scanBox{
        width: 40%;
        height: 75vh;
        min-height:50vh;
        margin-top: 6%;
        margin-left: 30%;
        border-radius: 10px;
        padding-top: 3%;
        border: 1px solid lightgray;
        background-color: #ecf6ff;
    }
    video{
        width:90%;
        
    }
.stud .search1{
width: 70%;
height: 4vh;
border: none;
border-radius: 2px;
border-bottom: solid 1px;
margin-right: 1%;
background-color: #ecf6ff;
text-align: center;
}
.search{
    margin-top:3%;
    width:20%;
    height:4vh;
}
p{
    font-size: larger;
}

    </style>
    <script src="../../../../js/instascan.min.js"></script>
</head>
<body>
<div class="scanBox"><div class="vid">
    <video id="preview" autoplay playsinline></video>

    <script>
let scanner=new Instascan.Scanner({video: document.getElementById('preview')});
Instascan.Camera.getCameras().then(function (cameras){
    if(cameras.length>0){
        scanner.start(cameras[0]);
    }else{
        alert("No camera detected!")
    }
}).catch(function(e){
    console.error(e);
});
scanner.addListener('scan',function(c){
    console.log(c)
    window.location.href="scanner.php?qr_code=" + c;
})
          
 
    </script>

</div>
<?php echo $enteredQRCode?>
<p>-----or-----</p>
<div class="stud">
    <form action="scanner.php" method="post"><br>
            <?php if (isset($_GET['error'])) {?>
                 <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
    <input type="number" class="search1" name="id" placeholder="Student ID."><br>
    <button class="search" >Enter</button>     
    </form>
</div>
</div>
</body>
</html>