<?php
session_start();
include "../../../login/DBadmin.php";

$id=$_GET['id'];
if(empty($id)){
    $id=$_SESSION['id2'];
}
$sql="select * from account where id=$id;";
$result=$conn->query($sql);
$rows=mysqli_fetch_assoc($result);
$_SESSION['id']=$id;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
    margin: 0;
    padding: 0;
}
body{
    background-color: rgb(240, 240, 232);
}

hr{
    width: 96%;
    margin-left: 2%;
}

.bookInput{
    width: 50%;
    height: 75vh;
    background: white;
    margin-top: 5%;
    margin-left: 25%;
    padding-right: 5%;
    border-radius: 10px;
    font-size: 200;
    text-align: center;
    border: 1px solid rgba(0, 0, 0, 0.432);
}
input{
    background: white;
    border: none;
    outline: none;
    border:2px solid #2888d1;
    color: #135588;
    border-radius: 4px;
    padding-left: 10px;
    margin-top: 10px;
    height: 7vh;
}

.container{
    width: 100%;
    height: 95%;
    display: flex;
    align-content: center;
    margin-bottom: 15px;
    margin-top:5%;

}
.inputName{
    width: 30%;
    height: 100%;
    text-align: right;
    padding-left: -10%;
}
.inputbox{
    width: 70%;
    height: 100vh;
    text-align: left;
    padding-right: 3px;
}
p{
    margin-top: 25px ;
    padding-right: 6px;
    font-size: x-large;
}
.Accession{
width: 40%;
font-size: 20px;
}
.title{
    width: 90%;
    font-size: 20px;
    }
.dateP{
    width: 55%;
    font-size: 20px;
    }
.Author{
    font-size: 20px;
    width: 75%;
    }
   
    .btn{
        display:flex;
        margin-top:5%;
    }
    .save{
        background-color: #2888d1;
        color: white;
        border-radius: 30px;
        padding-top: 0.7px;
        border: #2888d1 1px solid;
        width: 25%;
        height: 5vh;
        font-weight: 700;
        font-size: large;
    }

    select{
        width: 40%;
        height: 7%;
        padding-left: 2px;
        font-size: 20px;
        border: 2px solid #2888d1;
        border-radius: 4px;
    }
    a{
        text-decoration: none;
        color: white;
    }
    button:hover{
            background-color: #cde9ff;
            border: none;
            outline: none;
            border: 2px solid #52ABED;
        }
        a:hover{
            color:#135588;
        }
        input:hover{
            background-color: #ebf6ff;
        }
        select:hover{
            background-color: #ebf6ff;
        }
        .error{
            background: #f2dede;
            color: #a94442;
            padding: 10px;
            width: 80%;
            border-radius: 5px;
            margin-left:13%;
        }
        .cancel{
            border-radius: 30px;
            padding-top: 0.7px;
            font-size: large;
            font-weight: 700 ;
            border: none;
            width: 25%;
            height: 5vh;
            font-size: large;
            margin-right: 3px;
            margin-left: 50%;
            background-color:white;
        }
        .can{
            text-decoration: none;
            color: rgb(114, 112, 109);
        }
    
    
    </style>
    
</head>
<body>
    <div class="bookInput">
        <form action="editing.php" method="post">
            <br><h2>Enter User Details</h2>
            <?php if (isset($_GET['error'])) {?>
                 <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?> 
            <div class="container">
                <div class="inputName">
                    <p>Username </p><br>
                    <p>Password</p><br>
                    <p>Role</p><br>
                </div>
                    <div class="inputbox">
                        <input type="text" class="title" required value="<?php echo $rows['user_name']?>" name="username" ><br><br>
                        <input type="password" class="Author" required value="<?php echo $rows['password']?>" name="password" ><br><br><br>
                            <?php
                            if($rows['role']==="Librarian"){
                                echo "
                                <select id='role' name='role'>
                                <option value='Librarian'>Librarian</option>
                                <option value='Administrator'>Admin</option>
                                <option value='Student' name='role'>Student</option>
                                </select>
                                ";
                            }elseif($rows['role']==="Administrator"){
                                echo "
                                <select id='role' name='role'>
                                <option value='Administrator'>Admin</option>
                                <option value='Librarian'>Librarian</option>
                                <option value='Student' name='role'>Student</option> 
                                </select>                              
                                ";
                            }else{
                                echo "
                                <select id='role' name='role'>
                                <option value='Student' name='role'>Student</option>
                                <option value='Librarian'>Librarian</option>
                                <option value='Administrator'>Admin</option>
                                </select>
                                ";
                            }
                            
                            ?>
                        <br><br>
                        <div class="btn">
                        <button class="cancel"><a href="user.php" class="can">Cancel</a></button>
                        <button class="save" type="submit">SAVE</button>
                        </div>
                        
                        
                     </div>
                </div>
        </form>
    </div>      
</body>
</html>