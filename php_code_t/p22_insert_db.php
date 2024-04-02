<?php
    $con=mysqli_connect("localhost","root","","newphp");
    if(!$con){
        die("Connection failed<br>");
    }else{
        echo "connection done<br>";
    }

    // $sql="INSERT INTO `new_table`(`name`,`dest`) VALUES(`dev`,`goa`)"; error
    // in php sql value insert inside ''
    $sql="INSERT INTO `new_table`(`name`, `dest`) VALUES ('mukesh','bhopal')";
    $result=mysqli_query($con,$sql);
    if($result>0){
        echo "$result rows insert";
    }else{
        echo "insertion failed";
    }
?>