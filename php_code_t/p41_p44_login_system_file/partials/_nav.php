<!-- NAV FILE -->
<?php
  $user_login=true;
  
  // if (session_status() === PHP_SESSION_NONE) {
    // IT ALSO WORK PROPUER
  // }
  if(session_status() !== PHP_SESSION_ACTIVE){// DON'T USE !isset($_SESSION) BECAUSE ITS NOT WORK PROPERLY
    $user_login=true;
  }else{
    $user_login=false;
  }
  
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./p43_welcome_page(login_system_f3).php">iLog</a>
      <!-- <a class="navbar-brand" href="#"><img src="./src/pngwing.png" height="28px"></a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item active">
            <a class="nav-link" href="./p43_welcome_page(login_system_f3).php">Home <!--<span class="sr-only">(current)</span>--></a>
          </li>';
  if($user_login){
    echo '<li class="nav-item">
            <a class="nav-link" href="./p41_login_page(login_system_f1).php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./p42_signup_page(login_system_f2).php">Signup</a>
          </li>';
  }
  if (!$user_login) {
    echo '<li class="nav-item">
            <a class="nav-link" href="./p44_logout_page(login_system_f4).php">Logout</a>
          </li>
        ';
  }
    echo '</ul>
        <form class="form-inline my-2 my-lg-0" role="search">
          <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>';
?>