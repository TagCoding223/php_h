<?php
    $con=mysqli_connect("localhost","root","","newphp");
    if(!$con){
        die("Connection failed<br>");
    }else{
        echo "Connection done.<br>";
    }

    $sql="SELECT * FROM `new_table`";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    echo "Rows in db : $num <br>";
    
    // display first row
    // if ($num>0) {
    //     $row=mysqli_fetch_assoc($result);
    //     echo var_dump($row);
    // }

    // display all rows
    // if ($num>0) {
    //     while ($row=mysqli_fetch_assoc($result)) {
    //         echo var_dump($row)."<br>";
    //     }
    // }
    
    echo "<hr><br><strong style='font-size:16pt;'>Display without var dump</strong>";
    if ($num>0) {
        while ($row=mysqli_fetch_assoc($result)) {
            echo "<br>".$row['sno']." hello ".$row['name']." welcome to ".$row['dest'];
        }
    }
?>