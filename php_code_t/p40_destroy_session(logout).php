<?php
    session_start();
    session_unset();// unset global variable session store id & password
    session_destroy();// destroy current session
    echo "You are logout";
    // after this execution see p39 file you look a warning because session will be destroy
?>