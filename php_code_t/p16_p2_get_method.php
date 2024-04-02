<?php
    // in get method operation work inside(in background and show values in url )

    if($_SERVER['REQUEST_METHOD']=='GET'){
        $email=$_GET['email'];// identify by name in html
        $password=$_GET['password'];
        echo "<div role='alert'>
        <strong>Success</strong>
        Your email ". $email ." and password ". $password ." has been submitted successfully.
        <button type='button' data-dismiss='alert' aria-label='close'>
        <span aria-hidden='true'><a href='./p16_p1_get_method.html'>Back</a></span>
        </button>
        </div>";
    }
?>