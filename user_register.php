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
    <title>Register New Users</title>
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/signup.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <?php include 'templates/header.php';
    include 'templates/sidebar.php';?>
  </head>
  <body id="login">
    <div id="wrapper">
      <div id="page-wrapper">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome <small> <?php echo $_SESSION['userEmail'] ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-plus"></i> Register User
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="container-fluid">

    <div class="form-group">
    <?php if(isset($msg)) echo $msg;  ?>
      <div class="container-signin" method="post">
        <input type="fname" class="form-control" style="width:400px" placeholder="First Name" name="txtfname" required />
        <input type="lname" class="form-control" style="width:400px" placeholder="Last Name" name="txtlname" required />
        <input type="text" class="form-control" style="width:400px" placeholder="Username" name="txtuname" required />
        <input type="email" class="form-control" style="width:400px" placeholder="Email address" name="txtemail" required />
        <input type="password" class="form-control" style="width:400px" placeholder="Password" name="txtpass" required />
        <button class="btn btn-info" type="submit" name="btn-signup">Sign Up</button>
      </div>

    </div> <!-- /container -->
  </div>
  <?php include 'templates/foot.php';?>
</div>
</div>
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
