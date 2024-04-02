<?php
    $con=mysqli_connect("localhost","root","","newphp");
    if (!$con) {
        die("Connection failed");
    } else {
        echo "connection done.<br>";
    }
    $sql ="SELECT * FROM `new_table` WHERE `dest`='bhopal'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    echo "<br> $num recods found in the db.<br><br>";
    if ($num>0) {
        $no=1;
        while($row=mysqli_fetch_assoc($result)){
            // echo $row['sno']." hello ".$row['name']." welcome to ".$row['dest']."<br>";
            echo $no." hello ".$row['name']." welcome to ".$row['dest']."<br>";
            $no++;
        }
    }
?>