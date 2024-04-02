<?php
    function sumMarks($marks){
        $sum=0;
        foreach($marks as $value){
            $sum+=$value;
        }
        return $sum;
    }

    function marksAvg($marks){
        $sum=sumMarks($marks);
        return $sum/count($marks);
    }

    $arrMarks=[90,95,95,90,90,93];
    echo "Sum of marks : ".sumMarks($arrMarks);
    echo "<br>Average of marks : ".marksAvg($arrMarks);
?>