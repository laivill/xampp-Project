<?php
include "../../../login/DBuser.php";

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
        <div class="box1">Books Out</div>
    </header><hr>
    <div class="tbox">
        
    <table border="0" width="90%">
        <thead>
        <tr>
            <th class="head1">Student ID</th>
            <th>Name</th>
            <th>Accession No.</th>
            <th>Title</th>
            <th>Date Out</th>
            <th>Due Date</th>
            <th>Fine</th>
            <th  class="head2">Status</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * FROM `book_borrow`;";
            $result= mysqli_query($con, $sql);
            $rows=mysqli_fetch_assoc($result);
            
            if(mysqli_num_rows($result)>0){
            if($rows['fine']==='0'){
                $sql="update book_borrow set fine='100' where  `date_due`<=now() AND fine='0' ;";
                $result=$con->query($sql);
            }
            }
            $sql="select s.S_id,s.name,b.id,b.title,br.date_out,br.date_due,br.fine,br.status from book_borrow as br inner join tbl_book as b inner join student as s on br.stud_id=s.S_id and br.book_id=b.id where br.status='Borrowed' or fine='100';";
            $result=$con->query($sql);

            while($row=$result->fetch_assoc()){
                echo "
                <tr class='rows'>
                <td>$row[S_id]</td>
                <td>$row[name]</td>
                <td>$row[id]</td>
                <td>$row[title]</td>
                <td>$row[date_out]</td>
                <td>$row[date_due]</td>
                <td>$row[fine]</td>
                <td>$row[status]</td>
                </tr>
            ";}
            ?>
         </tbody>
    </table>
    </div>
</body>
</html>