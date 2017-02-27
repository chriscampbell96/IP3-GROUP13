<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
     <form action="logout.php">
       <input type="submit" value="logout" />
     </form>
    <h1>User Management</h1>
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


    <div class="container">
      <p></p>
      <form action="user_register.php">
        <input type="submit" value="Register New User" />
      </form>
        <!-- Modal
        <button class="btn btn-primary" data-toggle="user_register.php" data-target="user_register.php">Create New User</button>

            <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addUserLabel">Create New User</h4>
                  </div>
                  <form>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="txt_fname" placeholder="Enter first name"/>
                          </div>
                      <div class="form-group">
                        <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="txt_lname" placeholder="Enter last name"/>
                          </div>
                      <div class="form-group">
                        <label for="email">Username</label>
                          <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />                      </div>
                      <div class="form-group">
                        <label for="username">Email</label>
                          <input type="text" class="form-control" name="txt_email" placeholder="Enter email address" value="<?php if(isset($error)){echo $email;}?>" />                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                            <input type="text" class="form-control" name="txt_upass" placeholder="Enter Password" />
                        </div>


                      <div class="form-group">
                        <label for="role">Role</label>
                            <input type="text" class="form-control" name="txt_role" placeholder="Enter User role" />
                          </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Activate User Now?
                        </label>
                      </div>

                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
                        <i class="glyphicon glyphicon-open-file"></i>&nbsp;Create User
                    </button>

                  </form>

                  </div>
                </form>
                </div>
              </div>
            </div>
      <p></p>
    </div>
-->
    <!-- Viewing users.. -->
    <table class="table table-striped table-bordered">

    <thead>
        <tr>
        <th>Full Name</th>
        <th>View Profile</th>
        </tr>
    </thead>

    <tbody>


   </tbody>
</table>
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
        <td><?php echo $row['userFirstName']."&nbsp;".$row['userSurname']; ?><br></td>
        <td>
          <!-- ADDING VIEW USER BUTTON TO CHANGE -->

        <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['user_id']; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
        </td>
        </tr>
        <?php
      }
   ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
