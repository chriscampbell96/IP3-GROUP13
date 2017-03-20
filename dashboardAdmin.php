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
    <?php include 'templates/header.php';
    include 'templates/sidebar.php';?>
  </head>

  <body>
    <div id="wrapper">
    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome <small> <?php echo $_SESSION['userEmail'] ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> Home
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="container-big">
        <div class="container-back">
          <!-- Image Header -->
                  <div class="row">
                      <div class="col-lg-12">
                          <img class="img-responsive" src="img/back.jpg" width="1200" height="300" alt="">
                      </div>
                  </div>
        </div>

        <div class="marketing">

                             <div class="col-md-3 col-sm-6">
                                 <div class="panel panel-default text-center">
                                     <div class="panel-heading">
                                         <span class="fa-stack fa-5x">
                                               <i class="fa fa-circle fa-stack-2x text-primary" style="color:#BF3944"></i>
                                               <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                                         </span>
                                     </div>
                                     <div class="panel-body">
                                         <h4>Create</h4>
                                         <p>Create and personalise your own documents. Its super quick and easy to do.</p>
                                         <a href="#" style="background-color:#BF3944; border:1pt solid #BF3944; border-radius: 10px" class="btn btn-primary">Learn More</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-3 col-sm-6">
                                 <div class="panel panel-default text-center">
                                     <div class="panel-heading">
                                         <span class="fa-stack fa-5x">
                                               <i class="fa fa-circle fa-stack-2x text-primary" style="color:#BF3944"></i>
                                               <i class="fa fa-share-alt fa-stack-1x fa-inverse"></i>
                                         </span>
                                     </div>
                                     <div class="panel-body">
                                         <h4>Share</h4>
                                         <p>Once you are happy with your document, share it with your friends and colleagues.</p>
                                         <a href="#" style="background-color:#BF3944; border:1pt solid #BF3944; border-radius: 10px" class="btn btn-primary">Learn More</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-3 col-sm-6">
                                 <div class="panel panel-default text-center">
                                     <div class="panel-heading">
                                         <span class="fa-stack fa-5x">
                                               <i class="fa fa-circle fa-stack-2x text-primary" style="color:#BF3944"></i>
                                               <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                         </span>
                                     </div>
                                     <div class="panel-body">
                                         <h4>View</h4>
                                         <p>View all the documents that you have created easily and make any changes.</p>
                                         <a href="#" style="background-color:#BF3944; border:1pt solid #BF3944; border-radius: 10px" class="btn btn-primary">Learn More</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-3 col-sm-6">
                                 <div class="panel panel-default text-center">
                                     <div class="panel-heading">
                                         <span class="fa-stack fa-5x">
                                               <i class="fa fa-circle fa-stack-2x text-primary" style="color:#BF3944"></i>
                                               <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                         </span>
                                     </div>
                                     <div class="panel-body">
                                         <h4>Delete</h4>
                                         <p>Delete any documents that you are not happy with easily and quickly.</p>
                                         <a href="#" style="background-color:#BF3944; border:1pt solid #BF3944; border-radius: 10px" class="btn btn-primary">Learn More</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
        </div>




        <?php echo "WELCOME: ";
        echo $_SESSION['userEmail'];
        echo " Your UserID is: ";
        echo $_SESSION['userSession'];
        echo "Your role is: ";
        echo $_SESSION['userRole'];?>
    <form action="logout.php">
      <input type="submit" value="logout" />
    </form>
    <br>
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
    <br>
    <form action="#">
      <input type="submit" value="My Notifications" />
    </form>
    <br>
    <form action="#">
      <input type="submit" value="My Revisions" />
    </form>
    <br>
    <form action="createdocument.php">
      <input type="submit" value="Create document online" />
    </form>
  </div>
</div>
</div>
<?php include 'templates/footer.php';?>


    <!-- jQuery -->
    <script src="templates/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="templates/js/bootstrap.min.js"></script>

  </body>
</html>
