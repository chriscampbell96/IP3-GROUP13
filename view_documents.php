<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

include('dbconfig.php');

if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shared Documents</title>


    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/sharedocs.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <?php  if ($_SESSION['userRole'] == ('Admin'))
      {
        include 'templates/headadmin.php';
      }
  else
  {
    include 'templates/header.php';
  }
      ?>
      <?php if ($_SESSION['userRole'] == ('Distributee'))
        {
          include 'templates/sidebar-dis.php';
        }
        else {
          include 'templates/sidebar.php';
        }
        ?>
  </head>
  <body>

<div id="wrapper">
    <div id="page-wrapper">

      <div class="container-fluid">


        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">

                </h1>

                <?php
                if(isset($_GET['success']))
                {
                 ?>
                       <div class="alert alert-success">
                    <strong>Success!</strong> You created a new revsion...
                 </div>
                       <?php
                }
                 ?>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-share-alt"></i> Shared Documents
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->





      <p></p>

      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search My Shared Documents">
      </div>

    <!-- Viewing users.. -->
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <form class="navbar-form navbar-left">

      </form>

    <thead>
        <tr>

        <th>Document ID</th>
        <th>Doument Title</th>
        <th>Document Description</th>
        <th>Last Changed</th>
        <th>Document File</th>
        <th>User</th>
        <th>Actions</th>
        </tr>
    </thead>
    <?php

    $uid = $_SESSION['userSession'];

          $query = "SELECT * FROM tbl_documents WHERE docStatus='Active'";
          $records_per_page=3;
          $newquery = $paginate->paging($query,$records_per_page);
          $paginate->dataviewtwo($newquery);
          ?>
                </tr>


       </tbody>
    </table>
</div>
<?php $paginate->paginglink($query,$records_per_page); ?>
    <tbody>

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
