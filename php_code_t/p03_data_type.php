<?php
    // Data Types in php

    // 1 String : Squence of character
    $string ="vishal";
    echo "my name is $string <br>";

    // 2 Integer : non decimal value
    $a=101;
    $b=-67;
    echo "positive integer : $a and negative integer : $b <br>";

    // 3 Float : decimal point number
    $a=78.90; // override variables here
    $b=-55.6;
    echo "Decimal point positive float : $a and Decimal point negative float : $b <br>";

    // 4 Boolean : can be either true and false
    $x=true;
    $y=false;
    // echo is not a good way to print & identify datatype use var_dump() function
    echo "value of x : ".var_dump($x)." and value of y : ". var_dump($y)."<br>";

    // 5 Object : instance of a classes

    // 6 Array : used to store multiple values in single line
    $marks=array(67,90,46,89);
    echo var_dump($marks);//print all variables with index and datatype
    echo "<br>".$marks[3];

    // 7 Null = nothing , used to reset a variable
    $pop=NULL;
    echo $pop;
    echo var_dump($pop);
?>