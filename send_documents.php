<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();



if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}


$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Send Documents</title>
    <head>
      <meta charset="utf-8">
      <title>dashboard</title>
      <link href="templates/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="templates/css/sb-admin.css" rel="stylesheet">
      <link href="templates/homepage.css" rel="stylesheet">

      <!-- Custom Fonts -->
      <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <?php include 'templates/header.php';
      include 'templates/sidebar.php';?>
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
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-envelope"></i> Send Documents
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">User Email:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="control-label">Select Document:</label>

  <select class="form-control">
    <option>Document 1</option>
    <option>Document 2</option>
    <option>Document 3</option>
  </select>
  </div>
  <div class="form-group">
    <label for="recipient-name" class="control-label">Message:</label>

    <textarea class="form-control" rows="3" placeholder="Please explain your message"></textarea>

  </div>
  <button type="submit" class="btn btn-default">Send</button>
</form>


      </div>
    </div>
  </div>



    <!-- jQuery -->
    <script src="templates/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="templates/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="templates/js/plugins/morris/raphael.min.js"></script>
    <script src="templates/js/plugins/morris/morris.min.js"></script>
    <script src="templates/js/plugins/morris/morris-data.js"></script>
  </body>
</html>
