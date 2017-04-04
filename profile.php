<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();



if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}

// if ($_SESSION['userRole'] !== ('Admin'))
// {
//    $user_home->redirect('dashboard.php');
// }

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//testing login...


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">
    <link href="templates/homepagejoin.css" rel="stylesheet">

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
                                             <i class="fa fa-user"></i> Profile
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <!-- /.row -->

        <div class="details">

        <div class="boxes" style="text-align: center;">

             <div class="box" style="border:1pt solid #D3D3D3; padding:10px; border-radius:10px; margin-bottom:10px;">
              First Name:  <?php echo $_SESSION['userFirstName']; ?>
              </div>
              <div class="box" style="border:1pt solid #D3D3D3; padding:10px; border-radius:10px; margin-bottom:10px;">
                Last Name: <?php echo $_SESSION['userSurname']; ?>
               </div>
               <div class="box" style="border:1pt solid #D3D3D3; padding:10px; border-radius:10px; margin-bottom:10px;">
                  Username: <?php echo $_SESSION['userName']; ?>
                </div>
              <div class="box" style="border:1pt solid #D3D3D3; padding:10px; border-radius:10px; margin-bottom:10px;">
                  Email: <?php echo $_SESSION['userEmail']; ?>
               </div>
               <div class="box" style="border:1pt solid #D3D3D3; padding:10px; border-radius:10px; margin-bottom:10px;">
                   Role: <?php echo $_SESSION['userRole']; ?>
                </div>

          <button class="btn btn-info" style="width: 49%; margin-top: 10px; border-radius:10px;"><i class="fa fa-fw fa-unlock-alt"></i><a href ="resetpass.php?edit_id=<?php echo $_SESSION['userSession'] ?>" style="color:white;"> Change Password</a></button>
         <button data-toggle="modal" data-target="#myModalTwo" class="btn btn-info" style="width: 49%;  margin-top: 10px; border-radius:10px;"><i class="fa fa-fw fa-at"></i> Change Email</button>
        </div>
            </div>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="exampleModalLabel">Change Password</h4>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="recipient-name" class="control-label">Enter Old Password: </label>
                                  <input type="password" class="form-control" id="recipient-name" style="border-radius:10px;" required />
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="control-label">Enter New Password: </label>
                                  <input type="password" class="form-control" id="recipient-name" style="border-radius:10px;" required />
                                </div>

                                <div class="form-group">
                                  <label for="recipient-name" class="control-label">Re-Enter New Password: </label>
                                  <input type="password" class="form-control" id="recipient-name" style="border-radius:10px;" required />
                                </div>

                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"style="border-radius:10px;">Close</button>
                              <button type="button" class="btn btn-info" style="border-radius:10px;">Save</button>
                            </div>
                          </div>
                          </div>
                          </div>

                          <!-- Modal -->
                          <div class="modal fade" id="myModalTwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="exampleModalLabel">Change Email Address</h4>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="recipient-name" class="control-label">Enter Old Email Address: </label>
                                  <input type="text" class="form-control" id="recipient-name" style="border-radius:10px;">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="control-label">Enter New Email Address: </label>
                                  <input type="text" class="form-control" id="recipient-name" style="border-radius:10px;">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="control-label">Re-Enter New Email Address: </label>
                                  <input type="text" class="form-control" id="recipient-name" style="border-radius:10px;">
                                </div>

                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:10px;">Close</button>
                              <button type="button" class="btn btn-info" style="border-radius:10px;">Save</button>
                            </div>



</div>
</div>
</div>
<?php include 'templates/foot.php';?>
</div>
</div>


    <!-- jQuery -->
    <script src="templates/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="templates/js/bootstrap.min.js"></script>

  </body>
</html>
