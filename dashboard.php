<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();



if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//testing login...
echo "WELCOME: ";
echo $_SESSION['userEmail'];
echo " Your UserID is: ";
echo $_SESSION['userSession'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>dashboard</title>
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
  </body>
</html>
