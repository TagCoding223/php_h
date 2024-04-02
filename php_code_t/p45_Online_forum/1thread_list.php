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
    ?>

    <?php
        // if ($_SERVER['REQUEST_METHOD']=='GET') {
            $id=$_GET['catid'];
            $sql="SELECT * FROM `categories` WHERE `category_id`='$id'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $category_name=$row['category_name'];
            $category_description=$row['category_description'];
            $rating=$row['r_rating'];
            $rating=$rating+1;
            $sql_popular="UPDATE `categories` SET `r_rating`='$rating' WHERE `category_id`='$id'";
            mysqli_query($con,$sql_popular);
        // }
         
    ?>

    <?php
        $showAlert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if ((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']==true)) {
            if($method == 'POST'){
                $enter_email=$_SESSION['email'];
                $enter_email=str_replace("@gmail.com","",$enter_email);
                $user_title=$_POST['question_title'];
                $user_title=replaceString($user_title);
                $user_problem=$_POST['question_desc'];
                $user_problem=replaceString($user_problem);
                $sql="SELECT * FROM `threads` WHERE `thread_title`='$user_title'";
                $result=mysqli_query($con,$sql);
                $num=mysqli_num_rows($result);
                if(!($num>0)){
                    $sql="INSERT INTO `threads`(`thread_title`,`thread_desc`,`thread_cat_id`,`thread_user_email`) VALUES('$user_title','$user_problem','$id','$enter_email')";
                    $result=mysqli_query($con,$sql);
                    $showAlert=true;
                    if ($showAlert){
                        
                        echo '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success !!!</strong> Your thread has been added! , Please wait for community to respond 
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
                            <strong>Error : </strong>Same Title already exists .
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
            <strong>Error : </strong>Please login first to start a discussion.
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ';
        }
    ?>
        

    

    <div class="container my-4">
        <div class="jumbotron pl-5 pr-5 mr-3 ml-3" style="padding-bottom: 40px;">
            <h1 class="display-4">Welcome to <?php echo str_desalinization($category_name); ?> forums</h1>
            <p class="lead"><?php echo str_desalinization($category_description); ?></p>
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
            <a href="#" class="btn btn-success btn-lg mt-3 my-2" role="button">Learn More</a>
        </div>
    </div>



<?php    

echo '
    <div class="container">
        <h2 class="py-3">Start a Discussion!</h2>
        <form action="'.$_SERVER['REQUEST_URI'] .'" method="post">
            <div class="form-group">
                <label for="question_title">Problem Title</label>
                <input type="text" class="form-control" id="question_title" name="question_title" aria-describedby="emailHelp" maxlength="100">
                <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                    possible(max-100).</small>
            </div>
            <div class="form-group">
                <label for="question_desc">Elaborate Your Problem</label>
                <textarea name="question_desc" id="question_desc" rows="3" class="form-control"  maxlength="255"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
?>

    <div class="container my-4">
        <h2>Browse Questions</h2>

        <?php
                $id=$_GET['catid'];
                $q_sql="SELECT * FROM `threads` WHERE `thread_cat_id`='$id'";
                $q_result=mysqli_query($con,$q_sql);
                while($row=mysqli_fetch_assoc($q_result)){
                        echo '<div class="media" style="margin-left: 70px;margin-right: 70px;margin-top: 20px;">
                        <img src="./src/user_icon.png" width="50px" alt="" class="mr-3">
                        <div class="media-body">
                
                        <h5 class="mt-2"><a href="./thread.php?thread_id='.str_desalinization($row['thread_id']).'">'.str_desalinization($row['thread_title']).'</a></h5>
                        '.substr((str_desalinization($row['thread_desc'])),0,120).'...</div></div><hr>';
                }
                $num=mysqli_num_rows($q_result);
                if($num==0){
                    echo '<div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <p class="display-4">No Threads Found!!!</p>
                                <p class="lead"><b>Be the first person to ask a question!!!</b></p>
                            </div>
                        </div>';
                }
                ?>


    </div>


    <?php 
        require "./partials/_footer.php";
    ?>

</body>

</html>