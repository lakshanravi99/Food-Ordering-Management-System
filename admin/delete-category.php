<?php

//echo "Delete Page";
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'food_sys') or die(mysqli_error()); //selecting database

if(isset($_GET['id']) AND isset($_GET['image_name'])){

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];


    if($image_name !=""){
        $path = "../images/category".$image_name;
        $remove = unlink($path);

        if($remove==false){
            $_SESSION['remove']= "<div class ='error'>Failed to Remove Category Image.</div>";
            header("location:".'http://localhost/foodsystem/admin/manage-category.php');

            die();
        }
    }

    $sql = "DELETE FROM category WHERE id='$id' ";

    $res = mysqli_query($conn,$sql);

    if($res == true){
             $_SESSION['delete']= "<div class ='success'>Category Deleted Successfully.</div>";
            header("location:".'http://localhost/foodsystem/admin/manage-category.php');
    }
    else{
        $_SESSION['delete']= "<div class ='error'>Category Deleted Successfully.</div>";
        header("location:".'http://localhost/foodsystem/admin/manage-category.php');
    }

}
    else{
        header("location:".'http://localhost/foodsystem/admin/manage-category.php');
    }





?>