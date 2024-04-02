<?php
    $fptr=fopen('use_in_p29.txt',"r"); // r -> denote to read mode
    // $fptr=fopen('use1_in_p29.txt',"r");
    echo $fptr."<br>";
    if(!$fptr){
        echo var_dump($fptr);// if file name wrong then false otherwise pass the file content 
        die("Unable to open this file , please enter a vaild name of file.");
    }

    $content=fread($fptr,filesize('use_in_p29.txt'));
    echo $content;
    fclose($fptr);
?>