<?php
    $fptr=fopen('use_in_p29.txt',"r");
    // echo fgets($fptr)."<br>"; // print line 1
    // echo fgets($fptr)."<br>"; // print line 2
    // echo fgets($fptr)."<br>"; // print line 3

    // if you run fgets then your file pointer will be updated and print next time next line
    // echo var_dump(fgets($fptr)); // we need to comment it to run below code because fptr switch to next line

    while ($a=fgets($fptr)) {
        echo $a."<br>";
    }
    echo "End of the file has been reached.";
    fclose($fptr);
?>