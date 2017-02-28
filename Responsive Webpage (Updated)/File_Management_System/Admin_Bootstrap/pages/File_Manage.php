<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> File Management </title>



    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><img class="card-img-top" src="images/logo.jpg" width="250px" alt="Ideagen Logo" align="top"  ></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Current Users name</strong>
                                    <span class="pull-right text-muted">
                                        <em>(Day message was sent)</em>
                                    </span>
                                </div>
                                <div>Message to specific client</div>
                            </a>
                        </li>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->

                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html" ><i class="fa fa-sign-out fa-fw" style= "color: #2D6FFF"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>

                        </li>
                          <li>
                              <a href="Home_Page2.php" style= "color: #2D6FFF"><i class="glyphicon glyphicon-home" ></i> Home</a>
                          </li>

                        <li>
                            <a href="File_Manage.php" style= "color: #2D6FFF"><i class="glyphicon glyphicon-file"></i> File Management </a>
                        </li>

                        <li>
                            <a href="User_Manage.php" style= "color: #2D6FFF"><span class="glyphicon glyphicon-user"></span> User Management</a>
                        </li>
                        <li>
                            <a href="login.php" style= "color: #2D6FFF"><i class="glyphicon glyphicon-log-in"></i> Login </a>
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align:center;">File Management Options</h1>
                </div>
                <!-- /.col-lg-12 -->
              </div>
            <!-- /.row -->

            <table align="center">
              <tr>
                <th>
                  <div class="card" style="width: 30rem; height: 40rem;  padding-right: 10rem;">
                    <img class="card-img-top" src="images/CreateDoc.jpg" width="120%" height="60%" alt="Create Document Icon" >
                    <div class="card-block">
                      <h4 class="card-title" style="text-indent: 1em; text-align: center;">Create Document</h4>
                      <p style=" text-indent: 1em; text-align: center;">  Click on the button below to create a document </p>
                      <table align="center">
                        <tr>
                          <th>
                            <a href="#" class="btn btn-primary" align="middle"> Click here </a>
                          </th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </th>

                <th>
                  <div class="card" style="width: 30rem; height: 40rem;  padding-left: 10rem;">
                    <img class="card-img-top" src="images/ActivateDoc.png" width="150%" height-"90%" alt="Activate Document Icon">
                    <div class="card-block">
                      <p style ="color: white;">... </p>
                      <h4 class="card-title" style="text-indent: 1em; text-align: center;"> Activate Document </h4>
                      <p class="card-text" style=" text-indent: 1em; text-align: center;"> Click on the button below to activate the document </p>
                      <table align="center">
                        <tr>
                          <th>
                            <a href="#" class="btn btn-primary"> Click here </a>
                          </th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </th>
              </tr>

              <tr>
                <th>
                    <p style ="color: white;">... </p>
                      <p style ="color: white;">... </p>
                        <p style ="color: white;">... </p>
                </th>
              </tr>

              <tr>
                <th>
                  <div class="card" style="width: 30rem; height: 40rem;  padding-right: 10rem;">
                    <img class="card-img-top" src="images/EditDoc.jpg" width="110%" height="55%" alt="Edit Document Icon">
                    <div class="card-block">
                      <h4 class="card-title" style="text-indent: 1em; text-align: center;"> Edit Document</h4>
                      <p class="card-text" style="text-indent: 1em; text-align: center;"> Click on the button below to edit the document </p>
                      <table align="center">
                        <tr>
                          <th>
                            <a href="#" class="btn btn-primary"> Click here </a>
                          </th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </th>

                <th>
                  <div class="card" style="width: 30rem; height: 40rem;  padding-left: 10rem;">
                    <img class="card-img-top" src="images/NotifyAll.png" width="130%" height="57%" alt="Notify All icon">
                    <div class="card-block">
                      <h4 class="card-title" style="text-indent: 1em; text-align: center;"> Notify All Distributees</h4>
                      <p class="card-text" style="text-indent: 1em; text-align: center;"> Click on the button below to notify all distributees </p>
                      <table align="center">
                        <tr>
                          <th>
                            <a href="#" class="btn btn-primary"> Click here </a>
                          </th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </th>
              </tr>

            </table>


            <div class="fb-like" data-href="https://www.facebook.com/DocManSys/" data-width="100px" data-layout="standard" data-action="like"
            data-size="large" data-show-faces="true" data-share="true"></div>

            <p style="color:white;"> .... </p>





    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



</body>

</html>
