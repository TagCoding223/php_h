<?php
    // what is a session ?
    // used to manage user information in different pages but same domain .
    // if you login in facebook then it start a session and never ask for login again in different facebook webpage if seesion never destroy(user logout)
    
    // verify the user by check detials avaliable in db then after we start a session

    session_start();
    $_SESSION['username']="vishal";
    $_SESSION['password']="Books";
    echo "we have saved your session .<br>";
    echo "user id & password is right , now you are login your profile.<br>";
?>