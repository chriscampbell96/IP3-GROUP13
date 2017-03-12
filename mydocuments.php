<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();



if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Documents</title>


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

        <div class="container">
     <form action="logout.php">
       <input type="submit" value="logout" />
     </form>
    <h1>My Documents</h1>

    <!-- SIMPLE PAGE BREADCRUMB-->
    <ul class="breadcrumb">
      <li><a href="dashboard.php">Dashboard</a></li>
      <li class="active">Shared Documents</li>
    </ul>
    <!--END BREAD CRUMB-->




      <p></p>

    <!-- Viewing users.. -->
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search My Documents">
        </div>
      </form>

    <thead>
        <tr>

        <th>Document ID</th>
        <th>Doument Title</th>
        <th>Document Description</th>
        <th>Last Changed</th>
        <th>Document File</th>
        <th>Document Status</th>
        <th>Actions</th>
        </tr>
    </thead>
    <?php
          //DB CONNECTION
          $database = new Database();
          $db = $database->dbConnection();
          $conn = $db;

                  $query = "SELECT * FROM tbl_documents";
                  $stmt = $conn->prepare($query);
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <tr>

                    <td><?php echo $row['docID']?></td>
                    <td><?php echo $row['docTitle']?></td>
                    <td><?php echo $row['docDesc']?></td>
                    <td><?php echo $row['docLastChange']?></td>
                    <td><?php echo $row['docFile']?></td>
                    <td><?php echo $row['docStatus']?></td>


                  <td>
 <?php if($row['docStatus'] == ('Draft')){
echo '  <button class="btn btn-sm btn-info"><i class="glyphicon glyphicon-ok"></i> Activate</button>';

 }else{
   echo '  <button class="btn btn-default"><i class="glyphicon glyphicon-eye-close"></i> Draft</button>';
 } ?>

<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</button>

                  </td>
                </tr>

                  <?php
                }
             ?>


       </tbody>
    </table>
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    <tbody>


</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Document</h4>
      </div>
      <div class="modal-body">
        <form>
              <div class="form-group" enctype="multipart/form-data">
                  <label for="exampleInputEmail1">Document Title</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Document Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3"  placeholder="Document Description"></textarea>
                </div>
                <div class="form-group">
                  <label for="uploa">File input</label>
                  <input type="file" id="upload">
                  <p class="help-block">Browse Computer</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Publish Document
                  </label>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn-upload" method="post">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
