<!-- 
    crud project
    crud -> create , read , update and delete
    TODO -> TODO comment use to show security loop holes there hacker hack page
-->
<?php
  $insert_alert=false;
  $update_alert=false;
  $delete_alert=false;
  //connect to database
  $con=mysqli_connect("localhost","root","","inote_php_project");
  if (!$con) {
    die("Connection failed. ".mysqli_connect_error());
  } else {
    // echo "Connection Done.<br>";
  }
  
  if(isset($_GET['delete'])){
    $sno=$_GET['delete'];
    // echo $sno;
    $sql="DELETE FROM `notes` WHERE `sno`='$sno'";
    $result=mysqli_query($con,$sql);
    if($result){
      $delete_alert=true;
    }else{
      // echo "Delete operation fail ".mysqli_error($con);
    }
  }

  if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['sno_edit'])){
      // echo "yes";
      // exit();
      // update
      $title=$_POST['editTitle'];
      $des=$_POST['editDes'];
      $sno=$_POST['sno_edit'];
      $sql="UPDATE `notes` SET `title`='$title' , `des`='$des' WHERE `sno`='$sno'";
      $result=mysqli_query($con,$sql);
      if($result){
        // echo "Update successful<br>";
        $update_alert=true;
      }else{
        // echo "update fail<br>";
      }
    }else{
      // insert
    $title=$_POST['title'];
    $des=$_POST['des'];
    $sql="INSERT INTO `notes` (`title`,`des`) VALUES('$title','$des')";
    $result=mysqli_query($con,$sql);
    if($result){
      // echo "Insertion Successful!<br>";
      $insert_alert=true;
    }else{
      // echo "Insertion Fail , ".mysqli_error($con);
    }
  }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iNote</title>

  <!-- offline bootstrap  -->
  <link rel="stylesheet" href="./web_addons/bootstrap/css/bootstrap.css">
  <script src="./web_addons/jquery/jquery-3.6.0.js"></script> <!--- jquery --->
  <script src="./web_addons/bootstrap/js/bootstrap.js"></script>

  <!-- offline datatable  -->
  <link rel="stylesheet" href="./web_addons/datatable/datatables.css">
  <script src="./web_addons/datatable/datatables.js"></script>
  
  <meta http-equiv="refresh" href="../php_code_t/p27_iNote_project.php">
  <link rel="shortcut icon" href="./src/pngwing.png" type="image/x-icon">
</head>

<body>


  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-tilte" id="editModalLabel">Edit this Note</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <form action="../php_code_t/p27_iNote_project.php" method="post" class="mr-5 ml-5 my-2">
          <div class="modal-body">
          
            <input type="hidden" name="sno_edit" id="sno_edit">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" aria-describedy="emailHelp" name="editTitle" id="editTitle">
            </div>
            
            <div class="form-group">
              <label for="des">Description</label>
              <textarea class="form-control" name="editDes" id="editDes" rows="3"></textarea>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="#">iNote</a> -->
      <a class="navbar-brand" href="#"><img src="./src/pngwing.png" height="28px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" role="search">
          <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <?php
  // TODO : when you reload page then last operation repeat again
    if($insert_alert){
      echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your note has been inserted Successfully!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ';
    }

    if($update_alert){
      echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your note has been updeted Successfully!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ';
    }

    if($delete_alert){
      echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your note has been delete Successfully!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ';
    }
  ?>

  <div class="container my-4">
    <h2>Add a Note</h2>
    <form action="../php_code_t/p27_iNote_project.php" method="post" class="mr-5 ml-5 my-2">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" aria-describedy="emailHelp" name="title" id="title">
      </div>
      
      <div class="form-group">
        <label for="des">Description</label>
        <textarea class="form-control" name="des" id="des" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
  </div>

  <div class="container my-4">
    

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No.</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql="SELECT * FROM `notes`";
          $result=mysqli_query($con,$sql);
          $no=1;
          while ($row=mysqli_fetch_assoc($result)) {
            // echo $row['sno']." Title ".$row['title']." desc is : ".$row['des']."<br>";
            echo '<tr>
            <th scope="row">'.$no.'</th>
            <td>'.$row['title'].'</td>
            <td>'.$row['des'].'</td>
            <td><button class="edit btn btn-sm btn-primary" id='.$row['sno'].'>Edit</button>
            <button class="delete btn btn-sm btn-primary" id=d'.$row['sno'].'>Delete</button>
            </td>
            </tr>';
            $no++;
          }
        ?>
        
      </tbody>
    </table>
  </div>
  <hr>

  <script>
    // data table script
    $(document).ready( function () {
      $('#myTable').DataTable();
    });
  </script>

  <script>
    //  edit button script
    // target gives in consloe -> button
    // target.parentNode.parentNode gives in console -> tr (complete)
    edits=document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
      element.addEventListener('click',(e)=>{
        tr=e.target.parentNode.parentNode;
        // console.log("Edit " , tr); give you complete tr tag of html with data
        title=tr.getElementsByTagName("td")[0].innerText;
        des=tr.getElementsByTagName("td")[1].innerText;
        console.log(title,des);
        editTitle.value=title; // id name can't use - like this edit-Des (not allow)
        editDes.value=des;
        sno_edit.value=e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');// if you use id for event then always use #
      })
    })

    // delete script
    deletes=document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element)=>{
      element.addEventListener('click',(e)=>{
        sno=e.target.id.substr(1,);
        // console.log(sno);
        if (confirm("Are you Sure?")) {
          // console.log("yes");
          window.location='../php_code_t/p27_iNote_project.php?delete='+sno;
          // TODO -> create a form and use post request to submit a form
        } else {
          // console.log("no");
        }
      })
    })


    // reload script (that redarect to home page when close press)
    deletes=document.getElementsByClassName('close');
    Array.from(deletes).forEach((element)=>{
      element.addEventListener('click',(e)=>{
        window.location='../php_code_t/p27_iNote_project.php';
      })
    })
  </script>
</body>

</html>