<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

include('dbconfig.php');
if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}

if ($_SESSION['userRole'] == ('Distributee'))
{
   $user_home->redirect('dashboard.php');
}



if(isset($_POST['btn-update']))
{
 $id = $_GET['edit_id'];
 $dname = $_POST['docTitle'];
 $ddesc = $_POST['docDesc'];

 if($editDoc->updateDoc($id,$dname,$ddesc))
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
 extract($user_home->getdID($id));
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>My Documents</title>


    <!-- Bootstrap -->
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/mydocs.css" rel="stylesheet">

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
                    <i class="fa fa-book"></i> My Documents
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <?php
    if(isset($_GET['published']))
    {
     ?>
           <div class="alert alert-success">
        <strong>Success!</strong> Your document was <strong><u>published.</u></strong>
     </div>
           <?php
    }
     ?>
     <?php
     if(isset($_GET['draft']))
     {
      ?>
            <div class="alert alert-warning">
              Your document was set to <strong><u>draft.</u></strong>
      </div>
            <?php
     }
      ?>

    <form action="upload_document.php">
      <button type="submit" name="Create New document" class="btn btn-info" style="border-radius: 10px"><i class="fa fa-fw fa-upload"></i> Upload New Document</button>
    </form>


<br>

<div class="form-group">
  <input type="text" class="form-control" placeholder="Search My Documents">
</div>

    <!-- Viewing users.. -->
    <div class="table-responsive">
    <table class="table table-striped table-bordered">


    <thead>
        <tr>

        <th>Document ID</th>
        <th>Doument Title</th>
        <th>Document Description</th>
        <th>Last Changed</th>
        <th>Document File</th>
        <th>Document Status</th>
        <th>Actions</th>
        </tr>
    </thead>
    <?php

          $uid = $_SESSION['userSession'];

                $query = "SELECT * FROM tbl_documents WHERE userId='$uid'";
            		$records_per_page=3;
            		$newquery = $paginate->paging($query,$records_per_page);
            		$paginate->dataview($newquery);
            		?>

                </tr>
       </tbody>
    </table>
  </div>

  <?php $paginate->paginglink($query,$records_per_page); ?>

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
