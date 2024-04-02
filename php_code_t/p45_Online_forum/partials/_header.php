<style>
a.dropdown-item:hover, a.dropdown-item:focus {
    color: #000000 !important;
}
</style>
<?php
    session_start(); // don't forget to start a session
    $user_login=false;
    if((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']==true)){
        $user_login=true;
    }else{
      $user_login=false;
    }
    
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">iDiscuss</a>
            <!-- <a class="navbar-brand" href="#"><img src="./src/pngwing.png" height="28px"></a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item ">
            <a class="nav-link active" href="./index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.php">About</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="./contact.php">Contact</a>
          </li> -->
          <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
              Top Categories
            </a>
            <div class="dropdown-menu bg-dark text-dark " aria-labelledby="navbarDropdown">';
            // it is not a good algo when we have categories in large number (you are also use top four category on db then you don't need to make and run algo)
            $sql_find="SELECT r_rating,category_name,category_id,category_description FROM `categories`";
            $result_rating=mysqli_query($con,$sql_find);
            $arr_rating;
            $arr_name;
            $arr_id;
            $arr_descr;
            for($i=0;$row_rating=mysqli_fetch_assoc($result_rating);$i++){
                $arr_id[$i]=$row_rating['category_id'];
                $arr_rating[$i]=$row_rating['r_rating'];
                $arr_name[$i]=$row_rating['category_name'];
                $arr_descr[$i]=$row_rating['category_description'];
            }
            $final_arr=array_combine($arr_name,$arr_rating);
            $final_id_arr=array_combine($arr_id,$arr_rating);
            arsort($final_arr); //sort an array in descending order & maintain index association (by value)
            arsort($final_id_arr);
            $set_category_name;
            $i=0;
            foreach ($final_arr as $key => $value) {
              $set_category_name[$i]=$key;
              $i++;
            }
            $set_category_id;
            $i=0;
            foreach ($final_id_arr as $key => $value) {
              $set_category_id[$i]=$key;
              $i++;
            }
            
            for($i=0;$i<4;$i++){
              echo '
                   <a href="thread_list.php?catid='.$set_category_id[$i].'&start_page=0" class="dropdown-item text-light">'.$set_category_name[$i].'</a>';
            }

            // below code use in all_category.php
            $final_des=array_combine($arr_descr,$arr_rating);
            arsort($final_des);
            $set_category_des;
            $i=0;
            foreach ($final_des as $key => $value) {
              $set_category_des[$i]=$key;
              $i++;
            }

echo '         
              <div class="dropdown-divider"></div>
              <a href="./all_category.php" class="dropdown-item text-light">View All Categories</a>
            </div>


          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contact.php" tabindex="-1" aria-disabled="true">Contact</a>
          </li>
        </ul>
        <!-- <div class="mx-2"> this is comment-- first button then search --
          <button class="btn btn-primary mr-2">Login</button>
          <button class="btn btn-primary mr-2">Signup</button>
        </div>
        <form class="form-inline my-2 my-lg-0" role="search">
          <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->';


        echo '
        <!-- first search then button -->
        <div class="row mx-2"> 
          <form action="search.php" method="get" class="form-inline my-2 my-lg-0" role="search">
            <input class="form-control mr-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa-solid fa-search"></i> Search</button>
          </form>
          ';

          if(!($user_login)){
            // echo 'IF';
            echo '
              <button class="btn btn-outline-light mr-2 ml-4" data-toggle="modal" data-target="#loginModal">Login</button>
              <button class="btn btn-outline-success mr-2" data-toggle="modal" data-target="#signupModal">Signup</button>';
          }else{
            // echo 'ELSE';
            // echo '
            // <button class="btn btn-outline-light mr-2 ml-4 p-0" style="border-style: none;" data-toggle="modal" data-target="#logoutModal"><img src="./src/user_icon.png" height="35px" style="border-radius: 50%;" alt=""></button>

            // ';
            echo '
             <button class="btn btn-outline-success mr-2 ml-4"  data-toggle="modal" data-target="#logoutModal"><i class="fa-solid fa-user"></i> Logout</button>

            ';
          }


        echo '
        </div>  
      </div>
    </div>
    </nav>';

    require '_loginModal.php';
    require '_signupModal.php';
    require '_logoutModal.php';


  //   if(isset($_GET['blankError']) && $_GET['blankError']=="true"){
  //     echo "hello";
  //     echo "<script>
  //     alert('hello');
          
  //     </script>";
  // }
?>
