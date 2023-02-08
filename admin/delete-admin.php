<?php 

session_start();

$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'food_sys') or die(mysqli_error()); //selecting database

//1. get the ID of admin to be deleted

$id = $_GET['id'];

//2. Create SQL query to delete admin
$sql = "DELETE FROM admin WHERE id=$id";
$res = mysqli_query($conn,$sql);

//3. Redirect to manage admin page with message(sucess/error)
if($res == TRUE){

    //query executed successfully and admin deleted
    //echo "Admin deleted";
    // create session variable
    $_SESSION['delete'] = "<div class ='success'>Admin deleted sucessfully.</div>";
    //redirect to manage admin page
    header("location:".'http://localhost/foodsystem/admin/manage-admin.php');


}
else{
    //echo "Failed to admin deleted";

    $_SESSION['delete'] = "<div class ='error'>Failed to Delete</div> ";
    header("location:".'http://localhost/foodsystem/admin/manage-admin.php'); 
}




?>