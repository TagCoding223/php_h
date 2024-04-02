<?php
// if file has syntax error then include and require display parse error
    // include '_db_connect.php';
    // require '_db_connect.php';

// if file name while be wrong or file does not exist then include display warring and allow other code to run , but require termined the program
    // include '_db1_connect.php';
    // echo "<br>include show warring<br>";
    // require '_db1_connect.php';
    // echo "<br>require show error<br>";

    include '_db_connect.php';
    $sql="SELECT * FROM `new_table`";
    $result=mysqli_query($con,$sql);
    echo "<hr><br><strong style='font-size:16pt;'>Display without var dump</strong>";
    
        while ($row=mysqli_fetch_assoc($result)) {
            echo "<br>".$row['sno']." hello ".$row['name']." welcome to ".$row['dest'];
        }
    
?>