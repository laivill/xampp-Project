<?php
include "../../../login/DBuser.php";
session_start();

$stud_id=$_SESSION['id'];
$title="";
$book_id="";

if(isset($_POST['id'])){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    try{
        $book_id=validate($_POST['id']);
        $sql="select * from tbl_book where id=$book_id and status='Available';";
        $result=$con->query($sql);
        $rows=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)===1){
            $title=$rows['title'];
            $book_id=$rows['id'];                   
        }else{
            $title='No Result!';
        }
    }catch(mysqli_sql_exception $e){
        $title="";
    }                           
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?> ">
</head>
<body>
    <div class="box1">
        <div class="stud">
            <h2>Student's Information</h2> 

            <div class="container">
                <div class="inputName">
                    <p>Student ID.</p>
                    <p>Name: </p>
                    <p>College:</p>
                    <p>Course:</p>
                    <p>Year:</p>
                    </div>
                    <div class="inputbox">
                    <?php
                        try{
                            $sql="select * from student where S_id='$stud_id';";
                            $result=$con->query($sql);
                            $rows=mysqli_fetch_assoc($result);                        
                        }catch(mysqli_sql_exception $e){
                            $sql="select * from student where S_id=0;";
                        $result=$con->query($sql);
                        $rows=mysqli_fetch_assoc($result);
                        }
                        
                    ?>
                    <input type='text' class='studId' value='<?php echo $rows['S_id'];?>' disabled> <br>
                    <input type='text' class='name'  value='<?php echo $rows['name'];?>' disabled><br>
                    <input type='text' class='college'  value='<?php echo $rows['college'];?>' disabled><br>
                    <input type='text' class='course'  value='<?php echo $rows['course'];?>' disabled><br>
                    <input type='text' class='year' value='<?php echo $rows['year'];?>' disabled><br>        
                    </div>
            </div>
        </div>
        <div class="bookacs">
            <form action="bookR.php" method="post">
            <h2 class="enter">Enter</h2>
            <input type="number" placeholder="Accession NO." name="id" class="sac2">
            <button>Enter</button>
            </form>
            <form action="borrow.php" method="post">
            <h4>Book Title Matched:</h4>
             <input type='text' class='sac' value='<?php echo $title;?>' disabled>
             <?php
             if($title==="No Result!" || $title===""){
                $_SESSION['book_id']='';
             }else{
                $_SESSION['stud_id']=$stud_id;
                $_SESSION['book_id']=$book_id;
             }
             ?>
            <button>OUT</button>
            </form>

        </div>
    </div>
    <div class="box2">
        <h2>Student's Previous Transaction</h2>
        
        <div class="tbox">
        <table border="0" width="90%">
            <thead>
            <tr>
                <th class="head1">Accession No.</th>
                <th>Title</th>
                <th>Date Out</th>
                <th>Date In</th>
                <th>Fine</th>
                <th>Status</th>
                <th  class="head2">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql="select br.B_id,b.id,b.title,br.date_out,br.date_in,br.fine,br.status from book_borrow as br inner join tbl_book as b on br.book_id=b.id where br.stud_id=$stud_id order by br.status desc;";
            $result=$con->query($sql);

            while($row=$result->fetch_assoc()){
                echo "
                <tr class='rows'>
                <td>$row[id]</td>
                <td>$row[title]</td>
                <td>$row[date_out]</td>
                <td>$row[date_in]</td>
                <td>
                <a href='paidB.php?id=$row[B_id]'>$row[fine]</a>
                </td>
                <td>$row[status]</td>
                 <td>
                <a href='returnB.php?id=$row[B_id]'>Return</a>
                </td>
                </tr>
            ";}
       ?>
           
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>