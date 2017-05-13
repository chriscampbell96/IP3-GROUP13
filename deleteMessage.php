<?php
session_start();

include_once 'config.php';

require_once 'class.user.php';

$deldoc = new USER();

if(!$deldoc->is_logged_in())
{
 $deldoc->redirect('login.php');
}


if(isset($_POST['btn-del']))
{
 $id = $_GET['delete_id'];
 $deldoc->delete_message($msgID, $id);
 header("Location: deleteMessage.php?deleted");
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
                      <i class="fa fa-trash"></i> Delete Message
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
     <strong>Success!</strong> Message was deleted...
  </div>
        <?php
 }
 else
 {
  ?>
        <div class="alert alert-danger">
     <strong>Warning!</strong> Are you sure you want to remove the following Message?
  </div>
        <?php
 }
 ?>


  <?php
  if(isset($_GET['delete_id']))
  {
   ?>
      <div class="table-responsive">
         <table class='table table-bordered'>
         <tr>
           <th>Message ID</th>
           <th>Mesage title</th>
           <th>Message</th>
           <th>Message From</th>
           <th>Attachments</th>
           <th>Message Date</th>


         </tr>
         <?php

         $database = new Database();
         $db = $database->dbConnection();
         $conn = $db;

         $stmt =  $db->prepare("SELECT * FROM tbl_messages WHERE msgID=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
               <td><?php echo $row['msgID']; ?></td>
               <td><?php echo $row['msgTitle']; ?></td>
               <td><?php echo $row['msgEntry']; ?></td>
               <td><?php echo $row['msgFrom']; ?></td>
               <td></td>
              <td><?php echo $row['msgDate']?></td>
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
<?php
if(isset($_GET['delete_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['docID']; ?>" />
    <button class="btn btn-info" style="border-radius:10px;" type="submit" name="btn-del"><i class="fa fa-trash-o"></i> &nbsp; YES</button>
    <a href="mymessages.php" style="border-radius:10px; background-color:#f05133; color:white;" class="btn"><i class="fa fa-undo"></i> &nbsp; NO</a>
    </form>
 <?php
}
else
{
 ?>
    <a href="mymessages.php" class="btn btn-info"><i class="fa fa-arrow-left"></i> &nbsp; Return to messages</a>
    <?php
}
?>
</p>


</div>
<?php include 'templates/foot.php';?></div>
</div>
<script src="templates/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="templates/js/bootstrap.min.js"></script>
</body>
</html>
