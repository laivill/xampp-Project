<?php
session_start();
include "../../../login/DBuser.php";

$sql="create table if not exists tbl_book( id mediumint primary key auto_increment,title varchar(100),author varchar(50),Date_pub date,status enum('Available','Borrowed'));";
$result=$con->query($sql);

$sql="create table if not exists student( S_id mediumint primary key auto_increment,name varchar(50),college varchar(100),course varchar(50),`year` enum('1st Year','2nd Year','3rd Year','4th Year'));";
$result=$con->query($sql);

$sql="create table if not exists book_borrow( B_id smallint primary key auto_increment,stud_id mediumint,book_id mediumint,date_out date,date_in date,date_due date,fine enum('100','Paid','0'),status enum('Returned','Borrowed'), foreign key(stud_id) references student(S_id) ON UPDATE CASCADE,foreign key(book_id) references tbl_book(id) ON UPDATE CASCADE);";
$result=$con->query($sql);

$sql="create TRIGGER if not exists `book_status` AFTER insert ON `book_borrow` FOR EACH ROW update tbl_book set status='Borrowed' where id=new.book_id;";
$result=$con->query($sql);

$sql="create TRIGGER if not exists `book_stat` AFTER update ON `book_borrow` FOR EACH ROW update tbl_book set status='Available' where id=new.book_id;";
$result=$con->query($sql);

$sql="create table if not exists tbl_countB(id smallint primary key auto_increment,book_title varchar(100) unique,count int);";
$result=$con->query($sql);

$sql="create table if not exists tbl_unreturnB(id smallint primary key auto_increment,book_title varchar(100) unique,count int);";
$result=$con->query($sql);
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
        <div class="sbook">
            <form action="bookS.php" method="post">
            <input type="text" class="search1" name="title" placeholder="Book Title"><button class="search">Search</button>
            
            </form>
        </div>
        <div class="box2">
            <a href="addBooks.php" ><i class='bx bx-add-to-queue' ></i></a>
        </div>
    </header><hr>
    <div class="tbox">
        
    <table border="0" width="90%">
        <thead>
        <tr>
            <th class="head1">Accession No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date Publish</th>
            <th  class="head2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql="select * from tbl_book;";
            $result=$con->query($sql);

            while($row=$result->fetch_assoc()){
                echo "
                <tr class='rows'>
                <td>$row[id]</td>
                <td>$row[title]</td>
                <td>$row[author]</td>
                <td>$row[Date_pub]</td>
                 <td>
                <a href='editbook.php?id=$row[id]'>Edit</a>
                </td>
                </tr>
            ";}
       ?>
        </tbody>
    </table>
    </div>
</body>
</html>