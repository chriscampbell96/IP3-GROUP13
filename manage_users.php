<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

include('dbconfig.php');
if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}

if ($_SESSION['userRole'] !== ('Admin'))
{
   $user_home->redirect('dashboard.php');
}

?>
  <?php
if(isset($_GET['blank']))
{
 ?>
          <div class='alert alert-warning'>
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
    <?php  if ($_SESSION['userRole'] == ('Admin'))
      {
        include 'templates/headadmin.php';
      }
    else
    {
    include 'templates/header.php';
    }
      ?>

      <?php include 'templates/sidebar.php';?>

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

    <?php
    if(isset($_GET['success']))
    {
     ?>
           <div class="alert alert-success">
        <strong>Success!</strong> user was <strong><u>activated.</u></strong>
     </div>
           <?php
    }
     ?>
     <?php
     if(isset($_GET['deactivated']))
     {
      ?>
            <div class="alert alert-warning">
          User was <strong><u>deactivated.</u></strong>
      </div>
            <?php
     }
      ?>



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

                  $uid = $_SESSION['userSession'];

                        $query = "SELECT * FROM tbl_users";
                    		$records_per_page=3;
                    		$newquery = $paginate->paging($query,$records_per_page);
                    		$paginate->dataviewfour($newquery);
                    		?>

                </tr>


       </tbody>
    </table>
  </div>


<div class="pages" style="text-align:center; align-items:center;">
  <?php $paginate->paginglink($query,$records_per_page); ?>
</div>

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
