

<?php
session_start();
include_once 'config.php';

require_once 'class.user.php';

$edituser = new USER();

if(!$edituser->is_logged_in())
{
 $edituser->redirect('login.php');
}


if(isset($_POST['btn-update']))
{
 $id = $_GET['edit_id'];
 $upass = $_POST['update_pass'];
$hash = sha1($_POST['current_pass']);



 if ($_POST['update_pass'] == $_POST['update_pass1'] AND $hash == $_SESSION['userPass'])
  {
      if($edituser->updatepass($id,$upass))
 {
  $edituser->redirect('logout.php');
 }
 else
 {
   $msg = "<div class='alert alert-warning'>
     <strong>Error!</strong> Somthing went wrong!
     </div>";
 }


}
}


if(isset($_GET['edit_id']))
{
 $id = $_GET['edit_id'];
 extract($edituser->getID($id));
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Change Password</title>


    <!-- Bootstrap -->
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/mydocs.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <?php  if ($_SESSION['userRole'] == ('Admin'))
      {
        include 'templates/headadmin.php';
      }
  else
  {
    include 'templates/header.php';
  }
      ?>

      <?php include 'templates/sidebar.php';?>

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
                      <i class="fa fa-pencil-square-o"></i> Change Password
                  </li>
              </ol>
          </div>
      </div>

      <a href="profile.php" class="btn btn-info" style="border-radius:10px; margin-bottom:20px;"><i class="fa fa-arrow-left"></i> &nbsp;Back to profile</a>


      <?php
      if(isset($msg))
      {
       echo $msg;
      }
      ?>

</div>


<div class="clearfix"></div>


     <form method='post'>


       <div class="table-responsive">
    <table class='table table-bordered'>

        <tr>
            <td style="padding:15px;">Enter Current Password </td>
            <td><input type='password' name='current_pass' style="border-radius:10px;" class='form-control'  required></td>
        </tr>
        <tr>
            <td style="padding:15px;">Enter New Password </td>
            <td><input type='password' name='update_pass' style="border-radius:10px;" class='form-control'  required></td>
        </tr>
        <tr>
            <td style="padding:15px;">Re-Enter New Password </td>
            <td><input type='password' name='update_pass1' style="border-radius:10px;" class='form-control'  required></td>
        </tr>




    </table>
  </div>

    <button type="submit" class="btn btn-info" style="border-radius:10px;" name="btn-update">
<span class="fa fa-check"></span>  Apply changes
</button>
<a href="profile.php" class="btn btn-success" style="border-radius:10px; background-color:#BF3944; border:#BF3944;"><i class="fa fa-ban"></i> &nbsp;Cancel</a>

</form>


</div>
<?php include 'templates/foot.php';?></div>
<script src="templates/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="templates/js/bootstrap.min.js"></script>
</body>
</html>
