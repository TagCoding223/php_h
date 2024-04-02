<?php
    require './partials/_dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDiscuss - Coding Forums</title>
    <?php 
        require "./partials/_offline_bootstrap.php";
        require "./partials/_icon.php";
    ?>
</head>

<body>
    <?php 
        require "./partials/_header.php";
        if ($_SERVER['REQUEST_METHOD']=='GET') {
            $search_query=$_GET['query'];
            
        }
        // ALTER TABLE threads ADD FULLTEXT(`thread_title`,`thread_desc`);
        // run this line in db table to enable full text search

        // SELECT * FROM `threads` WHERE MATCH(thread_title,thread_desc) against ('run');
        // this query find the result in db
?>
    <div class="container my-4" style="min-height: 70vh;">
        <h1>Search results for <em>"<?php echo $search_query; ?>"<em></h1>
        <div class="result mt-4">
            <?php
                // SELECT * FROM `threads` WHERE MATCH(thread_title,thread_desc) against ('run');
                // this query find the result in db
                $sql="SELECT * FROM `threads` WHERE MATCH(thread_title,thread_desc) against ('$search_query')";
                $result=mysqli_query($con,$sql);
                $num=mysqli_num_rows($result);
                if($num>0){
                    while ($row=mysqli_fetch_assoc($result)) {
                        $title=$row['thread_title'];
                        $desc=$row['thread_desc'];
                        $thread_id=$row['thread_id'];
                        $url_s="thread.php?thread_id=".$thread_id;
                        echo ' 
                            <h3 class="mr-5 ml-5"><a href="'.$url_s.'">'.$title.'</a></h3>
                            <p class="mr-5 ml-5 ">'.$desc.'</p>
                            <hr style="border-top: 3px solid rgb(157 43 43);">
                        ';
                    }
                }else{
                    echo '
                        <div class="jumbotron jumbotron-fluid my-5"  style="min-height: 50vh;">
                            <div class="container pl-5 ml-4 mt-4">
                                <p class="display-4">No Result Found</p>
                                <p class="lead">Suggestion:
                                    <ul>
                                        <li>Make sure that all words are spelled correctly.</li>
                                        <li>Try different keywords.</li>
                                        <li>Try more general keywords.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    ';
                }
            ?>
            
        </div>
    </div>
    
    <?php 
        require "./partials/_footer.php";
?>


</body>

</html>