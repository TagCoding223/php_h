<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="user_login_system";

    $con=mysqli_connect($server,$username,$password,$database);
    if($con){
        // echo "Success";
    }else{
        include './partials/_offline_bootstrap.php';
        die("<div class='alert alert-danger fade show' role='alert'>
        <strong>Sever Unavaliable!</strong> ". mysqli_connect_error() ." !!!
        </div>");
    }
?>