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
<?php
    $img=array("n1.jpeg","n2.jpeg","n3.jpeg","n4.jpeg","n5.jpeg","n6.jpeg");
    // in below block all variables comes from _header.php
    echo '
    <div class="container mt-3 mb-5 bg-dark text-light" style="border:3px solid #6a6ab7;border-radius:2rem;">
        <h1 class="text-center pb-3 pt-5 pb-3"><em>Top Categories</em></h1>
        <div class="d-flex justify-content-center pb-5 ">
            <div class="colmd-3 my-3 ml-5 mr-3 pt-5" >
                <div class="card" style="width: 18rem;">
                    <img src="./src/'.$img[0].'" alt="" class="card-img-top">
                    <div class="card-body bg-dark">
                        <h5 class="card-title"><a href="./thread_list.php?catid='.$set_category_id[1].'&start_page=0">'.$set_category_name[1].'</a></h5>
                        <p class="card-text"><em>'.substr($set_category_des[1],0,80).'...</em></p>
                    </div>
                </div>
            </div>
            <div class="colmd-3 my-3 ml-5 mr-3 " >
                <div class="card" style="width: 18rem;">
                    <img src="./src/'.$img[1].'" alt="" class="card-img-top">
                    <div class="card-body bg-dark">
                        <h5 class="card-title"><a href="./thread_list.php?catid='.$set_category_id[0].'&start_page=0">'.$set_category_name[0].'</a></h5>
                        <p class="card-text"><em>'.substr($set_category_des[0],0,80).'...</em></p>
                    </div>
                </div>
            </div>
            <div class="colmd-3 my-3 ml-5 mr-3 pt-5" >
                <div class="card" style="width: 18rem;">
                    <img src="./src/'.$img[2].'" alt="" class="card-img-top">
                    <div class="card-body bg-dark">
                        <h5 class="card-title"><a href="./thread_list.php?catid='.$set_category_id[2].'&start_page=0">'.$set_category_name[2].'</a></h5>
                        <p class="card-text"><em>'.substr($set_category_des[2],0,80).'...</em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
?>
<div class="container mb-5 my-5">
    <h2 class="text-underline my-4"><u><em><i class="fa fa-hashtag"></i> Other Categories</em></u></h2>
    <div class="row">
        <?php
        $num=3;
        while($num<count($set_category_des)){
            echo '
            <div class="colmd-3 my-3 ml-5 mr-3 p-2" >
                <div class="card" style="width: 18rem;">
                    <img src="./src/'.$img[$num].'" alt="" class="card-img-top">';

                    echo '
                    <div class="card-body">
                        <h5 class="card-title"><a href="./thread_list.php?catid='.$set_category_id[$num].'&start_page=0">'.$set_category_name[$num].'</a></h5>
                        <p class="card-text"><em>'.substr($set_category_des[$num],0,80).'...</em></p>
                        <a href="./thread_list.php?catid='.$set_category_id[$num].'&start_page=0" class="btn btn-primary">View Threads</a>
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
        require "./partials/_footer.php";
?>
</body>

</html>