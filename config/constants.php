<?php
// Create contants to store non repeating values


    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food_sys');
//3.Execute query and save data in database
    $conn = mysqli_connect('LOCALHOST','DB_USERNAME','DB_PASSWORD') or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn,'DB_NAME') or die(mysqli_error()); //selecting database


/*
    $conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn,'food_sys') or die(mysqli_error()); //selecting database
    
    */


    ?>


