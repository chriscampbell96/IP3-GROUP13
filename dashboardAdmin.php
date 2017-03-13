<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

include 'templates/header.php';
include 'templates/sidebar.html';

if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}

if ($_SESSION['userRole'] !== ('Admin'))
{
   $user_home->redirect('dashboard.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//testing login...
echo "WELCOME: ";
echo $_SESSION['userEmail'];
echo " Your UserID is: ";
echo $_SESSION['userSession'];
echo "Your role is: ";
echo $_SESSION['userRole'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>dashboard</title>
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

    <form action="logout.php">
      <input type="submit" value="logout" />
    </form>
    <form action="manage_users.php">
      <input type="submit" value="Manage Users" />
    </form>
    <br>
    <form action="mydocuments.php">
      <input type="submit" value="My Documents" />
    </form>
    <br>
    <form action="view_documents.php">
      <input type="submit" value="View shared documents" />
    </form>
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
