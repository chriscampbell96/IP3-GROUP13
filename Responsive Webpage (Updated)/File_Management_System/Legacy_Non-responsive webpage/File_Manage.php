<!DOCTYPE html>
<html>

<?php
 echo "PHP code goes here";
 ?>

<head>

<meta charset="utf-8">

<title> File Management </title>

<link rel = "stylesheet"
   type = "text/css"
   href = "Styles.css" />

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



<div class="container">

<header>
<div id="logo"> <img src="images/logo.jpg" alt="Ideagen Logo"> </div>
   <div class="heading"> <h1>File Management</h1> </div>

</header>

<nav>
  <ul>
    <figure>

     <li><a href="Home_Page.php"> <img src="images/home.png" alt="Home icon" height="80" width="80"> </a></li>
     <figcaption style="padding-bottom:20px;"> Home </figcaption>
     <li><a href="User_Manage.php"> <img src="images/userManage.png" alt="User Management Icon" height="80" width="80"> </a></li>
     <figcaption style="padding:20px;"> User Management </figcaption>
     <li><a href="File_Manage"> <img src="images/file.png" alt="User Management Icon" height="80" width="80"> </a></li>
     <figcaption style="padding:20px;"> File Management </figcaption>
   </figure>
  </ul>
</nav>

<article>

  <table align="center">

    <tr>
      <th> <img src="images/CreateDoc.jpg" alt="Create Document"> </th>
      <th> <img src="images/ActivateDoc.png" alt="Activate Document"> </th>
    </tr>

    <tr>
      <th> <img src="images/EditDoc.png" alt="Edit Document">  </th>
      <th> <img src="images/NotifyAll.png" alt="Notify All Distributees"> </th>
    </tr>


</table>

<div class="fb-like" data-href="https://www.facebook.com/DocManSys/" data-width="100px" data-layout="standard" data-action="like"
data-size="large" data-show-faces="true" data-share="true"></div>

</article>

<footer>Copyright &copy; GroupName@IP3.GCU</footer>

</div>

</body>
</html>
