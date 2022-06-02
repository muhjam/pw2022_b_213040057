<?php
// memeriksa sudah login atau belum
session_start();



if(!isset($_SESSION["level"])){
header("location:../logout.php");
exit;
}

if($_SESSION["level"]!='admin'){
	header("location:../$level/index.php");
exit;
}


// koneksi database
require 'functions.php';

$id = $_GET["id"];
if (healLevel($id) > 0) {
    echo "
        <script>
        alert('Akun berhasil dipulihkan!')
        document.location.href='profile-setting.php'
        </script>";
} else {
    echo "
        <script>
        alert('akun berhasil dipulihkan!')
        document.location.href='profile-setting.php'
        </script>";
}