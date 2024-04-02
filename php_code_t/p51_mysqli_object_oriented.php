<?php
    // MySQLi Object-Oriented
    $sever="localhost";
    $username="root";
    $password="";

    // create connection
    $con=new mysqli($sever,$username,$password);

    // Check connection
    if(mysqli_connect_error()){
        die("Database connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    // Close the Connection
    $con->close();
?>