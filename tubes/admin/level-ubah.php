<?php
// memeriksa sudah login atau belum
session_start();

if(!isset($_SESSION["level"])){
header("location:login.php");
exit;
}


if($_SESSION["level"]!='admin'){
	header("location:user.php");
exit;
}


// koneksi database
require 'functions.php';

$id = $_GET["id"];
if (ubahLevel($id) > 0) {
    echo "
        <script>
        alert('Level user berhasil diubah!')
        document.location.href='profile-setting.php'
        </script>";
} else {
    echo "
        <script>
        alert('Level user gagal diubah!')
        document.location.href='profile-setting.php'
        </script>";
}