<?php
    // cookie is a tag that helps to identify a user and its choise
    // cookies avaliable for all sites and store on user local system browser
    // cookie -> normal data , like - category (likes/dislikes)
    // session -> security needed data , like - userid / email / password 
    // cookies set to identify a  user choice when next time its come

    // syntax to set a cookie
    setcookie("Category","Books",time()+86400,"/");
    echo "your cookies is set";
    // name - Category
    // value - Books
    // expire - time() give current time in seconds from 1 jan 1970 + 86400 - seconds on a day
    // / - set cookie for all site

    // check cookie set or not -> browser -> inspect -> network -> select all -> favicon.ico -> Responce header (if you want to see cookies than start session)
?>