<?php
    $blankErrorSignup="false";
    $username_already_exists="false";
    $create_success="false";
    $passwordMatchSignup="false";
    require './_symbol_sanitization.php';
    require './_dbconnect.php';
    // header("Location: ../index.php"); // don't include any space between Location and :
    // echo "hello";
    if($_SERVER["REQUEST_METHOD"]=='POST') {
        // $page=$_GET['current_page']; //pass current page url from _signupModal.php
        $page=$_POST['vpath'];
        $usernameSignUp=$_POST['emailSignUp'];
        $passwordSignUp=$_POST['passwordSignUp'];
        $passwordSignUp=replaceString($passwordSignUp);
        $cpasswordSignUp=$_POST['confirm_passwordSignUp'];
        $cpasswordSignUp=replaceString($cpasswordSignUp);
        if($usernameSignUp=="" || $passwordSignUp=="" || $cpasswordSignUp==""){
            $blankErrorSignup="true";
            // echo $page;
            // header("Location: ../index.php?blankErrorSignup=$blankErrorSignup");
            // header("Location: $page?blankErrorSignup=$blankErrorSignup");

            if(parse_url($page,PHP_URL_QUERY)){
                header("Location: $page&blankErrorSignup=$blankErrorSignup");
            }else{
                header("Location: $page?blankErrorSignup=$blankErrorSignup");
            }
        }else{
            $blankErrorSignup="false";
            $sql="SELECT * FROM `user_account` WHERE `email`='$usernameSignUp'";
            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);
            if ($num>0) {
                $username_already_exists="true";
                // header("Location: ../index.php?userExists=$username_already_exists");
                // header("Location: $page?userExists=$username_already_exists");
                if(parse_url($page,PHP_URL_QUERY)){
                    header("Location: $page&userExists=$username_already_exists");
                }else{
                    header("Location: $page?userExists=$username_already_exists");
                }
            } else {
                $username_already_exists="false";
                if($passwordSignUp==$cpasswordSignUp){
                    $hash_password=password_hash($passwordSignUp,PASSWORD_DEFAULT);
                    $sql="INSERT INTO `user_account`(`email`,`password`) VALUES ('$usernameSignUp','$hash_password')";
                    $result=mysqli_query($con,$sql);
                    // $num=mysqli_num_rows($result);
                    if($result){
                        $create_success="true";
                        // echo ""true"";
                        // header("Location: ../index.php?signupSuccess=$create_success");
                        // header("Location: $page?signupSuccess=$create_success");
                        if(parse_url($page,PHP_URL_QUERY)){
                            header("Location: $page&signupSuccess=$create_success");
                        }else{
                            header("Location: $page?signupSuccess=$create_success");
                        }
                    }else{
                        $create_success="false";
                    }
                }else{
                    $passwordMatchSignup="true";
                    // header("Location: ../index.php?passwordMatch=$passwordMatch");
                    // header("Location: $page?passwordMatch=$passwordMatch");
                    if(parse_url($page,PHP_URL_QUERY)){
                        header("Location: $page&passwordMatch=$passwordMatchSignup");
                    }else{
                        header("Location: $page?passwordMatch=$passwordMatchSignup");
                    }
                }
            }
            
        }
    }
?>