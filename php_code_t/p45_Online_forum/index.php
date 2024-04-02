<?php
    require './partials/_dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDiscuss - Coding Forums</title>
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

    
    <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./src/b6.jpeg" height="415px" alt="" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./src/b2.jpeg" alt="" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./src/b3.jpeg" alt="" class="d-block w-100">
            </div>
        </div>
        <a href="#carouselExampleIndicators" role="button" data-slide="prev" class="carousel-control-prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a href="#carouselExampleIndicators" role="button" data-slide="next" class="carousel-control-next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container mb-5 my-5" id="foot">
        <h2 class="text-center my-4">Welcome to iDiscuss - Coding Forums</h2>
        <h4 class="text-center my-4">Categories</h4>
        <div class="row">
            <?php
            $img=array("n1.jpeg","n2.jpeg","n3.jpeg","n4.jpeg","n5.jpeg","n6.jpeg");
            $num=0;
            $sql="SELECT * FROM `categories`";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                // src="https://source.unsplash.com/500x400/?coding,code,computer,programming,programmer,'.$row['category_name'].'
                // <img src="./src/'.$img[$num].'" alt="" class="card-img-top">
                
                if($num==(count($img))){
                    $num=0;
                }
                $start_page=0;
                echo '
                <div class="colmd-3 my-3 ml-5 mr-3 p-2" >
                    <div class="card" style="width: 18rem;">
                        <img src="./src/'.$img[$num].'" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><a href="./thread_list.php?catid='.$row['category_id'].'&start_page='.$start_page.'">'.$row['category_name'].'</a></h5>
                            <p class="card-text"><em>'.substr($row['category_description'],0,80).'...</em></p>
                            <a href="./thread_list.php?catid='.$row['category_id'].'&start_page='.$start_page.'" class="btn btn-primary">View Threads</a>
                        </div>
                    </div>
                </div>
                ';
                $num=$num+1;
            }
        ?>

        </div>
    </div>

    <?php
        if(isset($_SESSION['loggedin'])){
            $show_email=$_SESSION['email'];
            // echo $show_email;
            // echo 'LOGIN';
            // header("Location: $Logout_jump_page");
        }else{
            // header("Location: $Logout_jump_page");
            // echo 'LOGOUT';
        }

    ?>
    <?php 
        require "./partials/_footer.php";
?>


</body>

</html>