<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}

//if ($_SESSION['userRole'] !== ('Admin', 'Doc_Creator'))
//{
//   $user_home->redirect('dashboard.php');
//}
//docTitle,$docDesc

if(isset($_POST['btn-upload']))
{
   $docTitle = trim($_POST['txtdocTitle']);
   $docDesc = trim($_POST['txtdocDesc']);
   $file = rand(1000,100000)."-".$_FILES['file']['name'];
   $file_loc = $_FILES['file']['tmp_name'];
   $file_size = $_FILES['file']['size'];
   $file_type = $_FILES['file']['type'];
   $folder="uploads/";
   $userID = trim($_SESSION['userSession']);

   // new file size in KB
 $new_size = $file_size/1024;
 // new file size in KB

 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
//  $fleExt = strtolower(pathinfo($file,PATHINFO_EXTENSION)); // get file extension
//  $valid_extensions = array('doc', 'docx', 'pdf', 'txt');


 $final_file=str_replace(' ','-',$new_file_name);

 //if(in_array($fleExt, $valid_extensions)){

   if(move_uploaded_file($file_loc,$folder.$final_file)){

    if($user_home->create_doc($docTitle,$docDesc,$file,$file_type,$new_size,$userID))
    {
      $user_home->redirect('mydocuments.php');

    }
    else{
     echo "sorry , Query could no execute...";

   }
  }
}else{


}


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Upload Document</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

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
  <body id="login">

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
                        <i class="fa fa-upload"></i> Upload Document
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    <div class="form-group">
    <?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post" enctype="multipart/form-data">
        <input type="docTitle" class="form-control" style="width:350px;" placeholder="Document Title" name="txtdocTitle" required />
        <input type="docDesc" class="form-control" style="width:350px;" placeholder="Document Description" name="txtdocDesc" required />
            <input type="file" name="file" />
      <hr />
        <button class="btn btn-large btn-info" type="submit" name="btn-upload">Upload</button>
      </form>

</div>
</div>
</div>
    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
