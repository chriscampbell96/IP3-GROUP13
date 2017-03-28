<?php
session_start();
include_once 'config.php';

require_once 'class.user.php';

$editDoc = new USER();

if(!$editDoc->is_logged_in())
{
 $user_home->redirect('login.php');
}

if ($_SESSION['userRole'] !== ('Admin'))
{
   $user_home->redirect('dashboard.php');
}

if(isset($_POST['btn-update']))
{
 $id = $_GET['edit_id'];
 $dname = $_POST['docTitle'];
 $ddesc = $_POST['docDesc'];

 if($editDoc->updateDoc($id,$dname,$ddesc))
 {
  $msg = "<div class='alert alert-info'>
    <strong>Success!</strong> Record was updated <a href='mydocuments.php'>HOME</a>!
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

      <a href="mydocuments.php" class="btn btn-info" style="border-radius:10px; margin-bottom:10px;"><i class="fa fa-book"></i> &nbsp;Back to My Documents</a>

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
   echo ' <button class="btn btn-info" style="border-radius:10px; margin-top:9px;"><i class="fa fa-fw fa-check" name"btn-activate"></i>Activate</button>';

    }else{
      echo '  <button class="btn btn-default" style="margin-top:10px; margin-bottom:10px; border-radius:10px;"><i class="fa fa-fw fa-file-o"></i>  Draft</button>';
    } ?>

   <button class="btn" style="background-color:#BF3944; color:white; margin-top:10px; margin-bottom:10px; border-radius:10px;"><a href="deleteDoc.php?delete_id=<?php print($row['docID']); ?>" style="color:white"><i class="fa fa-fw fa-trash-o"></i> Delete</a></button>



</form>


</div>
<?php include 'templates/foot.php';?></div>
<script src="templates/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="templates/js/bootstrap.min.js"></script>
</body>
</html>
