<?php
include "../../../login/DBuser.php";
$sql='select * from tbl_unreturnb ORDER BY count DESC';
$result=$con->query($sql);

if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        $title[]=$row['book_title'];
        if(empty($row['count'])){
            $count[]=0;
        }else{
            $count[]=$row['count'];
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?> ">
    <script src="js/jquery-1.9.1.js"></script>
</head>
<body>
    <header>
        <div class="option"><a href="attenddash.php">Students <br> Attendance</a></div>
        <div class="option"><a href="barroweddash.php">Frequently <br> Barrowed</a></div>
        <div class="optionS"><a href="unreturneddash.php">Unreturned <br> Books</a></div>
        <div class="option"><a href="overduedash.php">Overdue <br> Books</a></div>
    </header>

    <div class="chartU">
    <canvas id="myChart" ></canvas>
    </div>

<script src="js/charts.js"></script>
<script>

var ctx = document.getElementById('myChart');
var myChart=new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($title); ?> ,
      datasets: [{
        label: 'book',
        data: <?php echo json_encode($count); ?>,
        backgroundColor: [
      'rgba(255, 99, 132, 0.8)',
      'rgba(255, 159, 64, 0.8)',
      'rgba(255, 205, 86, 0.8)',
      'rgba(75, 192, 192, 0.8)',
      'rgba(54, 162, 235, 0.8)',
    ],
        borderWidth: 3
      }]
    },
    options: {
        responsive: true,
    },
  });
</script>

</body>
</html>