<?php
    $rating=9;
    switch ($rating) {
        case 1:
            echo "very bad";
            break;
        case 2:
            echo "bad";
            break;
        case 3:
            echo "good";
            break;
        case 4:
            echo "very good";
            break;
        case 5:
            echo "awesome";
            break;
        default:
            echo "your rating not understand";
            break;
    }
?>