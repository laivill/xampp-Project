<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>option</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .book{
            position: relative;
            padding: 5% 3%;
            border-bottom: #2888d1 1px solid;
            color: white;
            display:flex;
        }
        .book i{
            color: #52ABED;
            left: 5px;
            font-size: 25px;
        }
        .book a{
            text-align: center;
            text-decoration: none;
            font-size: larger;
            color: #2888d1;
            margin-left: 1%;
        }

        a:hover{
            color:white;
            
        }
        .book:hover{
            color: white;
            background-color: #cde9ff;
        }


    </style>
</head>
<body>
    <div class="book">
        <i class='bx bx-library'></i>
        <a href="../admin/Html/management/bookM.php" target="main">Manage Books</a><br>
    </div>
    <div class="book">
        <i class='bx bxs-bookmark-alt-plus'></i>
        <a href="../admin/Html/release/scanner.php" target="main">Release a Book</a><br>

    </div>
    <div class="book">
        <i class='bx bxs-bookmark-alt-minus'></i>
        <a href="../admin/Html/outbook/bookO.php" target="main">Books Out</a><br>
    </div>
    <div class="book">
        <i class='bx bxs-bar-chart-square'></i>
        <a href="../admin/Html/dashboard/attenddash.php" target="main" class="">Dashboard</a>
    </div>
</body>
</html>