<?php
    $age=28;
    // singal if
    if($age==18){
        echo "<br>You are 18.<br>";
    }

    // if with else
    if($age>50){
        echo "<br>You enjoy your half life .<br>";
    }else{
        echo "<br>You are so young.<br>";
    }

    // if else ladder - execcute only one block in this ladder (if upper block execute then break the ladder and jump)
    if($age>=18){
        echo "<br>you can drive.<br>";
    }elseif($age>=13){
        echo "<br>You are too young can't drive right now.<br>";
    }elseif($age<25){
        echo "<br>I am waiting for your 25 birthday.<br>";
    }else{
        echo "<br>else block ";
    }

    // nested if-else
    if($age>=18){
        if($age<70){
            echo "<br>Your current age belongs to right area of rto.<br>";
        }
        else{
            "<br>You can't  drive now.<br>";
        }
    }
    else{
        if($age<=15){
            echo "<br>you can't drive because you are a child .<br>";
        }
        else{
            echo "<br>your age valid for learning licence.<br>";;
        }
    }
?>