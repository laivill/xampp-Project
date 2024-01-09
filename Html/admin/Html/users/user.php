<?php
session_start();
include "../../../login/DBadmin.php";
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
        <div class="box1">User List</div>
        <div class="box2">
            <a href="add.php"><i class='bx bx-add-to-queue'></i></a>
        </div>
    </header><hr>
    <div class="tbox">
    <table border="0" width="90%">
        <thead>
        <tr>
            <th class="head1">ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
            <th  class="head2">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $sql="select * from account where id>0;";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
                echo "
                    <tr class='rows'>
                    <td>$row[id]</td>
                    <td>$row[user_name]</td>
                    <td>$row[role]</td>
                    <td>
                        <a href='stat.php?id=$row[id]'>$row[status]</a>
                    </td>
                    <td>
                        <a href='edit.php?id=$row[id]'>Edit</a>
                     </td>
                    </tr>
                ";
            }
            ?>
        
        </tbody>
    </table>
    </div>
</body>
</html>