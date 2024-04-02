<?php
    $con=mysqli_connect("localhost","root","","newphp");
    if (!$con) {
        die("Connection failed");
    } else {
        echo "connection done.<br>";
    }

    // $sql="UPDATE `new_table` SET `name`='rohan' WHERE `sno`='1'"; update only one variable
    $sql="UPDATE `new_table` SET `name`='deepak',`dest`='indore' WHERE `sno`='1'";
    $result=mysqli_query($con,$sql);
    if ($result) {
        $aff=mysqli_affected_rows($con);
        echo "Updation success , ".$aff." row affected";
    }else{
        echo "Updation failed because -> ".mysqli_error($con);
    }
?>