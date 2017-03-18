
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="sidebar.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>

<body>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background-color:#38474E">

<div class="head-container">

<h4 class="header" style="color:white"><?php echo $_SESSION['userEmail'] ?></h4>

</div>

<div class="container-header" style="background-color:#76858D;">
</div>

<div class="progress" style="background-color:#38474E">
  <div class="progress-bar" role="progressbar" style="width: 33.333%; background-color:#BF3944; height:5px" aria-valuenow="33.333" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar" role="progressbar" style="width: 33.333%; background-color:#BF691E; height:5px" aria-valuenow="33.333" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar" role="progressbar" style="background-color:#8C9AA1; width: 33.333%; height:5px"aria-valuenow="33.333" aria-valuemin="0" aria-valuemax="100"></div>
</div>

                    <li class="active">
                        <a href="dashboardAdmin.php" style="color:white"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="mydocuments.php" style="color:white"><i class="fa fa-fw fa-book"></i> My Documents</a>
                    </li>
                    <li>
                        <a href="createdocument.php" style="color:white"><i class="fa fa-fw fa-file-text-o"></i> Create Document</a>
                    </li>
                    <li>
                        <a href="upload_document.php" style="color:white"><i class="fa fa-fw fa-upload"></i> Upload Document</a>
                    </li>
                    <li>
                        <a href="view_documents.php" style="color:white"><i class="fa fa-fw fa-share-alt"></i> Shared Documents</a>
                    </li>
                    <li>
                        <a href="#" style="color:white"><i class="fa fa-fw fa-envelope-o"></i> Send Documents</a>
                    </li>
                    <li>
                        <a href="#" style="color:white"><i class="fa fa-fw fa-bell-o"></i> Notifications</a>
                    </li>
                    <li>
                        <a href="#" style="color:white"><i class="fa fa-fw fa-pencil"></i> Revisions</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
