<?php
    // MySQLi Procedural method to connect db(if table already created then you also connect with table)
    $sever="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($sever,$username,$password);
    if($con){
        echo 'connection done';
    }else{
        die("connection fail ".mysqli_connect_error());
    }
    // Close the Connection
    mysqli_close($con);
?>