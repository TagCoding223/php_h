<?php
    $fptr=fopen('use_in_p29.txt',"r");
    echo fgetc($fptr); // print singal character

    while ($a=fgetc($fptr)) {  
        echo $a;
        // break;
    }
    fclose($fptr);
    // file pointer each time update when we use it.
?>