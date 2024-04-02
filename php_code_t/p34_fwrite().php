<?php
    $fptr=fopen('use_in_p34.txt','w');//this line write mode create a file if file not exist otherwise it override file content and you lose complete data after this line you add many line in file using fwrite()

    fwrite($fptr,"This is first line");
    fwrite($fptr,"\nThis is second line");
    fwrite($fptr,"\nThis is third line");
    echo "file write done";
    fclose($fptr);

?>