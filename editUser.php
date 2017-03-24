<?php
session_start();
include_once 'config.php';

require_once 'class.user.php';

$edituser = new USER();

if(isset($_POST['btn-update']))
{
 $id = $_GET['edit_id'];
 $fname = $_POST['first_name'];
 $lname = $_POST['last_name'];
 $email = $_POST['userEmail'];
 $uname = $_POST['uname'];

 if($edituser->update($id,$fname,$lname,$email,$uname))
 {
  $msg = "<div class='alert alert-info'>
    <strong>WOW!</strong> Record was updated successfully <a href='manage_users.php'>HOME</a>!
    </div>";
 }
 else
 {
  $msg = "<div class='alert alert-warning'>
    <strong>SORRY!</strong> ERROR while updating record !
    </div>";
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



    <title>My Documents</title>


    <!-- Bootstrap -->
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/mydocs.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">



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
                      <i class="fa fa-trash"></i> Edit User
                  </li>
              </ol>
          </div>
      </div>

<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
 echo $msg;
}
?>
</div>

<div class="clearfix"></div><br />

<div class="container">

     <form method='post'>

    <table class='table table-bordered'>

        <tr>
            <td>First Name</td>
            <td><input type='text' name='first_name' class='form-control' value="<?php echo $userFirstName; ?>" required></td>
        </tr>

        <tr>
            <td>Last Name</td>
            <td><input type='text' name='last_name' class='form-control' value="<?php echo $userSurname; ?>" required></td>
        </tr>

        <tr>
            <td>User Name</td>
            <td><input type='text' name='uname' class='form-control' value="<?php echo $userName; ?>" required></td>
        </tr>

        <tr>
            <td>Your E-mail ID</td>
            <td><input type='text' name='userEmail' class='form-control' value="<?php echo $userEmail; ?>" required></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
       <span class="glyphicon glyphicon-edit"></span>  Update this Record
    </button>
                <a href="manage_users.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>

    </table>
</form>


</div>
<?php include 'templates/foot.php';?></div>
<script src="templates/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="templates/js/bootstrap.min.js"></script>
</body>
</html>
