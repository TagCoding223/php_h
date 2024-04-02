<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="idiscuss";

    $con=mysqli_connect($servername,$username,$password,$database);
    if(!$con){
        include './partials/_offline_bootstrap.php';
        die("<div class='alert alert-danger fade show' role='alert'>
        <strong>Sever Unavailable!</strong> ". mysqli_connect_error() ." !!!
        </div>");
    }else{
        // echo "Done";
    }
?>