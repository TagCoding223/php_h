<?php
    $con=mysqli_connect("localhost","root","","newphp");
    if(!$con){
        echo "Connection failed<br>";
    }else{
        echo "Connection done<br>";
    }

    // $sql="CREATE TABLE 'newphp'.'table_name'('sno' int(6) not null AUTO_INCREMENT,'name' varchar(12) not null , 'dest' varchar(6) not null , primary key ('sno')) ENGINE=InnoDB"; not run this sql first replace '->`
    // $sql="CREATE TABLE `newphp`.`table_name` (`sno` INT(6) NOT NULL AUTO_INCREMENT , `name` VARCHAR(12) NOT NULL , `dest` VARCHAR(6) NOT NULL , PRIMARY KEY (`sno`)) ENGINE = InnoDB";

    // when you write sql query in php then write in capiter form and use ` in place of '
    $sql="CREATE TABLE `newphp`.`new_table`(`sno` INT(6) NOT NULL AUTO_INCREMENT,`name` VARCHAR(12) NOT NULL ,`dest` VARCHAR(6) NOT NULL , PRIMARY KEY (`sno`)) ENGINE = InnoDB";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "<br>table created!";
    }else{
        echo "<br>table creation failed. because -> ".mysqli_error($con);
    }
?>