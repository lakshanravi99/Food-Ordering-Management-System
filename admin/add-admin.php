<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">

    <h1>Add Admin</h1>
    <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>                             
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Enter Your Username"></td>           
            </tr>                

            <tr>
                <td>Password:</td>
                <td> <input type="password" name="password" placeholder="Enter Your Password"></td>

            </tr> 
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>

        </table>


    </form>

</div>


</div>


<?php include('partials/footer.php'); ?>

<?php 

//process the value from form and save it in database

//check whether submit button clicked or not

if(isset($_POST['submit'])){
   // echo "button clicked";

   //1.get the data from our form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password']; //password encrypted with MD5

    //2.SQL query to save the data into database
    $sql= "INSERT INTO  admin  SET 
        full_name='$full_name',
        username='$username',
        password = '$password'
    ";
    //echo $sql;

    //3.Execute query and save data in database
    $conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn,'food_sys') or die(mysqli_error()); //selecting database
    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    //4.check whether the (query is executed) data is inserted or not and display appropiate message
    
    if($res == TRUE){
        //data inserted
        //echo "data inserted";
        //start session
        session_start();
        $_session['add'] = "Admin Added Sucessfully";
        //Redirect page to Manage Admin
        header("location:".'http://localhost/foodsystem/admin/manage-admin.php');





    }
    else{
        //data not inserted
       // echo "data not inserted";
       session_start();
        $_session['add'] = "Failed toAdded Sucessfully";
        //Redirect page to Add Admin
        header("location:".'http://localhost/foodsystem/admin/add-admin.php');

    }


}
?>