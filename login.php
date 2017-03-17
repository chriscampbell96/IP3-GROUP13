<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();


if(isset($_POST['btn-login']))
{
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtupass']);

 if($user_login->login($email,$upass))
 {
  $user_login->redirect('dashboard.php');
 }
}
?>

<!--if($user_login->is_logged_in()!="" AND $_SESSION['userRole'] = ('Admin'))
{
$user_login->redirect('dashboardAdmin.php');
} elseif ($user_login->is_logged_in()!="" AND $_SESSION['userRole'] = ('Doc_Creator')) {
$user_login->redirect('dashboard.php');
}

if(isset($_POST['btn-login']))
{
$email = trim($_POST['txtemail']);
$upass = trim($_POST['txtupass']);

if($user_login->login($email,$upass) AND $_SESSION['userRole'] = ('Admin'))
{
$user_login->redirect('dashboardAdmin.php');
} elseif ($user_login->login($email,$upass) AND $_SESSION['userRole'] = ('Doc_Creator')) {
$user_login->redirect('dashboard.php');
}
}
?>
-->
<!DOCTYPE html>
<html>
  <head>
    <title>Login | Document Management</title>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/homepage.css" rel="stylesheet">
    <link href="templates/header.css" rel="stylesheet">
    <link href="templates/login.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <?php include 'templates/header.php';?>
  </head>



  <body id="login">
    <div class="container">
  <?php
  if(isset($_GET['inactive']))
  {
   ?>
            <div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Sorry!</strong> This Account is not Activated. Please contact the System Administrator.
   </div>
            <?php
  }
  ?>
  <div class="signin-container">
        <form class="form-signin" method="post">
        <?php
        if(isset($_GET['error']))
  {
   ?>
            <div class='alert alert-success'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Please check your credentials.</strong>
   </div>

            <?php
  }
  ?>

  
        <h2 class="form-signin-heading" style="color:white">Please Sign In</h2><hr />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtupass" required />

      <hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-login">Sign in</button>
        <a href="#">Lost your Password ? </a>
      </form>
    </div>

    </div> <!-- /container -->
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="assests/js/bootstrap.min.js"></script>
  </body>
</html>
