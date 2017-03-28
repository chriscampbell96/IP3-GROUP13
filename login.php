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
    <link href="templates/signin.css" rel="stylesheet">
    <link href="templates/homepagejoin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <?php include 'templates/head.php';?>
  </head>

  <body id="login">
      <div class="signin-container">

        <form class="form-signin" method="post">
        <?php
        if(isset($_GET['error']))
  {
   ?>
            <div class="alert" style="background-color:#F3F4F5; color:#0a3245">
    <button class="close" class="btn btn-default" data-dismiss="alert">&times;</button>
    <strong>Please check your credentials.</strong>
   </div>
            <?php
  }
  ?>

  <?php
  if(isset($_GET['inactive']))
  {
   ?>
   <div class="alert" style="background-color:#F3F4F5; color:#0a3245">
     <button class="close" class="btn btn-default" data-dismiss="alert">&times;</button>
    <strong>Sorry!</strong> This Account is not Activated. Please contact the System Administrator.
   </div>
            <?php
  }
  ?>


        <h2 class="form-signin-heading" style="color:white">Please Sign In</h2><hr />
        <input type="email" class="form-control" placeholder="Email address" style="border-radius: 10px; margin-bottom: 10px;" name="txtemail" required />
        <input type="password" class="form-control" placeholder="Password" style="border-radius: 10px;" name="txtupass" required />

      <hr />
        <div class="signin-button">
        <button class="btn btn-large btn-primary" type="submit" style="border-radius: 10px;" name="btn-login">Sign in</button>
        <br>
        <a href="#" style="color:white;">Forgot your Password? </a>
      </div>
      </form>

    </div> <!-- /container -->

<?php include 'templates/foot.php';?>

    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="assests/js/bootstrap.min.js"></script>
  </body>
</html>
