<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

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



    <title>Create Document</title>


    <!-- Bootstrap -->
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/create.css" rel="stylesheet">
    <link href="templates/homepage.css" rel="stylesheet">

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
                    <i class="fa fa-file-text-o"></i> Create Document
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

                <!-- Include stylesheet -->
                <link href="https://cdn.quilljs.com/1.2.2/quill.snow.css" rel="stylesheet">

                <!-- Create the editor container -->
                <div id="editor">
                  <p>Hello World!</p>
                  <p>Some initial <strong>bold</strong> text</p>
                  <p><br></p>
                </div>

                <!-- Include the Quill library -->
                <script src="https://cdn.quilljs.com/1.2.2/quill.js"></script>

                <!-- Initialize Quill editor -->
                <script>
                  var quill = new Quill('#editor', {
                    theme: 'snow'
                  });
                </script>
<br>
                <div class="container-buttons">

                  <a href="#" style="background-color:#BF3944; border:1pt solid #BF3944" class="btn btn-primary">Save</a>


                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
