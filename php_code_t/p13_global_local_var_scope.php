<?php
    // local variable
    $a=10;
    $b=20;
    $c=30;
    function print_v(){
        echo "<strong style='font-size:18pt;'>Print global variable inside function</strong><br>";
        global $a;
        $a=70;
        echo "access global  a : $a<br>";
        $b=60;
        echo "access local b : $b<br>";
        echo "access global b : ".$GLOBALS["b"] ."<br>";
        echo "access global c : $c<br>";
    }

    echo "<strong style='font-size:18pt;'>Print global variable outside function</strong><br>";
    echo "a : $a<br>";
    echo "b : $b<br>";
    echo "c : $c<br>";
    echo "<hr>";

    print_v();
    
    echo "<hr>";
    echo "<strong style='font-size:18pt;'>Print global variable outside function</strong><br>";
    echo "a : $a<br>";
    echo "b : $b<br>";
    echo "c : $c<br>";
    echo "<hr>";

    echo "<strong style='font-size:18pt;'>Print global variable outside function</strong><br>";
    echo var_dump($GLOBALS["a"]);
    echo "<hr>";

    echo "<strong style='font-size:18pt;'>Print super global variable</strong><br>";
    echo var_dump($GLOBALS);
    echo "<hr>";
    
?>