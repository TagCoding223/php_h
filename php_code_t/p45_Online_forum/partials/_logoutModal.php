<?php
// $logout_page=parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
$url_path=parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
$url_query=parse_url($_SERVER["REQUEST_URI"],PHP_URL_QUERY);
// echo '<br>'.$url_query.'<br>.';
// if(parse_url($l_page,PHP_URL_QUERY)){
//     $logout_page=$url_path.'?'.$url_query;
// }else{
//     $logout_page=$url_path;
// }
if ($url_query) {
    $logout_page=$url_path.'?'.$url_query;
} else {
    $logout_page=$url_path;
}

if(isset($_SESSION['loggedin'])){
    $show_email=$_SESSION['email'];
    echo '
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModal">Logout</h5>
                   
                    <button class="close closeB" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="./partials/_handler_logout.php?logout_current_page='.$logout_page.'" method="post">
                    <div class="modal-body"> 
                    <input type="hidden" name="vpath" value="'.$login_page.'">
                        <p class="text-center"><b>'.$show_email.'</b><br>Are Your Sure ?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary closeB" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-outline-success" type="submit">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    ';    
}


?>