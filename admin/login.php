<?php   
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'food_sys') or die(mysqli_error()); //selecting database


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food System</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body style="background-image: url('../images/login-bg.jpg');" >
    <div class="login" >
        <h1 class="text-center" > Login</h1><br>
        
        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

        ?>
        <br><br>

        <form action="" method="POST" class="text-center">
            Username: <br> 
            <input type="text" name="username" placeholder="Enter Username"> <br><br>

            Password: <br> 
            <input type="password" name="password" placeholder="Enter Password"> <br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary"><br>
        
        
        </form><br>


        <p class="text-center">Created By - <a href="#" >Lakshan Ravindu</a></p>
    
    </div>
</body>
</html>

<?php

if(isset($_POST['submit'])){

    $username=$_POST['username'];
    $password= $_POST['password'];

    $sql = " SELECT * FROM admin WHERE username='$username' AND password='$password' " ;
    
    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);
    //echo $count;

    if($count== 1){
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        header("location:".'http://localhost/foodsystem/admin/index.php');
    }

   else{
        $_SESSION['login'] = "<div class='success'>Username or Password did not matched.</div>";
        header("location:".'http://localhost/foodsystem/admin/login.php');
    }


}

?>