<?php
require '_dbconnect.php';
require '_symbol_sanitization.php';
    $blankErrorLogin="false";
    $userNotFound="false";
    $wrongPassword="false";
    $login="false";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $l_email=$_POST['l_email'];
        $l_password=$_POST['l_password'];
        $l_password=replaceString($l_password);
        // $l_page=$_GET['login_current_page'];
        // $l_page_path=parse_url($_GET['login_current_page'],PHP_URL_PATH);
        // $l_page_query=parse_url($_GET['login_current_page'],PHP_URL_QUERY);
        // parse_str($l_page_query,$query_params);
        // print_r($query_params).'<br>';
        // echo $l_page_path.'<br>';

        
        // echo $l_page_query;
        $l_page=$_POST['vpath'];
        echo $l_page;
        if($l_password == "" || $l_email == ""){
            $blankErrorLogin="true";
            if(parse_url($l_page,PHP_URL_QUERY)){
                header("Location: $l_page&blankErrorLogin=$blankErrorLogin");
            }else{
                header("Location: $l_page?blankErrorLogin=$blankErrorLogin");
            }
        }else{
            $sql="SELECT * FROM `user_account` WHERE `email`='$l_email'";
            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);
            $row=mysqli_fetch_assoc($result);
            if($num>0){
                if(password_verify($l_password,$row['password'])){
                    $login="true";
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['email']=$l_email;
                    // echo '<script> console.log("done");</script>';
                    // header("Location: $l_page&login=$login");
                    if(parse_url($l_page,PHP_URL_QUERY)){
                        // echo $l_page;
                        header("Location: $l_page&login=$login");
                    }else{
                        header("Location: $l_page?login=$login");
                    }
                }
                else{
                    $wrongPassword="true";
                    // header("Location: $l_page?wrongPassword=$wrongPassword");
                    if(parse_url($l_page,PHP_URL_QUERY)){
                        header("Location: $l_page&wrongPassword=$wrongPassword");
                    }else{
                        header("Location: $l_page?wrongPassword=$wrongPassword");
                    }
                }
            }else{
                $userNotFound="true";
                // header("Location: $l_page?userNotFound=$userNotFound");
                if(parse_url($l_page,PHP_URL_QUERY)){
                    header("Location: $l_page&userNotFound=$userNotFound");
                }else{
                    header("Location: $l_page?userNotFound=$userNotFound");
                }
            }
        }
    }
?>