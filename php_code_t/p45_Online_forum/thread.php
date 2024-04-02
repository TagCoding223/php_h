<?php
    require './partials/_dbconnect.php';
    require './partials/_symbol_sanitization.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDiscuss - Thread List</title>
    <link rel="stylesheet" href="./css/_footer.css">
    <?php 
        require "./partials/_offline_bootstrap.php";
        require "./partials/_icon.php";
    ?>
</head>

<body>
    <?php 
        require "./partials/_header.php";

        // if ($_SERVER['REQUEST_METHOD']=='GET') {
            $id=$_GET['thread_id'];
            $sql="SELECT * FROM `threads` WHERE `thread_id`='$id'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
        // }
         
    ?>

<?php
        $showAlert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']==true)){
            $enter_thread_email=$_SESSION['email'];
            $enter_thread_email=str_replace("@gmail.com","",$enter_thread_email);
            if($method == 'POST'){
                $comment_content=$_POST['comment_content'];
                $comment_content=replaceString($comment_content);
                $sql="SELECT * FROM `comments` WHERE `comment_content`='$comment_content'";
                $result=mysqli_query($con,$sql);
                $g_num=mysqli_num_rows($result);
                if(!($g_num>0)){
                    $sql="INSERT INTO `comments`(`comment_content`,`thread_id`,`comment_by_email`) VALUES('$comment_content','$id','$enter_thread_email')";
                    $result=mysqli_query($con,$sql);
                    $showAlert=true;
                    if ($showAlert){
                        
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success !!!</strong> Your Comment has been added!
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        ';
                
                    }else{
                        $showAlert=false;
                    }
                }else{
                    echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error : </strong>Same comment already exists .
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        ';
                }
            }
        }else{
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error : </strong>Please login first to post a comment.
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ';
        }
    ?>

    <div class="container my-4" >
        <div class="jumbotron pl-5 pr-5 mr-3 ml-3" style="padding-bottom: 40px;">
            <h1 class="display-4"><?php echo str_desalinization($row['thread_title']); ?></h1>
            <p class="lead"><?php echo str_desalinization($row['thread_desc']); ?></p>
            <?php
                $post_name=$row['thread_user_email'];
                $post_name=str_replace("@gmail.com","",$post_name);
            ?>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.
            <h6>Please do not;</h6>
            <ol>
                <li>No Spam / Advertising / Self-promote in the forums.</li>
                <li>Do not post copyright-infringing material.</li>
                <li>Do not post “offensive” posts, links or images.</li>
                <li>Do not cross post questions.</li>
                <li>Do not PM users asking for help.</li>
                <li>Remain respectful of other members at all times.</li>
            </ol>
            </p>
            <p class="text-right">Posted By : <b><?php echo $post_name; ?></b></p>
        </div>
    </div>
    

    <div class="container">
        <h2 class="py-3">Post a Comment!</h2>
        <!-- $_SERVER['PHP_SELF'] -> can't pass attributes after ? symbol -->
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <div class="form-group">
                <label for="comment_content">Type your Comment</label>
                <textarea name="comment_content" id="comment_content" rows="3" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>
<!-- try to show comments in descending order last posted comment show first (LIFO) order-->
    <div class="container my-4 pt-4">
        <h2>Discussion</h2>
        <div id="comments_data">
        <!-- comments -->
        </div>
    </div>

    <div class="d-flex justify-content-center m-3">
        <div class="spinner-border" id="loading" role="status" style="border:none;">
            <span class="fa fa-2x fa-refresh"></span>
        </div>
    </div>

    <?php 
        require "./partials/_footer.php";
    ?>

    <script>
        var page_no=1;
        var isrunning=false;
        var visi=false;
        showData();

        // console.log(($("#jumbotron").is(":visible")));
        if ((!($("#jumbotron").is(":visible"))) || (!($("#nomore").is(":visible")))) {
            visi=true;
        }

        $(window).scroll(function() {
           if($(window).scrollTop()+$(window).height() > $(document).height()-20){
            // alert("bottom");
            if (!isrunning && visi) {
                showData();
            }
           } 
        });
    
        

        // add data on div
        function showData(){
            isrunning=true;
            if(page_no!=1){
            $("#loading").show();
            }
            $.post("./partials/_thread_operation.php",{page:page_no,thread_id:<?php echo $_GET['thread_id']; ?>},(Response)=>{
                $("#comments_data").append(Response);
                $("#loading").hide();
                isrunning=false;
                if(($("#jumbotron").is(":visible")) || ($("#nomore").is(":visible"))){
                    visi=false;
                }
                page_no++;
            });
            
        }
    
    </script>
</body>

</html>