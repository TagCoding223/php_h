<?php
    //while loop
    echo "<br><b>While loop result</b><br>";
    $i=1;
    while($i<6){
        echo "$i <br>";
        $i++;
    }

    //do-while loop
    echo "<br><b>do-while loop result</b><br>";
    $i=6;
    do{
        echo "$i <br>";
        $i--;
        // $i++; // only 6 print 
    }while($i<6 && $i>0); //case 1 i<6=false 

    //for loop
    echo "<br><b>for loop result</b><br>";
    for ($j=1; $j < 6; $j++) { 
        echo $j."<br>";
    }

    //foreach loop
    echo "<br><b>foreach loop result</b><br>";
    $name=["my","name","is","vishal"];
    foreach($name as $value){
        echo $value." ";
    }

    echo "<br>";
    echo "<br>";
    // array print using for loop
    $ph_number=[76,97,62,56,02];
    for($o=0;$o<count($ph_number);$o++){
        echo $ph_number[$o];
    }

    // echo "<br>";
    // //infinate for loop
    // for ($k=0; $k < 8; ) { 
    //     echo "#";
    // }
?>