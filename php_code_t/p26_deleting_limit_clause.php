<?php
    $con=mysqli_connect("localhost","root","","newphp");
    if (!$con) {
        die("Connection failed");
    } else {
        echo "connection done.<br>";
    }

    // $sql="DELETE FROM `new_table` WHERE `dest`='bhopal'";// DELETE all rows there dest bhopal
    $sql="DELETE FROM `new_table` WHERE `dest`='bhopal' LIMIT 1";// DELETE TOP FIRST row there dest bhopal (limit define affected rows)
    $result=mysqli_query($con,$sql);
    if ($result) {
        $aff=mysqli_affected_rows($con);
        echo "deletetion success , ".$aff." row affected";
    }else{
        echo "deletetion fail because -> ".mysqli_error($con);
    }
?>