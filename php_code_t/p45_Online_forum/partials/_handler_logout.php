<?php
    session_start();
    // $Logout_jump_page=$_GET['logout_current_page'];
    $Logout_jump_page=$_POST['vpath'];
    if((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']==true)){ // this is best way to check a session as camper to PHP_SESSION_ACTIVE
        session_unset();
        session_destroy();
        // echo 'if';
        header("Location: $Logout_jump_page");
    }else{
        header("Location: $Logout_jump_page");
        // echo 'else';
    }
?>