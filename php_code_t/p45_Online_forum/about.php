<?php
    require './partials/_dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDiscuss - Coding Forums</title>
    <link rel="stylesheet" href="./css/_footer.css">
    <?php 
        require "./partials/_offline_bootstrap.php";
        require "./partials/_icon.php";
    ?>
</head>

<body class="bg-dark text-light">
    <?php 
        require "./partials/_header.php";
?>

    <div class="container my-4 bg-dark" style="min-height: 380px;">
        <!-- <h2 class="text-center text-light">iDiscuss - About</h2> -->
        <main role="main" class="inner cover text-center" style="margin: 170px 70px 70px 50px;">
        <h1 class="cover-heading my-5">iDiscuss - About</h1>
        <p class="lead text-center my-5 pl-5 pr-5 ml-5 mr-5"><em>iDiscuss , always try to provide a better platform for IT developes to share there knowledge to each, We provide a platform where many people ask different IT related questions to find a best solution of there problems.</em></p>
        <p class="lead">
          <a href="index.php" class="btn btn-lg btn-secondary">Check Our Services</a>
        </p>
      </main>
    </div>

    <?php 
        require "./partials/_footer.php";
?>
</body>

</html>