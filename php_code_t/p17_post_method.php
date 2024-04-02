<?php
    // in post method operation work inside(in background and can't show values in url )
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=$_POST['email'];// identify by name in html
        $password=$_POST['password'];
        echo "<div role='alert'>
        <strong>Success</strong>
        Your email ". $email ." and password ". $password ." has been submitted successfully.
        <button type='button' data-dismiss='alert' aria-label='close'>
        <span aria-hidden='true'><a href='./p17_post_method.php'>close</a></span>
        </button>
        </div>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Method</title>
</head>
<body>
    <div class="container">
        <h1>Please enter your email and password !</h1>
        <form action="../php_code_t/p17_post_method.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="password">Password</label>
            <input type="text" name="password" id="password">
            <button type="Submit">Submit</button>
        </form>
    </div>
</body>
</html>