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
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/upload.css" rel="stylesheet">

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
                        <i class="fa fa-upload"></i> Upload Document
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->



        <form class="form-group">
            <?php if(isset($msg)) echo $msg;  ?>
              <form class="form-signin" method="post" enctype="multipart/form-data">
                  <input class="form-control" id="comment" placeholder="Document Title" style="border-radius:10px;" required />
                  <input class="form-control" id="comment" placeholder="Document Description" style="border-radius:10px;" required />
                    <input class="work" type="file" name="file" />

              <div class="button">
                <button class="btn btn-large btn-info" type="submit" name="btn-upload">Upload</button>
              </div>
            </form>
        </form>
</div>
</div>
</div>
<?php include 'templates/foot.php';?>


    <!-- jQuery -->
    <script src="templates/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="templates/js/bootstrap.min.js"></script>
