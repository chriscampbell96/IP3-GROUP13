<?php
session_start();
include_once 'config.php';

require_once 'class.user.php';

$user_home = new USER();

$user_home->redirect('login.php');


?>
