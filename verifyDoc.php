<?php
session_start();

include_once 'config.php';

require_once 'class.user.php';

 $user_home = new USER();

if(!$user_home->is_logged_in())
{
  $user_home->redirect('login.php');
}

if ($_SESSION['userRole'] !== ('Distributee'))
{
   $user_home->redirect('dashboard.php');
}

if(isset($_GET['document_id']))
{
 $did = $_GET['document_id'];
 extract($user_home->getDocID($did));
}

if(isset($_POST['btn-verify']))
{
  try
  {
    $database = new Database();
    $db = $database->dbConnection();
    $conn = $db;
    $id = $_GET['document_id'];
   $stmt=$conn->prepare("UPDATE tbl_documents SET docVerify='Verified'
             WHERE docID=$id ");
   $stmt->bindparam("docVerify",$docVerify);
   $stmt->bindparam(":id",$id);
   $stmt->execute();
   $user_home->redirect('view_documents.php?success');
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   return false;
  }
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Verify Document</title>


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
      <?php if ($_SESSION['userRole'] == ('Distributee'))
        {
          include 'templates/sidebar-dis.php';
        }
        else {
          include 'templates/sidebar.php';
        }
        ?>
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
                      <i class="fa fa-check-circle"></i> Verify Document
                  </li>
              </ol>
          </div>
      </div>
      <!-- /.row -->

 <?php
 if(isset($_GET['deleted']))
 {
  ?>
        <div class="alert alert-success">
     <strong>Success!</strong> Doument was verified.
  </div>
        <?php
 }
 else
 {
  ?>
        <div class="alert alert-danger">
     <strong>Warning!</strong> If document is verified then no more revisions can be made.
  </div>
        <?php
 }
 ?>

 <form method="post">

   <div class="table-responsive">
<table class='table table-bordered'>

    <tr>
        <td>First Name</td>
        <td><input type='text' name='first_name' style="border-radius:10px;" class='form-control' value="<?php echo $docID; ?>" disabled></td>
    </tr>

    <tr>
        <td>Last Name</td>
        <td><input type='text' name='last_name' style="border-radius:10px;" class='form-control' value="<?php echo $docTitle; ?>" disabled></td>
    </tr>

    <tr>
        <td>User Name</td>
        <td><input type='text' name='uname' class='form-control' style="border-radius:10px;" value="<?php echo $docDesc; ?>" disabled></td>
    </tr>

    <tr>
        <td>Your E-mail ID</td>
        <td><input type='text' name='userEmail' style="border-radius:10px;" class='form-control' value="<?php echo $docLastChange; ?>" disabled></td>
    </tr>
    <tr>
        <td>User Status</td>
        <td><input type='text' name='userStatus' style="border-radius:10px;" class='form-control' value="<?php echo $docStatus; ?>" disabled></td>
    </tr>
    <tr>
        <td>User Status</td>
        <td><input type='text' name='userStatus' style="border-radius:10px;" class='form-control' value="<?php echo $docVerify; ?>" disabled></td>
    </tr>
    <tr>
        <td>User Status</td>
        <td><input type='text' name='userStatus' style="border-radius:10px;" class='form-control' value="<?php echo $docVerifiedBy; ?>" disabled></td>
    </tr>




</table>
</div>
         </table>
         <a href="manage_users.php" class="btn btn-info"><i class="fa fa-arrow-left"></i> &nbsp; Back to Users</a>
        

           <button type="submit" class="btn btn-info"  style="color:white color:white; margin-top:10px; margin-bottom:10px; border-radius:10px;" name="btn-verify"><i class="fa fa-check-circle"></i> Verify</button>
           <button type="submit" class="btn btn-default" style="border-radius:10px;" name="btn-draft"><i class="fa fa-fw fa-archive"></i> Draft</button>
         </form>







<p>

</p>


</div>
<?php include 'templates/foot.php';?></div>
</div>
<script src="templates/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="templates/js/bootstrap.min.js"></script>
</body>
</html>
