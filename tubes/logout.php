<?php 

session_start();
require 'functions.php';
$_SESSION=[];
session_unset();
session_destroy();

setcookie('email', '', time() - 3600);
setcookie('key', '', time() - 3600);


header("location:index.php");
exit;
 ?>