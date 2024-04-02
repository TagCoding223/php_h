<?php
// connection to db server
    $con=mysqli_connect("localhost","root","");
    if (!$con) {
        die("Connection Failed");
    }else{
        echo "Connection done .<br>";
    }
// create new db in server
    $sql="Create Database newphp";
    $result=mysqli_query($con,$sql); // this time return true or false
    if($result){
        echo "Database created !";
    }else{
        echo "Database creation fail because -> ".mysqli_error($con);
    }

?>