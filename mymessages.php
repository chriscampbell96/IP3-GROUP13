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
                    <i class="fa fa-comments"></i> My Messages
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <form action="send_documents.php">
      <button type="submit" name="Send Documents" style="border-radius:10px;" class="btn btn-info"><i class="fa fa-fw fa-envelope"></i> Send Message</button>
    </form>

    <br>

  <!-- Viewing users.. -->
  <div class="table-responsive">
  <table class="table table-striped table-bordered">

  <thead>
      <tr>
      <th>Message ID</th>
      <th>Mesage title</th>
      <th>Message</th>
      <th>Message From</th>
      <th>Attatchments</th>
      <th>Message Date</th>
      <th>Actions</th>

      </tr>
  </thead>
  <?php

                $uid = $_SESSION['userSession'];

                      $query = "SELECT * FROM tbl_messages WHERE msgTO=$uid";
                      $records_per_page=3;
                      $newquery = $paginate->paging($query,$records_per_page);
                      $paginate->dataviewfive($newquery);
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
