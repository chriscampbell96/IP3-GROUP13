<?php
session_start();
include_once 'config.php';

require_once 'class.user.php';

$editDoc = new USER();

if(!$editDoc->is_logged_in())
{
 $user_home->redirect('login.php');
}



if(isset($_POST['btn-update']))
{
 $id = $_GET['edit_id'];
 $dname = $_POST['docTitle'];
 $ddesc = $_POST['docDesc'];

 if($editDoc->updateDoc($id,$dname,$ddesc))
 {
  $msg = "<div class='alert alert-info'>
    <strong>Success!</strong> Record was updated!
    </div>";
 }
 else
 {
  $msg = "<div class='alert alert-warning'>
    <strong>Error!</strong> Somthing went wrong!
    </div>";
 }
}

if(isset($_GET['edit_id']))
{
 $id = $_GET['edit_id'];
 extract($editDoc->getdID($id));
}

if(isset($_POST['btn-activate']))
{
  try
  {
    $database = new Database();
    $db = $database->dbConnection();
    $conn = $db;

    $stmt=$conn->prepare("UPDATE tbl_documents SET docStatus='Active'
              WHERE docID=$id ");
    $stmt->bindparam("docStatus",$docStatus);
    $stmt->bindparam(":id",$id);
    $stmt->execute();
    $editDoc->redirect('mydocuments.php?published');
    return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   return false;
  }
  }

  if(isset($_POST['btn-draft']))
  {
    try
    {
      $database = new Database();
      $db = $database->dbConnection();
      $conn = $db;

     $stmt=$conn->prepare("UPDATE tbl_documents SET docStatus='Draft'
               WHERE docID=$id ");
     $stmt->bindparam("docStatus",$docStatus);
     $stmt->bindparam(":id",$id);
     $stmt->execute();
     $editDoc->redirect('mydocuments.php?draft');
     return true;
    }
    catch(PDOException $e)
    {
     echo $e->getMessage();
     return false;
    }
    }
    //
    // if(isset($_POST['btn-revActivate']))
    // {
    //   try
    //   {
    //     $database = new Database();
    //     $db = $database->dbConnection();
    //     $conn = $db;
    //
    //     $stmt=$conn->prepare("UPDATE tbl_revisions SET revStatus='Active'
    //               WHERE revID=$rid AND UPDATE tbl_documents SET docStatus='Draft'
    //                         WHERE docID=$id ");
    //     $stmt->bindparam("docStatus",$docStatus);
    //     $stmt->bindparam(":id",$id);
    //     $stmt->execute();
    //     $editDoc->redirect('mydocuments.php?published');
    //     return true;
    //   }
    //   catch(PDOException $e)
    //   {
    //    echo $e->getMessage();
    //    return false;
    //   }
    //   }

      // if(isset($_POST['btn-revDraft']))
      // {
      //   try
      //   {
      //     $database = new Database();
      //     $db = $database->dbConnection();
      //     $conn = $db;
      //
      //     $stmt=$conn->prepare("UPDATE tbl_revisions SET revStatus='Draft'
      //               WHERE revID=$rid AND UPDATE tbl_documents SET docStatus='Active'
      //                         WHERE docID=$id ");
      //     $stmt->bindparam("revStatus",$revStatus);
      //     $stmt->bindparam(":id",$rid);
      //     $stmt->bindparam("docStatus",$docStatus);
      //     $stmt->bindparam(":id",$id);
      //     $stmt->execute();
      //     $editDoc->redirect('mydocuments.php?published');
      //     return true;
      //   }
      //   catch(PDOException $e)
      //   {
      //    echo $e->getMessage();
      //    return false;
      //   }
      //   }

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
                      <i class="fa fa-pencil"></i> Edit Document
                  </li>
              </ol>
          </div>
      </div>

      <a href="mydocuments.php" class="btn btn-info" style="border-radius:10px; margin-bottom:20px;"><i class="fa fa-arrow-left"></i> &nbsp;Back to My Documents</a>

<?php
if(isset($msg))
{
 echo $msg;
}
?>



     <form method='post'>


       <div class="table-responsive">
    <table class='table table-bordered'>

        <tr>
            <td>Document Title</td>
            <td><input type='text' name='docTitle' style="border-radius:10px;" class='form-control' value="<?php echo $docTitle; ?>" required></td>
        </tr>

        <tr>
            <td>Document Desc</td>
            <td><input type='text' name='docDesc' style="border-radius:10px;" class='form-control' value="<?php echo $docDesc; ?>" required></td>
        </tr>
        <tr>
            <td>Document Status</td>
            <td><input type='text' name='docStatus' style="border-radius:10px;" class='form-control' value="<?php echo $docStatus; ?>" disabled></td>
        </tr>




    </table>
  </div>

    <button type="submit" class="btn btn-info" style="border-radius:10px;" name="btn-update">
<span class="fa fa-check"></span>  Update
</button>

    <?php if($docStatus == ('Draft')){
   echo ' <button type="submit" class="btn" style="border-radius:10px; background-color:#f05133; color:white" name="btn-activate"><i class="fa fa-fw fa-toggle-right"></i> Activate</button>';

    }else{
      echo '  <button type="submit" class="btn btn-default" style="border-radius:10px;" name="btn-draft"><i class="fa fa-fw fa-archive"></i> Draft</button>';
    } ?>

   <button class="btn" style="background-color:#BF3944; color:white; margin-top:10px; margin-bottom:10px; border-radius:10px;"><a href="deleteDoc.php?delete_id=<?php print($docID); ?>" style="color:white"><i class="fa fa-fw fa-trash-o"></i> Delete</a></button>

</form>
<hr>
<div class="table-responsive">
   <table class='table table-bordered'>
   <tr>
     <th>Revision ID</th>
     <th>Revision Title</th>
     <th>Revision Description</th>
     <th>File</th>
     <th>Revision Status</th>
     <th>Actions</th>

   </tr>
   <?php

   $database = new Database();
   $db = $database->dbConnection();
   $conn = $db;

   $stmt =  $db->prepare("SELECT * FROM tbl_revisions WHERE docID=:id");
   $stmt->execute(array(":id"=>$_GET['edit_id']));
   while($row=$stmt->fetch(PDO::FETCH_BOTH))
   {
  $revStatus =  $row['revStatus'];
  $rid =  $row['revID'];


       ?>
       <tr>
         <td><?php echo $row['revID']?></td>
         <td><?php echo $row['revTitle']?></td>
         <td><?php echo $row['revDesc']?></td>
         <td><?php echo $row['revFile']?></td>
         <td><?php echo $row['revStatus']?></td>
         <td>
           <button class="btn" style="background-color:#BF3944; color:white; margin-top:10px; margin-bottom:10px; border-radius:10px;"><a href="activaterevision.php?revision_id=<?php print($rid); ?>" style="color:white"><i class="fa fa-fw fa-trash-o"></i> Activate Revision</a></button>

            <?php
             if($revStatus == ('Draft')){
           echo ' <button type="submit" class="btn" style="border-radius:10px; background-color:#f05133; color:white"><a href="activaterevision.php?revision_id=<?php print($rid); ?>" style="color:white"><i class="fa fa-fw fa-toggle-right"></i> Activate Revision</button>';
            }else{
              echo '  <button type="submit" class="btn btn-default" style="border-radius:10px;"><i class="fa fa-fw fa-archive"></i> Draft Revision</button>';
            } ?></td>
       </tr>
       <?php
   }
   ?>
   </table>

 </div>
</div>
<?php include 'templates/foot.php';?></div>
<script src="templates/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="templates/js/bootstrap.min.js"></script>
</body>
</html>
