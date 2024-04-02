<?php
    require '_dbconnect.php';
    $blankErrorLogin=false;
    $userNotFound=false;
    $wrongPassword=false;
    $login=false;
    if(isset($_GET['blankErrorLogin']) && $_GET['blankErrorLogin']=="true"){
        $blankErrorLogin=true;
    }
    elseif(isset($_GET['userNotFound']) && $_GET['userNotFound']=="true"){
        $userNotFound=true;
    }
    elseif(isset($_GET['wrongPassword']) && $_GET['wrongPassword']=="true"){
        $wrongPassword=true;
    }
    elseif(isset($_GET['login']) && $_GET['login']=="true"){
        // $login=true;
    }else{
        $blankErrorLogin=false;
        $userNotFound=false;
        $wrongPassword=false;
        $login=false;
    }
    $url_path=parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
    $url_query=parse_url($_SERVER["REQUEST_URI"],PHP_URL_QUERY);
    if ($url_query) {
        $login_page=$url_path.'?'.$url_query;
    } else {
        $login_page=$url_path;
    }
    
//    echo $login_page;

echo '
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exmpleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModal">Login</h5>
                <button class="close closeBL" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';

            if($userNotFound){
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error :</strong> You have no account !!!
                    <button type="button" class="close closeBL" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            if($blankErrorLogin){
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error :</strong> Please fill all fields !!!
                    <button type="button" class="close closeBL" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            if($wrongPassword){
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error :</strong> Given password is wrong , please enter right password !!!
                    <button type="button" class="close closeBL" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            if($login){
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success :</strong> You are logged in !!!
                    <button type="button" class="close closeBL" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }

            echo '
            <form action="./partials/_handler_login.php?login_current_page='.$login_page.'" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" name="vpath" value="'.$login_page.'">
                        <label for="l_email">Email</label>
                        <input type="email" class="form-control" id="l_email" name="l_email" maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="l_password">Password</label>
                        <input type="password" class="form-control" id="l_password" name="l_password" maxlength="10">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary closeBL" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-outline-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
';


if((isset($_GET['blankErrorLogin']) && $_GET['blankErrorLogin']=="true") || (isset($_GET['userNotFound']) && $_GET['userNotFound']=="true") || (isset($_GET['wrongPassword']) && $_GET['wrongPassword']=="true") ){// ||(isset($_GET['login']) && $_GET['login']=="true")
    echo "<script>
    $('#loginModal').modal('show');   
    </script>";
}
?>

<script>
    close=document.getElementsByClassName('closeBL');
    Array.from(close).forEach((element)=>{
        element.addEventListener('click',(e)=>{
            

            <?php
                $fac_url1=parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
                $fac_url2=parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
                if($fac_url2){
                    // $fac_url3=$fac_url1.'?'.$fac_url2;
                    if (str_contains($fac_url2,"blankErrorLogin=true")){
                        $fac_url2=str_replace("blankErrorLogin=true",'',$fac_url2);
                    }elseif(str_contains($fac_url2,"userNotFound=true")){
                        $fac_url2=str_replace("userNotFound=true","",$fac_url2);
                    }elseif(str_contains($fac_url2,"wrongPassword=true")) {
                        $fac_url2=str_replace("wrongPassword=true","",$fac_url2);
                    }

                    if(strlen($fac_url2)>2){
                        $fac_url3=$fac_url1.'?'.$fac_url2;
                    }else{
                        $fac_url3=$fac_url1;                       
                    }
                }else{
                    $fac_url3=$fac_url1;
                }
                
                
            ?>

            $('#loginModal').modal('hide');
            window.location='<?php echo $fac_url3; ?>';
            // window.location='../p45_Online_forum/index.php';
            // console.log("hello");
            // window.location='../php_code_t/p27_iNote_project.php?delete='+sno;
            
        })
    });
</script>
    