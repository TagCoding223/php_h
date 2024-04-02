<!-- WELCOME file of login system -->
<?php
    session_start();
    if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin']!=true) {
        header("location: ./p41_login_page(login_system_f1).php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLog - welcome <?php echo $_SESSION['username']; ?></title>
    <?php
        require './partials/_offline_bootstrap.php';
    ?>
</head>
<body>
    <?php 
        require './partials/_nav.php';
        // echo $_SESSION['username'];
    ?>

    <div class="container my-5">
        <div class="alert alert-success" role="alert" style="margin-left: 40px; margin-right: 40px;">
            <h4 class="alert-heading">Weclome - <?php echo $_SESSION['username']; ?></h4>
            <p>Hey how are you doing? Welcome to iLog. You are logged in as <?php echo $_SESSION['username']; ?>. Aww yeah , you successfully read this important alert message .</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to logout <a href="./p44_logout_page(login_system_f4).php">using this link.</a></p>
        </div>
    </div>

</body>
</html>