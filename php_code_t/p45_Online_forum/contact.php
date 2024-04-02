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
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $c_name=$_POST['c_name'];
            $c_email=$_POST['c_email'];
            $c_subject=$_POST['c_subject'];
            $c_description=$_POST['c_description'];
            $sql="SELECT * FROM `contact` WHERE `subject`='$c_subject'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_num_rows($result);
            if(!($row>0)){
                $sql="INSERT INTO `contact`(`name`,`email`,`subject`,`descr`) VALUES('$c_name','$c_email','$c_subject','$c_description')";
                $result=mysqli_query($con,$sql);
                if($result){
                    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>We receive your feedback, Please wait for response !!!</strong>
                        <button type="button" class="close closeBL" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }
            }
            $result=NULL;
        }
?>
    <div class="container my-4 " style="padding-left: 5vw;padding-right: 5vw;min-height:545px">
        <h2 class="text-center">iDiscuss - Contact</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="from-group my-3">
                <label for="name">Name</label>
                <input type="text" name="c_name" id="name" class="form-control">
            </div>
            <div class="from-group my-3">
                <label for="email">Email</label>
                <input type="email" name="c_email" id="email" class="form-control">
            </div>
            <div class="from-group my-3">
                <label for="Subject">Subject</label>
                <input type="text" name="c_subject" id="subject" class="form-control">
            </div>
            <div class="from-group my-3">
                <label for="description">Description</label>
                <textarea name="c_description" id="description" class="form-control"></textarea>
            </div>
            <div class="from-group my-3 float-right">
                <button class="btn btn-success" type="submit">Submit <i class="fa fa-paper-plane"></i></button>
            </div>
        </form>
    </div>

    
    <?php 
        require "./partials/_footer.php";
?>
</body>

</html>