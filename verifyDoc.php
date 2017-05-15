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




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Delete user</title>


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


  <?php
  if(isset($_GET['document_id']))
  {
   ?>
      <div class="table-responsive">
         <table class='table table-bordered'>
         <tr>
           <th>docID</th>
           <th>docTitle</th>
           <th>docStatus</th>



         </tr>
         <?php

         $database = new Database();
         $db = $database->dbConnection();
         $conn = $db;

         $stmt =  $db->prepare("SELECT * FROM tbl_documents WHERE docID=:id");
         $stmt->execute(array(":id"=>$_GET['document_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
               <td><?php echo $row['docID']; ?></td>
               <td><?php echo $row['docTitle']; ?></td>
               <td><?php echo $row['docStatus']?></td>
               <?php $uid = $row['userID']; ?>

             </tr>
             <?php
         }
         ?>
         </table>
       </div>
         <?php
  }
  ?>



<p>

    <a href="manage_users.php" class="btn btn-info"><i class="fa fa-arrow-left"></i> &nbsp; Back to Users</a>
    <a href="#" class="btn btn-info"><i class="fa fa-check-circle"></i> &nbsp; Verify</a>


</p>

<?php

if(isset($_POST['btn-delUser']))
{
  try
  {
    $database = new Database();
    $db = $database->dbConnection();
    $conn = $db;

    $query=("DELETE FROM tbl_documents WHERE userID=:id ");
    $stmt=$conn->prepare($query);
    $stmt->execute(array(
    ":id" => $uid));
    deluser($uid);
    return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   return false;
 }
}

function deluser($uid)
{
  try
  {
    $database = new Database();
    $db = $database->dbConnection();
    $conn = $db;

    $query=("DELETE FROM tbl_users WHERE userID=:id ");
    $stmt=$conn->prepare($query);
    $stmt->execute(array(
    ":id" => $uid));
    return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   return false;
 }
}

   ?>

</div>
<?php include 'templates/foot.php';?></div>
</div>
<script src="templates/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="templates/js/bootstrap.min.js"></script>
</body>
</html>
