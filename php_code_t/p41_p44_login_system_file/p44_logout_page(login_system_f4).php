<!-- LOGOUT file of login system -->
<?php
    session_start();
    if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin']!=true) {
        header("location: ./p41_login_page(login_system_f1).php");
        exit;
    }else {
        session_unset();//return boolean
        session_destroy();
        header("location: ./p41_login_page(login_system_f1).php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLog - logout page</title>
    <?php
        require './partials/_offline_bootstrap.php';
    ?>
</head>
<body>
    <?php 
        require './partials/_nav.php';
    ?>
</body>
</html>