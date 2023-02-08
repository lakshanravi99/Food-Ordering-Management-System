<?php
session_start();

$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'food_sys') or die(mysqli_error()); //selecting database

if(isset($_GET['id']) && isset($_GET['image_name'])){


   // echo "Process to Delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name !=""){
        $path = "..images/category/".$image_name;

        $remove = unlink($path);

        if($remove==false){
            $_SESSION['upload'] = "<div class = 'error'>Failed to Remove Image File.</div>";
            header("location:".'http://localhost/foodsystem/admin/manage-food.php');

            die();
        }
    }

        $sql = "DELETE FROM food WHERE id=$id";
        $res = mysqli_query($conn,$sql);

        if($res==true){
            $_SESSION['delete'] = "<div class = 'success'>Food Deleted Successfully.</div>";
            header("location:".'http://localhost/foodsystem/admin/manage-food.php');
        }
    else{
        $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Food.</div>";
        header("location:".'http://localhost/foodsystem/admin/manage-food.php');

    }

}
else{

    $_SESSION['unauthorized'] = "<div class ='error'>Unauthorized Access.</div>";
    header("location:".'http://localhost/foodsystem/admin/manage-food.php');
}

?>