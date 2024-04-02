<?php
// Option 1 -> MySqli extension (work only with mysql db)
// i)producel           ii) oop's
// Option 2 -> PDO(php data object) work with every db

// producel 

$servername="localhost";
$username="root";
$password="";
$con= mysqli_connect($servername,$username,$password); // we also pass database name if db already created
if(!$con){
    die("Sorry we failed to connect :".mysqli_connect_error()); // this line termined program
}
else{
    echo "Connection was successful!";
}
?>