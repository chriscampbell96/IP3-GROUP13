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
<html>
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/homepagejoin.css" rel="stylesheet">

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
                        <i class="fa fa-file-text-o"></i> Create Document
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

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
                        <div class="container-button">
                          <hr />

                          <a href="#" class="btn btn btn-info" style="border-radius: 10px;">Save</a>


                        </div>

  </div>
</div>
</div>
<?php include 'templates/footer.php';?>


    <!-- jQuery -->
    <script src="templates/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="templates/js/bootstrap.min.js"></script>

  </body>
</html>
