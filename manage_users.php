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
   $fname = trim($_POST['txt_fname']);
   $lname = trim($_POST['txt_lname']);
   $uname = trim($_POST['txt_uname']);
   $uemail = trim($_POST['txt_email']);
   $upass = trim($_POST['txt_upass']);
   $role = trim($_POST['txt_role']);
   if($fname=="") {
      $error[] = "provide first name !";
   }
   if($lname=="") {
      $error[] = "provide last name !";
   }
   if($uname=="") {
      $error[] = "provide username !";
   }
   else if($umail=="") {
      $error[] = "provide email id !";
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($upass=="") {
      $error[] = "provide password !";
   }
   else if(strlen($upass) < 6){
      $error[] = "Password must be atleast 6 characters";
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT userName,userEmail FROM tbl_users WHERE userName=:uname OR userEmail=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);

         if($row['userName']==$uname) {
            $error[] = "sorry username already taken !";
         }
         else if($row['userEmail']==$umail) {
            $error[] = "sorry email address already taken. You acoutn may already be active!";
         }
         else
         {
            if($user->register($fname,$lname,$uname,$umail,$upass))
            {
                $user->redirect('sign-up.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  }
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Manage Users</title>


    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/home.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="templates/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  </head>
  <body>
    <?php include("templates/header.php"); ?>
    <?php include("templates/sidebar.php"); ?>
<div id="page-wrapper">

  <div class="container-fluid">
    <h1>User Management</h1>

    <!-- SIMPLE PAGE BREADCRUMB-->
    <ul class="breadcrumb">
      <li><a href="dashboard.php">Dashboard</a></li>
      <li class="active">Manage Users</li>
    </ul>
    <!--END BREAD CRUMB-->

    <?php
      if(isset($error))
      {
         foreach($error as $error)
         {
            ?>
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error;
      ?>
      <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; User successfully registered <a href=''></a>
                 </div>
                 <?php
            }
            ?>


      <p></p>
      <form action="user_register.php">
        <button type="submit" name="Create New user" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Create User</button>

      </form>
      <!--FUZZY SEARCH FEATURE-->

      <br>

    <!-- Viewing users.. -->
    <table class="table table-striped table-bordered">

    <thead>
        <tr>

        <th>UserID</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Actions</th>
        </tr>
    </thead>
    <?php
          //DB CONNECTION
          $database = new Database();
          $db = $database->dbConnection();
          $conn = $db;


                  $query = "SELECT * FROM tbl_users";
                  $stmt = $conn->prepare($query);
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <tr>

                    <td><?php echo $row['userID']?></td>
                    <td><?php echo $row['userName']?></td>
                    <td><?php echo $row['userFirstName']."&nbsp;".$row['userSurname']; ?></td>
                    <td><?php echo $row['userEmail']?></td>
                    <td><?php echo $row['userRole']?></td>
                    <td><?php echo $row['userStatus']?></td>

                  <td>

                    <?php if($row['userStatus'] == ('N')){
                   echo '  <button class="btn btn-info"><i class="glyphicon glyphicon-ok"></i> Activate</button>';

                    }else{
                      echo '  <button class="btn btn-default"><i class="glyphicon glyphicon-eye-close"></i> Archive</button>';
                    } ?>
                    <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['userID']; ?>" id="getUser" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</button>

                  </td>
                </tr>

                  <?php
                }
             ?>


       </tbody>
    </table>

    <tbody>

</div>
</div>  



      <!-- jQuery -->
      <script src="templates/js/jquery.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="templates/js/bootstrap.min.js"></script>

      <!-- Morris Charts JavaScript -->
      <script src="templates/js/plugins/morris/raphael.min.js"></script>
      <script src="templates/js/plugins/morris/morris.min.js"></script>
      <script src="templates/js/plugins/morris/morris-data.js"></script>

  </body>
</html>
