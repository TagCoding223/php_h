<?php
    // 2d array
    $arr2D=array(array(1,2,3),array(4,5,6),array(7,8,9));

    // $j=2;
    // $p=2;
    // echo $arr2D[1,2];//error not allow
    echo "<strong style='font-size:18pt;'>2d Array</strong><br>";
    echo "<hr>";

    echo "dipaly complete array<br>";
    echo var_dump($arr2D);
    echo "<hr>";
    
    echo "display data in form of rows<br>";
    for($i=0;$i<count($arr2D);$i++){
        echo var_dump($arr2D[$i]);
        echo " $i ";
        echo "<br>";
    }
    echo "<hr>";

    echo "display data in form of elements<br>";
    for($i=0;$i<count($arr2D);$i++){
        for ($j=0; $j < count($arr2D[$i]); $j++) { 
            echo $arr2D[$i][$j]."  ";    
        }
        //echo " $i ";
        echo "<br>";
    }


    // 3d array
    $arr3D=array(array(array(1,2,3),array(4,5,6),array(7,8,9)),
        array(array(11,12,13),array(14,15,16),array(17,18,19))
    );
    echo "<hr><strong style='font-size:18pt;'>3d Array</strong><br>";
    echo "dipaly complete array<br>";
    echo var_dump($arr3D);
    echo "<hr>";

    echo "display data in form of outer rows<br>";
    for ($i=0; $i < count($arr3D); $i++) { 
            echo var_dump($arr3D[$i]);
            echo " $i ";
            echo "<br>";
    }
    echo "<hr>";

    echo "display data in form of inner rows<br>";
    for ($i=0; $i < count($arr3D); $i++) { 
        for($j=0;$j<count($arr3D[$i]);$j++){
            echo var_dump($arr3D[$i][$j]);
            echo " $i ";
            echo "<br>";
        }
        echo "<br>";
    }
    echo "<hr>";

    echo "display data in form of elements<br>";
    for ($i=0; $i < count($arr3D); $i++) { 
        for ($j=0; $j < count($arr3D[$i]); $j++) { 
            for ($k=0; $k < count($arr3D[$i][$j]); $k++) { 
                echo $arr3D[$i][$j][$k]."  ";
            }
            echo "<br>";
        }
        echo "<br><br>";
    }
    
    echo "<hr>";
?>