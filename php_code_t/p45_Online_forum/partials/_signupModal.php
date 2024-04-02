<?php
        $blank=false;
        $username_already_exists=false;
        $create_success=false;
        $passwordMatchSignup=false;
        if(isset($_GET['blankErrorSignup']) && $_GET['blankErrorSignup']=="true"){
            $blank=true;
        }
        elseif(isset($_GET['userExists']) && $_GET['userExists']=="true"){
            $username_already_exists=true;
        }
        elseif(isset($_GET['signupSuccess']) && $_GET['signupSuccess']=="true"){
            $create_success=true;
        }
        elseif(isset($_GET['passwordMatchSignup']) && $_GET['passwordMatchSignup']=="true"){
            $passwordMatchSignup=true;
        }else{
            $blank=false;
            $username_already_exists=false;
            $create_success=false;
            $passwordMatchSignup=false;
        }
        $url_path=parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
        $url_query=parse_url($_SERVER["REQUEST_URI"],PHP_URL_QUERY);
        if($url_query){
            $page=$url_path.'?'.$url_query;
        }else{
            $page=$url_path;
        }
        
        // echo $page;
?>
    

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModal">Signup for an iDiscuss Account</h5>
                <button class="close closeB" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

             <?php
                if($create_success){
                            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success :</strong> Your account created successfully !!!
                                <button type="button closeB" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                }

                if($username_already_exists){
                            echo'<div  class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error :</strong> Email already exists, please try another !!!
                                <button type="button" class="close closeB" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                } 
                if($blank){
                            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error :</strong> Please fill all fields !!!
                                <button type="button" class="close closeB" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                }
                if($passwordMatchSignup){
                    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error :</strong> Password not match !!!
                        <button type="button" class="close closeB" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
            ?> 
            <?php echo '
            <form action="./partials/_handler_signup.php?current_page='.$page.'" method="post">
                <div class="modal-body">

                    <div class="form-group">
                    <input type="hidden" name="vpath" value="'.$login_page.'">
                        <label for="emailSignUp">Email</label>
                        <input type="email" class="form-control" id="emailSignUp" name="emailSignUp" maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="passwordSignUp">Password</label>
                        <input type="password" class="form-control" id="passwordSignUp" name="passwordSignUp" maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="confirm_passwordSignUp">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_passwordSignUp" name="confirm_passwordSignUp" maxlength="10">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary closeB" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-outline-primary" type="submit">Signup</button>
                    <!-- always insure submit button type always submit another wise form cant take any action -->
                </div>
            </form>'; ?>
        </div>
    </div>
</div>


<?php
        if((isset($_GET['blankErrorSignup']) && $_GET['blankErrorSignup']=="true") || (isset($_GET['userExists']) && $_GET['userExists']=="true") || (isset($_GET['signupSuccess']) && $_GET['signupSuccess']=="true") || (isset($_GET['passwordMatchSignup']) && $_GET['passwordMatchSignup']=="true")){
            echo "<script>
            $('#signupModal').modal('show');   
            </script>";
        }
?>

<script>
    close=document.getElementsByClassName('closeB');
    Array.from(close).forEach((element)=>{
        element.addEventListener('click',(e)=>{
            <?php
                $fac_url1S=parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
                $fac_url2S=parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
                if($fac_url2S){
                    // $fac_url3S=$fac_url1S.'?'.$fac_url2S;
                    if (str_contains($fac_url2S,"blankErrorSignup=true")){
                        $fac_url2S=str_replace("blankErrorSignup=true",'',$fac_url2S);
                    }elseif(str_contains($fac_url2S,"userExists=true")){
                        $fac_url2S=str_replace("userExists=true","",$fac_url2S);
                    }elseif(str_contains($fac_url2S,"signupSuccess=true")) {
                        $fac_url2S=str_replace("signupSuccess=true","",$fac_url2S);
                    }elseif(str_contains($fac_url2S,"passwordMatchSignup=true")) {
                        $fac_url2S=str_replace("passwordMatchSignup=true","",$fac_url2S);
                    }

                    if(strlen($fac_url2S)>2){
                        $fac_url3S=$fac_url1S.'?'.$fac_url2S;
                    }else{
                        $fac_url3S=$fac_url1S;                       
                    }
                }else{
                    $fac_url3S=$fac_url1S;
                }
                
                
            ?>

            $('#signupModal').modal('hide');
            window.location='<?php echo $fac_url3S; ?>';



            // $('#signupModal').modal('hide');
            // window.location='<?php echo parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH); ?>';
            // window.location='../p45_Online_forum/index.php';
            // console.log("hello");
            // window.location='../php_code_t/p27_iNote_project.php?delete='+sno;
        })
    });
</script>
    