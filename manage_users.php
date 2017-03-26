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

if(isset($_POST['btn-activate'])){

   $id = $_GET['id'];
   extract($user_home->getID($userId));

   $statusY = "Y";
   $statusN = "N";

$stmt = $user->runQuery("SELECT userID,userStatus FROM tbl_users WHERE userID=:$id");
$stmt->execute(array(":userID"=>$userId));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0)
{
if($row['userStatus']==$statusN)
{
$stmt = $user->runQuery("UPDATE tbl_users SET userStatus=:status WHERE userId=:$id");
$stmt->bindparam(":status",$statusY);
$stmt->execute();

$msg = "
          <div class='alert alert-success'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>WoW !</strong>  Your Account is Now Activated : <a href='manage_users.php'></a>
       </div>
       ";
}
else
{
$msg = "
          <div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>sorry !</strong>  Your Account is allready Activated : <a href='manage_users.php'></a>
       </div>
       ";
}
}
else
{
$msg = "
      <div class='alert alert-error'>
   <button class='close' data-dismiss='alert'>&times;</button>
   <strong>sorry !</strong>  No Account Found : <a href='manage_users.php'></a>
   </div>
   ";
}
}


?>
  <?php
if(isset($_GET['blank']))
{
 ?>
          <div class='alert alert-error'>
  <button class='close' data-dismiss='alert'>&times;</button>
  <strong>Sorry!</strong> You can't leave a field blank!
 </div>
          <?php
}


if(isset($_POST['btn-update']))
{
 $id = $_GET['edit_id'];
 $fname = $_POST['first_name'];
 $lname = $_POST['last_name'];
 $email = $_POST['uname'];
 $contact = $_POST['email'];

 if($crud->update($id,$fname,$lname,$uname,$email))
 {
  $msg = "<div class='alert alert-info'>
    <strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
    </div>";
 }
 else
 {
  $msg = "<div class='alert alert-warning'>
    <strong>SORRY!</strong> ERROR while updating record !
    </div>";
 }
}

if(isset($_GET['edit_id']))
{
 $id = $_GET['edit_id'];
 extract($user_home->getID($id));
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Manage Users</title>


    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/homepagejoin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  </head>
  <body>

    <?php include("templates/header.php"); ?>
    <?php include("templates/sidebar.php"); ?>
    <div id="wrapper">
<div id="page-wrapper">

  <div class="container-fluid">


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">

            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-users"></i> Manage Users
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


      <form action="user_register.php">
        <button type="submit" name="Create New user" style="border-radius:10px;" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>Create User</button>
      </form>

      <br>

    <!-- Viewing users.. -->
    <div class="table-responsive">
    <table class="table table-striped table-bordered">

    <thead>
        <tr>

        <th>UserID</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Role</th>
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


                    <?php if($row['userStatus'] == ('N')){
                      echo '  <button type="submit" class="btn btn-info" style="border-radius:10px;" name="btn-activate"><i class="fa fa-fw fa-check"></i> Activate</button>';
                      }else{
                      echo '  <button class="btn btn-default" style="border-radius:10px;"><i class="fa fa-fw fa-archive"></i> Archive</button>';
                    } ?>

                    <button data-toggle="modal" data-target="#myModal" style="border-radius:10px; background-color:#f05133; color:white" id="getUser" class="btn"><i class="fa fa-fw fa-pencil"><a href="editUser.php?edit_id=<?php echo $row['userID']; ?>" style="color:white"></i> Edit</a></button>



                  </td>
                </tr>



                  <?php
                }
             ?>



       </tbody>
    </table>
  </div>

  <nav class="pages" aria-label="Page navigation" style="text-align:center; align-items;center;">
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

    <!-- Modal -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Username:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Password:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Role:</label>

          <select class="form-control">
            <option>Admin</option>
            <option>Doc Creator</option>
            <option>Distributee</option>
          </select>
          </div>
          <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="">
              Activate User
            </label>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div> -->



</div>
</div>

<?php include 'templates/foot.php';?>
</div>



      <!-- jQuery -->
      <script src="templates/js/jquery.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="templates/js/bootstrap.min.js"></script>

  </body>
</html>
