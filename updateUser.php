<?php
include_once "config.php";

include_once "class.user.php";

$userE = new USER();

if(isset($_GET['id']))
{
  $userId = $_GET['id'];

  $edit = $userE->editUser($userId);
}

if(isset($_POST['update']))
{
  $fname = trim($_POST['fname']);
  $lname = trim($_POST['lname']);
  $uname = trim($_POST['uname']);
  $email = trim($_POST['email']);
  $upass = trim($_POST['upass']);

  if($fname == "" && $lname == "" && $uname == "" && $email == "" && $upass == "")
  {
    header("location:manage_users.php?blank");
  }
  else {
    if($userE->updateUser($fname, $lname, $uname, $email, $upass))
    {
      header("location:manage_users.php");
    }
  }
  }
?>
