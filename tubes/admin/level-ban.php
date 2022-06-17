<?php
// memeriksa sudah login atau belum
session_start();
require 'functions.php';


if(!isset($_SESSION["level"])){
header("location:../logout.php");
exit;
}

if($_SESSION["level"]!='admin'){
	header("location:../$level/index.php");
exit;
}




$id = $_GET["id"];
if (banLevel($id) > 0) {
    echo "
        <script>
        alert('Akun berhasil diban!')
        document.location.href='profile-setting.php'
        </script>";
} else {
    echo "
        <script>
        alert('akun berhasil diban!')
        document.location.href='profile-setting.php'
        </script>";
}