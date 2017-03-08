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
   $docFile = trim($_FILE['file']['name']);
   $tmp_name = $_FILE['file']['tmpName'];
   $userID = trim($_SESSION['userSession']);


    if($user_home->create_doc($docTitle,$docDesc,$docFile,$userID))
    {
      $user_home->redirect('mydocuments.php');

    }
    else
    {
     echo "sorry , Query could no execute...";

   }
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
  </head>
  <body id="login">
    <div class="form-group">
    <?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Upload Document</h2><hr />
        <input type="docTitle" class="input-block-level" placeholder="Document Title" name="txtdocTitle" required />
        <input type="docDesc" class="input-block-level" placeholder="Document Description" name="txtdocDesc" required />
            <input type="file" name="file" />
      <hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-upload">Upload</button>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
