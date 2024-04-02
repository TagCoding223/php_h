<?php
    $day=date("l");
    echo "Today is : $day";

    
    $d_str="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUIWXYZ";
    echo "<br><br><strong style='font-size:20pt;'>each character in date function denote that,</strong><br><hr><br>";
    for($i=0;$i<strlen($d_str);$i++){
        $d=date($d_str[$i]);
        echo "$d_str[$i] : $d <br>";
    }

    
    $c_date_time=date("D, dS M x W:i:s a");
    echo "<br><br>Current date & time : $c_date_time";

    $c_date1=date("dS F Y");
    echo "<br><br>Current date & time : $c_date1";
    
    $c_date2=date("dS FY, g:i A");
    echo "<br><br>Current date & time : $c_date2";
    
    $c_date3=date("l jS \of F Y h:i:s A");
    echo "<br><br>Current date & time : $c_date3 <br>";
    
    // create a custom date & time and display it.
    echo "Which day on my custom created date : ".date("l",mktime(1,0,0,7,2,2000));//hour minute second month day year
?>