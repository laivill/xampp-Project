<?php
include "../../../login/DBuser.php";
if(isset($_POST['title']) ){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $title=validate($_POST['title']);
    $titleDisplay=$title;
    $title .="%";

}
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
            <input type="text" class="search1" name="title" value="<?php echo $titleDisplay;?>" placeholder="Book Title"><button class="search">Search</button>
            
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
            $sql="select * from tbl_book where title like '$title';";
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