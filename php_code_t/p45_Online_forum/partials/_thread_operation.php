<?php
    require '_dbconnect.php';
    require '_symbol_sanitization.php';
    
    $page=$_POST['page']??1; // if value not found by post method then use 1
    if ($page!=1) {
        sleep(2);// we work in local host that's why internet role is null so we create custom delay of 3 second
    }
    $limit=10;
    $row=($page-1)*$limit;
    $id=$_POST['thread_id'];
    $q_sql="SELECT * FROM `comments` WHERE `thread_id`='$id' LIMIT $row,$limit"; // start point(row) , number of items
    $run=mysqli_query($con,$q_sql);
    $data=mysqli_fetch_all(($run),MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($data);

                
                foreach ($data as $key) {
                        echo '<div class="media" style="margin-left: 70px;margin-right: 70px;margin-top: 20px;">
                        <img src="./src/user_icon.png" width="50px" alt="" class="mr-3">
                        <div class="media-body">
                        <p class="font-weight-bold my-0">'.str_desalinization($key['comment_by_email']).'<span style="float: inline-end;">Post on : '.str_desalinization($key['comment_time']).'</span></p>
                        '.str_desalinization($key['comment_content']).'</div></div><hr>';
                }
                
                if(count($data)<=0 && ($page==0||$page==1)){
                    echo '<div class="jumbotron jumbotron-fluid" id="jumbotron">
                            <div class="container">
                                <p class="display-4">No Comments Found!!!</p>
                                <p class="lead"><b>Be the first person to reply!!!</b></p>
                            </div>
                        </div>';
                }
                if (count($data)<=0 && ($page!=0&&$page!=1)) { // also compare with 0
                    echo '
                        <div class="container text-center" id="nomore">
                            <p style="font-size:12pt;"><em>No More Comments Found</em></p>
                        </div>
                    ';
                }
?>