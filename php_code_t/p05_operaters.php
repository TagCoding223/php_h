<?php
    $a=67;
    $b=89;
    $x=true;
    $y=false;

    echo "<strong><pre>";
    echo "a : $a    b : $b      x : ";
    echo var_dump($x);
    echo "     y : ";
    echo var_dump($y);
    echo "<br></pre></strong>";

    // Arthimetic operaters
    
    echo "<br>Arithmetic Operator<br>";
    echo "a-b is : ".($a-$b)."<br>";
    echo "a*b is : ".($a*$b)."<br>";
    echo "a/b is : ".($a/$b)."<br>";
    echo "a+b is : ".($a+$b)."<br>";
    echo "a%b is : ".($a%$b)."<br>";
    echo "a**b is : ".($a**$b)."<br>";

    // logical operaters
    
    echo "<br>Logical Operator<br>";
    echo "x && y is : ";
    echo var_dump($x && $y)."<br>";
    echo "x and y is : ";
    echo var_dump($x and $y)."<br>";

    echo "x || y is : ";
    echo var_dump($x || $y)."<br>";
    echo "x or y is : ";
    echo var_dump($x or $y)."<br>";

    echo "!x is : ";
    echo var_dump(!$x)."<br>";
    echo "not y is : ";
    echo var_dump(!$y)."<br>";

    // Relational Operators
    echo "<br>Relational Operator<br>";
    echo "a < b is : ";
    echo var_dump($a < $b)."<br>";
    echo "a > b is : ";
    echo var_dump($a > $b)."<br>";
    echo "a <= b is : ";
    echo var_dump($a <= $b)."<br>";
    echo "a >= b is : ";
    echo var_dump($a >= $b)."<br>";
    echo "a == b is : ";
    echo var_dump($a == $b)."<br>";
    echo "a != b is : ";
    echo var_dump($a != $b)."<br>";

    // Assignments Operators
    echo "<br>Assignment Operator<br>";
    $a+=$b;
    echo "value of a : $a";
    $a-=$b;
    echo "<br>value of a : $a";
    $a*=$b;
    echo "<br>value of a : $a";
    $a/=$b;
    echo "<br>value of a : $a";
    $a%=$b;
    echo "<br>value of a : $a";
    $a**=$b;
    echo "<br>value of a : $a";
?>