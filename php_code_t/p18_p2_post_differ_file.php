<?php
    // in post method operation work inside(in background and can't show values in url )
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=$_POST['email'];// identify by name in html
        $password=$_POST['password'];
        echo "<div role='alert'>
        <strong>Success</strong>
        Your email ". $email ." and password ". $password ." has been submitted successfully.
        <button type='button' data-dismiss='alert' aria-label='close'>
        <span aria-hidden='true'><a href='./p18_p1_post_differ_file.php'>Back</a></span>
        </button>
        </div>";
    }
?>