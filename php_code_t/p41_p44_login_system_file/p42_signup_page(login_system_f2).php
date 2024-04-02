<!-- SINGUP file of login system -->
<?php
    $showAlert=false;
    $showPasswordAlert=false;
    $user_exists=false;
    $blanckError=false;
    $userCreationError=false;
    $num=0;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        require './partials/_dbconnect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $sql="SELECT * FROM `user_info` WHERE `username`='$username'";
            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);
            // if user typed username length is high as compare to db username length then this sql query fail to search same username in db ( solution 1 -> increase size in db 2 -> resize user typed username before executing query. 3 -> use maxlength attribute )

        if(($username=="") || ($password=="") || ($cpassword=="")){
            $blanckError=true;
        }else{
            if($num>0){
                $user_exists=true; 
                // you also do this work with help of db to set username as a unique in db ( db -> table -> structre -> more action on username -> unique) // that step stop to create same username  , but we need sql query to check username exists or not -> that call duoble layer security becasue db never create same username and query also check same username
            }else{
                $user_exists=false;
            }
        }
        
        if (($password==$cpassword) && $user_exists==false && $blanckError==false) {
            // direct save data in db 
            // $sql="INSERT INTO `user_info` (`username`,`password`) VALUES('$username','$password')";
            // $result=mysqli_query($con,$sql);

            // save password in hash form for security ( insure password length much be 255 )
            $hashPassword=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO `user_info` (`username`,`password`) VALUES('$username','$hashPassword')";
            $result=mysqli_query($con,$sql);
            if($result){
                $showAlert=true;
                header("location: ./p41_login_page(login_system_f1).php"); // make a popup before redirect
            }else{
                $userCreationError=true;
            }
        }elseif ($password!=$cpassword) {
            $showPasswordAlert=true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLog - signup page</title>
    <meta http-equiv="refresh" href="./p42_signup_page(login_system_f2).php">
    <?php
        require './partials/_offline_bootstrap.php';
    ?>
</head>

<body>
    <?php 
        require './partials/_nav.php';
        if($showAlert){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $showAlert=false;
        }
        if($showPasswordAlert){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error : </strong> Password do not match!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $showPasswordAlert=false;
        }
        if($user_exists){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error : </strong> same username already exists , please use another username !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $user_exists=false;
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
        if($userCreationError){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error : </strong> oops somthing is wrong!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $blanckError=false;
        }
    ?>



    <div class="container my-4">
        <!-- G:\xampp\htdocs\User_WebProject\php_code_t\p41_p44_login_system_file\p42_signup_page(login_system_f2).php -->
        <h1 class="text-center">Signup to our website!</h1>
        <form action="./p42_signup_page(login_system_f2).php" method="POST" class="mr-5 ml-5 my-4"
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

            <div class="form-group col-md-7">
                <label for="cpassword">Confirm Passsword</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" maxlength="20">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>
            <!-- <div class="form-group form-check">
                <input type="checkbox" name="" id="exampleCheck1" class="form-check-input">
                <label for="exampleCheck1" class="form-check-label">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary col-md-7 my-3">Sign up</button>
        </form>
    </div>

    <script>
        closeAlert = document.getElementsByClassName('close');
        Array.from(closeAlert).forEach(element => {
            element.addEventListener('click', (e) => {
                window.location = './p42_signup_page(login_system_f2).php';
                <?php
                $showAlert = false;
                $showPasswordAlert = false;
                $user_exists = false;
                $blanckError = false;
                ?>
            })
        });
    </script>
</body>

</html>