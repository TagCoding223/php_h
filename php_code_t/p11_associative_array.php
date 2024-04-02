<?php
    
    // Associative Array
    $arrAss=["honey"=>"red","Dev"=>"yellow","Pavan"=>"green",5=>"five"];

    // print single element
    echo "<br>". $arrAss['Dev'];
    echo "<br>". $arrAss[5];

    foreach ($arrAss as $key => $value) {
        echo "<br>Favorite color of $key is $value";
    }

    //echo "<br><br>". $arrAss[1];//this line display error -> Undefined array key 1 , because keys replace index
    // for ($i=0; $i < count($arrAss); $i++) { 
    //     echo $arrAss[$i];
    //     echo "<br>";
    // } can't work show error

    
?>