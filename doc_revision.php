<?php
session_start();

include_once 'config.php';

require_once 'class.user.php';
$user_home = new USER();
$deldoc = new USER();

if(!$deldoc->is_logged_in())
{
 $deldoc->redirect('login.php');
}


if(isset($_POST['btn-del']))
{
 $id = $_GET['delete_id'];
 $deldoc->delete_doc($docId);
 header("Location: deleteDoc.php?deleted");
}

if(isset($_POST['btn-upload']))
{
   $revTitle = trim($_POST['txtrevTitle']);
   $revDesc = trim($_POST['txtrevDesc']);
   $file = rand(1000,100000)."-".$_FILES['file']['name'];
   $file_loc = $_FILES['file']['tmp_name'];
   $file_size = $_FILES['file']['size'];
   $file_type = $_FILES['file']['type'];
   $folder="revisions/";
   $docID = trim($_GET['delete_id']);
   $userID = trim($_SESSION['userSession']);

   // new file size in KB
 $new_size = $file_size/1024;
 // new file size in KB

 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 $fleExt = strtolower(pathinfo($file,PATHINFO_EXTENSION)); // get file extension
  $valid_extensions = array('doc', 'docx', 'pdf', 'txt');


 $final_file=str_replace(' ','-',$new_file_name);

 if(in_array($fleExt, $valid_extensions)){

   if(move_uploaded_file($file_loc,$folder.$final_file)){

    if($user_home->create_rev($revTitle,$revDesc,$file,$file_type,$new_size,$docID,$userID))
    {
      $user_home->redirect('view_documents.php');
      header("Location: view_documents.php?success");


    }
    else{
     echo "sorry , Query could no execute...";

   }
  }
}else{

  header("Location: doc_revision.php?invalidfile");

}
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
                                <small></small>
                              </h1>
                              <ol class="breadcrumb">
                                  <li class="active">
                                      <i class="fa fa-pencil"></i> Revisions
                                  </li>
                              </ol>
                          </div>
                      </div>
                      <!-- /.row -->


 <?php
 if(isset($_GET['success']))
 {
  ?>
        <div class="alert alert-success">
     <strong>Success!</strong> document was revised...
  </div>
        <?php
 }
 ?>
 <?php
 if(isset($_GET['invalidfile']))
 {
  ?>
  <div class="alert alert-danger">
<strong>Invalid File!</strong> Please Make sure your document is of the following formats: '.doc', '.docx', '.pdf', '.txt'.
</div>
<?php
}
?>
 <h3>Original Document</h3>


  <?php
  if(isset($_GET['delete_id']))
  {
   ?>
      <div class="table-responsive">
         <table class='table table-bordered'>
         <tr>
           <th>Document ID</th>
           <th>Doument Title</th>
           <th>Document Description</th>
           <th>Last Changed</th>
           <th>Document File</th>
           <th>Document Status</th>

         </tr>
         <?php

         $database = new Database();
         $db = $database->dbConnection();
         $conn = $db;

         $stmt =  $db->prepare("SELECT * FROM tbl_documents WHERE docId=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
               <td><?php echo $row['docID']?></td>
               <td><?php echo $row['docTitle']?></td>
               <td><?php echo $row['docDesc']?></td>
               <td><?php echo $row['docLastChange']?></td>
               <td><?php echo $row['docFile']?></td>
               <td><?php echo $row['docStatus']?></td>
             </tr>
             <?php
         }
         ?>
         </table>
       </div>
         <?php
  }
  ?>
<hr>
  <h3>Upload Revised Document</h3>

  <body id="login">
    <div class="form-group">
    <?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post" enctype="multipart/form-data">

       <input type="docTitle" class="input-block-level" style="border-radius:10px; width:100%; margin-bottom:10px; padding:10px;" placeholder="Document Title" name="txtrevTitle" required />

        <!-- <input type="docDesc" class="input-block-level" rows="3" style="border-radius:10px; width:100%; padding:10px; margin-bottom:10px;" placeholder="Document Description" name="txtdocDesc" required /> -->

        <textarea type="docDesc" class="input-block-level" rows="3" style="border-radius:10px; width:100%; padding:10px; margin-bottom:10px;" placeholder="Please describe your revision" name="txtrevDesc" required></textarea>

            <input type="file" name="file" required/>
<br>
        <button class="btn btn-info" style="border-radius:10px" type="submit" name="btn-upload"><i class="fa fa-upload"></i> Upload</button>
        <a href="view_documents.php" style="border-radius:10px;" class="btn btn-success"><i class="fa fa-undo"></i> &nbsp; Cancel</a>

      </form>
</div>


<p>
<?php
if(isset($_GET['delete_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['docID']; ?>" />
    </form>
 <?php
}
else
{
 ?>
    <a href="mydocuments.php" class="btn btn-info"><i class="fa fa-arrow-left" style="border-radius:10px;"></i> &nbsp; Back to index</a>
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
