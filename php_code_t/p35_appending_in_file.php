<?php
    $fptr=fopen('use_in_p34.txt','a');
    fwrite($fptr,"\nIn append mode fwrite write in end of file.");
    fclose($fptr);
    echo "appending done";
    // in append mode override never happpen that why when we refrash page then each time line add in a file
?>