<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();
if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}

if ($_SESSION['userRole'] !== ('Admin'))
{
   $user_home->redirect('dashboard.php');
}



if(isset($_POST['btn-signup']))
{
 $fname = trim($_POST['txtfname']);
 $lname = trim($_POST['txtlname']);
 $uname = trim($_POST['txtuname']);
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtpass']);

 $stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
 $stmt->execute(array(":email_id"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if($user_home->register($fname,$lname,$uname,$email,$upass))
  {
    $user_home->redirect('manage_users.php');

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
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/sign.css" rel="stylesheet">

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
                        <i class="fa fa-plus"></i> Register User
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <body id="login">
          <div class="form-group">
          <?php if(isset($msg)) echo $msg;  ?>
            <form class="form-signin" method="post">
              <h2 class="form-signin-heading">Sign Up</h2><hr />
              <input type="fname" class="input-block-level" placeholder="First Name" name="txtfname" required />
              <input type="lname" class="input-block-level" placeholder="Last Name" name="txtlname" required />
              <input type="text" class="input-block-level" placeholder="Username" name="txtuname" required />
              <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
              <input type="password" class="input-block-level" placeholder="Password" name="txtpass" required />
            <hr />
              <button class="btn btn-large btn-primary" type="submit" name="btn-signup">Sign Up</button>
            </form>
  </div>
</div>
</div>
<?php include 'templates/foot.php';?>


    <!-- jQuery -->
    <script src="templates/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="templates/js/bootstrap.min.js"></script>

  </body>
</html>
