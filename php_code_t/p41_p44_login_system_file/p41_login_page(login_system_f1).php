<!--  index(LOGIN) file of login system -->
<!-- use 7 layer encrypted algo before read and write data in database (if database data will be hacked then hacker never use it without decrytred algo ) -->
<?php
    $wrongPasswordAlert=false;
    $blanckError=false;
    $loginAlert=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        require './partials/_dbconnect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        // check simple plain text password
        // $sql="SELECT * FROM `user_info` WHERE `username`='$username' AND `password`='$password'";
        // $result=mysqli_query($con,$sql);
        // $num=mysqli_num_rows($result);

        // check hash password
        $sql="SELECT * FROM `user_info` WHERE `username`='$username'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        
        if($username=="" || $password==""){
            $blanckError=true;
        }else{
            if ($num>0) {
                $row=mysqli_fetch_assoc($result);
                if(password_verify($password,$row['password'])){
                    $loginAlert=true;
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$username; // never save password and password never store in plain text
                    header("location: p43_welcome_page(login_system_f3).php"); // in this url does not need ./
                }else {
                    $wrongPasswordAlert=true;
                }
            } else {
                $wrongPasswordAlert=true;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLog - login page</title>
    <?php
        require './partials/_offline_bootstrap.php';
    ?>
</head>

<body>
    <?php 
        require './partials/_nav.php';
        
        if($wrongPasswordAlert){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error :</strong> Your username and password is wrong , please enter vaild username and password  !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        if($loginAlert){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Success :</strong> You are logged in !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        if($blanckError){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error : </strong> please fill all feilds!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $blanckError=false;
        }
    ?>
    <div class="container my-4">
        <!-- G:\xampp\htdocs\User_WebProject\php_code_t\p41_p44_login_system_file\p42_signup_page(login_system_f2).php -->
        <h1 class="text-center">Login to our website!</h1>
        <form action="./p41_login_page(login_system_f1).php" method="POST" class="mr-5 ml-5 my-4"
            style="display:flex; flex-direction:column; align-items:center;">
            <div class="form-group col-md-7">
                <label for="username">Username</label>
                <!--- style="display: block; text-align: center;" center the label --->
                <input type="text" class="form-control" aria-describedy="emailHelp" name="username" id="username" maxlength="10">
            </div>

            <div class="form-group col-md-7">
                <label for="password">Passsword</label>
                <input type="password" name="password" id="password" class="form-control" maxlength="20">
            </div>

            <!-- <div class="form-group form-check">
                <input type="checkbox" name="" id="exampleCheck1" class="form-check-input">
                <label for="exampleCheck1" class="form-check-label">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary col-md-7 my-3">Login</button>
        </form>
    </div>
</body>

</html>