<?php
    $fptr=fopen('use_in_p29.txt','r');
    while ($a=fgetc($fptr)) {
        echo $a;
        if ($a=='.') {
            break;
        }
    }
    fclose($fptr);
?>