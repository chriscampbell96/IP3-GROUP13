<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ideagen Document Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- link to personal stylesheet -->
    <link rel="stylesheet" href="home.css">


</head>

<body>

    <div id="wrapper">

      <div id="wrapper">

          <!-- Navigation -->
          <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#F3F4F5; padding-bottom: 20px;">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand"><img class="card-img-top" src="img/logo2.jpg" width="250px" alt="Ideagen Logo" align="top" height="40px"></a>
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
                          <li><a href="login.html" style= "color: #2D6FFF"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                          </li>
                      </ul>
                      <!-- /.dropdown-user -->
                  </li>
                  <!-- /.dropdown -->
              </ul>
              <!-- /.navbar-top-links -->

              <!--SIDEBAR CODE STARTS HERE -->

              <div class="navbar-default sidebar" role="navigation" style="background-color: #425259;">
                              <div class="sidebar-nav navbar-collapse" style="position: absolute;">
                                  <ul class="nav" id="side-menu" style="padding: 20px;">
                                      <li class="sidebar-search">
                                          <div class="input-group custom-search-form">
                                              <input type="text" class="form-control" placeholder="Search...">
                                              <span class="input-group-btn">
                                                  <button class="btn btn-default" type="button">
                                                      <i class="fa fa-search"></i>
                                                  </button>
                                              </span>
                                          </div>
                                          <!-- /input-group -->
                                      </li>
                                        <li>
                                            <a href="home.php" style= "color: #FFFFFF; "><i class="glyphicon glyphicon-home" ></i> Home</a>
                                        </li>

                                      <li>
                                          <a href="File_Manage.php" style= "color: #FFFFFF"><i class="glyphicon glyphicon-file"></i> File Management </a>
                                      </li>

                                      <li>
                                          <a href="User_Manage.php" style= "color: #FFFFFF"><span class="glyphicon glyphicon-user"></span> User Management</a>
                                      </li>
                                      <li>
                                          <a href="loginHome.php" style= "color: #FFFFFF"><i class="glyphicon glyphicon-log-in"></i> Login </a>
                                      </li>


                                  </ul>
                              </div>
                              <!-- /.sidebar-collapse -->
                          </div>
                          <!-- /.navbar-static-side -->
                      </nav>

                      <!--SIDEBAR CODE FINISHES HERE -->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <h1>System Description</h1>
                      <p>A simple document management system courtesy of (group name) which satifies two main groups of tasks. </p>
                      <p>Within each group of tasks there are four seperate achieveables:</p>
                      <p> </p>
                      <u> <h4> Manage Files/Documents </h4> </u>
                      <ul>
                        <li> Create document </li>
                        <li> Activate document </li>
                        <li> Revise/edit document </li>
                        <li> Notify all distributees that a document has been activated and avaliable for viewing </li>
                      </ul>
                      <p> </p>
                      <u> <h4> Manage Users </h4> </u>
                      <ul>
                        <li> Create User </li>
                        <li> Edit User </li>
                        <li> Archive User </li>
                        <li> Edit security settings </li>
                      </ul>


                      <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FDocManSys&amp;
                      width=800px&amp; colorscheme=light&amp; show_faces=true&amp; border_color&amp; stream=true&amp; header=true&amp; height=385"
                      scrolling="yes" frameborder="0" style="border:none; overflow:hidden; width:950px; height:420px; background:white; float:left; "
                      allowTransparency="true"> </iframe>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
