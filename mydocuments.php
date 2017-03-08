<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}

if ($_SESSION['userRole'] !== ('Admin'))
{
   $user_home->redirect('dashboard.php');
}

if(isset($_POST['btn-signup']))
{
   $fname = trim($_POST['txt_fname']);
   $lname = trim($_POST['txt_lname']);
   $uname = trim($_POST['txt_uname']);
   $uemail = trim($_POST['txt_email']);
   $upass = trim($_POST['txt_upass']);
   $role = trim($_POST['txt_role']);
   if($fname=="") {
      $error[] = "provide first name !";
   }
   if($lname=="") {
      $error[] = "provide last name !";
   }
   if($uname=="") {
      $error[] = "provide username !";
   }
   else if($umail=="") {
      $error[] = "provide email id !";
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($upass=="") {
      $error[] = "provide password !";
   }
   else if(strlen($upass) < 6){
      $error[] = "Password must be atleast 6 characters";
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT userName,userEmail FROM tbl_users WHERE userName=:uname OR userEmail=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);

         if($row['userName']==$uname) {
            $error[] = "sorry username already taken !";
         }
         else if($row['userEmail']==$umail) {
            $error[] = "sorry email address already taken. You acoutn may already be active!";
         }
         else
         {
            if($user->register($fname,$lname,$uname,$umail,$upass))
            {
                $user->redirect('sign-up.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  }
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Documents</title>


    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

        <div class="container">
     <form action="logout.php">
       <input type="submit" value="logout" />
     </form>
    <h1>My Documents</h1>

    <!-- SIMPLE PAGE BREADCRUMB-->
    <ul class="breadcrumb">
      <li><a href="dashboard.php">Dashboard</a></li>
      <li class="active">Manage Users</li>
    </ul>
    <!--END BREAD CRUMB-->

    <?php
      if(isset($error))
      {
         foreach($error as $error)
         {
            ?>
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error;
      ?>
      <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; User successfully registered <a href=''></a>
                 </div>
                 <?php
            }
            ?>


      <p></p>

      <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i>
        Upload Document
    </button>

      <br>
      <br>

    <!-- Viewing users.. -->
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search My Documents">
        </div>
      </form>

    <thead>
        <tr>

        <th>Document ID</th>
        <th>Doument Title</th>
        <th>Document Description</th>
        <th>Dcument File</th>
        <th>Upload Date</th>
        <th>Status</th>
        <th>Actions</th>
        </tr>
    </thead>
    <?php
          //DB CONNECTION
          $database = new Database();
          $db = $database->dbConnection();
          $conn = $db;


                  $query = "SELECT * FROM tbl_users";
                  $stmt = $conn->prepare($query);
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <tr>

                    <td><?php echo $row['userID']?></td>
                    <td><?php echo $row['userName']?></td>
                    <td><?php echo $row['userFirstName']."&nbsp;".$row['userSurname']; ?></td>
                    <td><?php echo $row['userEmail']?></td>
                    <td><?php echo $row['userRole']?></td>
                    <td><?php echo $row['userStatus']?></td>

                  <td>
                    <!-- ADDING VIEW USER BUTTON TO CHANGE -->
                    <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['userID']; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                    <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['userID']; ?>" id="getUser" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
                    <button data-toggle="modal" data-target=".bs-example-modal-sm" data-id="<?php echo $row['userID']; ?>" id="getUser" class="btn btn-danger"><i class="glyphicon glyphicon-minus"></i> Delete</button>

                  </td>
                </tr>

                  <?php
                }
             ?>


       </tbody>
    </table>
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    <tbody>


</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Document</h4>
      </div>
      <div class="modal-body">
        <form>
              <div class="form-group">
                  <label for="exampleInputEmail1">Document Title</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Document Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3"  placeholder="Document Description"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">
                  <p class="help-block">Browse Computer</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Publish Document
                  </label>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
