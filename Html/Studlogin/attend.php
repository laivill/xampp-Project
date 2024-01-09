<?php
$sname= "localhost";
$db_name= "library";
$admin="student";
$pass="Meljay04";

try{
    $studcon=mysqli_connect($sname, $admin, $pass, $db_name);
}catch(mysqli_sql_exception $e){
    header("Location: LogIn.php?error=Incorrect username and password!");
    exit();
}

$stud_id=0;
$enteredQRCode='';
if(isset($_GET['qr_code'])){
$enteredQRCode= $_GET['qr_code'];
$stud_id=$enteredQRCode;
$sql="Select * From student where S_id=$stud_id;";
$result=$studcon->query($sql);
$row=$result->fetch_assoc();
if($row['S_id']===$stud_id){
    $sql="Insert Into attendance(stud_id, date_in, time_in) values ($stud_id, now(), now());";
    $result=$studcon->query($sql);
}
else{header("Location: attend.php?error=STUDENT NOT FOUND!");
exit();}
}


$sql="Create table if not exists attendance(id mediumint primary key auto_increment, stud_id mediumint, date_in date, time_in time, foreign key(stud_id) references student(S_id));";
$result=$studcon->query($sql);

if(isset($_POST['stud_id'])){
$stud_id=$_POST['stud_id'];

if(!empty($stud_id)){

$sql="Select * From student where S_id=$stud_id;";
$result=$studcon->query($sql);
$row=$result->fetch_assoc();
if($row['S_id']===$stud_id){
    $sql="Insert Into attendance(stud_id, date_in, time_in) values ($stud_id, now(), now());";
    $result=$studcon->query($sql);
}
else{header("Location: attend.php?error=STUDENT NOT FOUND!");
exit();}
}else{
    $stud_id=0;
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?> ">
</head>
<body>
    
        <div class="container">
            <div class="qrbox">
                <h2>Please Login Here!</h2>
                <div class="qr">
                <script src="../../js/instascan.min.js"></script>
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
window.location.href="attend.php?qr_code=" + c;
})
      

</script>

                </div>
                <div class="sid">
                    <br>
                <form action="attend.php" method="POST">
            <?php if (isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
                    <label id="IDstud">Student ID:</label><br>
                    <input type="text" class="studId" placeholder="21****" name="stud_id">
                    <button type="submit">Enter</button>
                    </form>
                </div>
            </div>
            <div class="wel">
                <h2 id="welc">Welcome to ISUE Library!</h2>
            <div class="info">
            <div class="infobox">
                <?php
                     $sql = "select s.name, s.college, s.course, s.year, a.date_in, a.time_in FROM `attendance` as a inner join student as s on a.stud_id=s.S_id where stud_id=$stud_id AND a.time_in=now();";
                     $result= mysqli_query($studcon, $sql);
                     
                     if(mysqli_num_rows($result)===1){
                    $rows=mysqli_fetch_assoc($result);
                    echo "<label>Name:</label>
                    <input type='text' class='name' Value='$rows[name]' disabled><br>
                    <label>College:</label>
                    <input type='text' class='college' Value='$rows[college]' disabled><br>
                    <label>Course:</label>
                    <input type='text' class='course' Value='$rows[course]' disabled><br>
                    <label>Year:</label>
                    <input type='text' class='year' Value='$rows[year]' disabled><br>
                    <label>Date:</label>
                    <input type='text' class='date' Value='$rows[date_in]' disabled><br>
                    <label>Time In:</label>
                    <input type='text' class='time' Value='$rows[time_in]' disabled><br>";
                    }
                    else{
                    echo "<label>Name:</label>
                    <input type='text' class='name' Value='' disabled><br>
                    <label>College:</label>
                    <input type='text' class='college' Value='' disabled><br>
                    <label>Course:</label>
                    <input type='text' class='course' Value='' disabled><br>
                    <label>Year:</label>
                    <input type='text' class='year' Value='' disabled><br>
                    <label>Date:</label>
                    <input type='text' class='date' Value='' disabled><br>
                    <label>Time In:</label>
                    <input type='text' class='time' Value='' disabled><br>";
                    }
                ?>
            </div>
            </div>
            </div>
        </div>
   

</body>
</html>