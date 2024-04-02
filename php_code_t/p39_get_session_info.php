<?php
    session_start();// we need to start a session on each file to access user information , another wise we face a warning
    
// isset is use to ignore to display warrning in front of user when session will be destroy
    if (isset($_SESSION['username'])) {
        echo "Welcome ". $_SESSION['username'];
        echo "<br>Your Password is : ". $_SESSION['password'];
    }else{
        echo "Your session is out , please login again !";
    }
    
?>