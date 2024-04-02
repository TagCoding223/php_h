<?php
    $a=readfile('use_in_p29.txt');
    echo $a;// also display number of character
    echo "<br>";

    readfile('use_in_p29.txt');// can't display number of character
    echo "<br>";
    $a=readfile('use_in_p29.txt');

    echo "<br>";
    echo var_dump(readfile('use_in_p29.txt'));

    readfile('p14_offline_bootstrap.html');

    readfile('.\src\pngwing.png'); // display image in from of txt
?>